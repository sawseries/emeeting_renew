<?php

require_once './app/Base.php';

class AgendaController extends Base {

    public $j = 1;
    var $strsub;

    public function __construct() {
        if (auth() != true) {
            Redirect::view("login/login", array("fail" => "กรุณาเข้าสู่ระบบ"));
        }
    }

    public function index() {
        $lists = Base::query("SELECT * FROM meeting where doc_type='1' order by start_date desc")
                ->limit(10)
                ->fetchAll(); //ทั้งหมด    
        $link = Base::links();
        Redirect::view("Agenda/index", array("lists" => $lists, "link" => $link));
    }

    public function create_agenda() {
        Redirect::to("Agenda/create_agenda");
    }

    public function insert_agenda() {
        $code = topcode();
        $file_name = "";

        $link = '';
        if ($_POST["rdo_type"] == '1') {
            $link = '';
        } else if ($_POST["rdo_type"] == '2') {
            $link = $_POST["txtlink"];
        } else if ($_POST["rdo_type"] == '3') {
            $link = $_POST["txtzoom"];
        }

        $sql = "insert into meeting "
                . "set code='" . $code . "',topic='" . $_POST["txttopic"] . "',doc_type='" . $_POST["txtreporttype"] . "',"
                . "type='" . $_POST["rdo_type"] . "',"
                . "start_date='" . $_POST["txtstartdate"] . "',time_start='" . $_POST["txttimestart"] . "',"
                . "end_date='" . $_POST["txtenddate"] . "',time_end='" . $_POST["txttimeend"] . "',"
                . "room='" . $_POST["txtroom"] . "',active='0',"
                . "link='" . $link . "',"
                . "doctopic_text='" . $_POST["txtdoctopic_text"] . "',"
                . "detail='" . $_POST["txtdetail"] . "',"
                . "user='" . $_SESSION["user"] . "',ip='" . Base::ip() . "'";

        $insert = Base::query($sql)->execute();

        Redirect::para("Agenda", "edit_agenda", array("code" => $code));
    }

    public function insert_root() {
        $code = subcode();
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $link = "";
        $file_present = "";
        $type = $_POST["rdo_type"];
        $errors = NULL;
        $file_size = 0;
        if ($check['cnt'] <= 0) {
            if ($type == '2') {
                if (!empty($_POST["txtlink"])) {
                    $link = $_POST["txtlink"];
                } else {
                    $type = 1;
                }
            } else if ($type == '3') {
                $file_cnt = $_POST["hdn_root_file"];
                if ($file_cnt > 0) {
                    for ($i = 1;
                            $i <= $file_cnt;
                            $i++) {
                        $countfiles = count($_FILES['txtfile_' . $i]['name']);
                      
// Looping multiple files
                        for ($j = 0;
                                $j < $countfiles;
                                $j++) {
                            $extension = pathinfo($_FILES['txtfile_' . $i]['name'][$j], PATHINFO_EXTENSION);
                            $file_name = rand() . "." . $extension;
                            $file_tmp = $_FILES['txtfile_' . $i]['tmp_name'][$j];
                            $name = $_FILES['txtfile_' . $i]['name'][$j];
                             // $file_size += $_FILES['txtfile_' . $i]['size'];
                            if (move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name)) {
                                $sql = "insert into file set code='" . $code . "',doc_code='" . $_POST["hdndoc_code"] . "',file='" . $file_name . "',name='" . $name . "',ip='" . Base::ip() . "'";
                                $insert = Base::query($sql)->insert();
                            }
                        }
                    }
                } else {
                    $type = '1';
                }
            }

            if ($_FILES["txt_root_file_present"]['size'] > 0) {

                $extension = pathinfo($_FILES['txt_root_file_present']['name'], PATHINFO_EXTENSION);
                $file_tmp = $_FILES['txt_root_file_present']['tmp_name'];
                $file_type = $_FILES['txt_root_file_present']['type'];
                $file_present = rand() . "." . $extension;
                move_uploaded_file($file_tmp, "./storage/present/" . $file_present);
            }

            $no = $_POST["hdntop"] + 1;
            if (isset($_POST["hdntop"])) {
                $update = "update meeting_term set no = no+1 where doc_code='" . $_POST["hdndoc_code"] . "' and no >= '" . $no . "'";
                Base::query($update)->update();
            }
            $sql = "insert into meeting_term "
                    . "set code='" . $code . "',title='" . $_POST["txttitle"] . "',topic='" . $_POST["txttopic"] . "',no='" . $no . "',"
                    . "top='0',doc_code='" . $_POST["hdndoc_code"] . "',type='" . $type . "',file_present='" . $file_present . "',link='" . $link . "',"
                    . "ip='" . Base::ip() . "'";

            $insert = Base::query($sql)->insert();

            if ($file_size > 0) {
                echo $file_size; //ทำloader 
            } else {
                echo 'success';
            }
        }
    }

    public function insert_sub() {
        $code = subcode();
        $top = $_POST["hdnsubtop"];
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $file_present = "";
        $link = "";
        $type = $_POST["rdo_type"];
        $txt_type = "";
        $errors = "";
        $file_size = 0;
        if ($check['cnt'] <= 0) {

            if ($type == '2') {
                if (!empty($_POST["txtlink"])) {
                    $link = $_POST["txtlink"];
                } else {
                    $type = 1;
                }
            } else if ($type == '3') {

                $file_cnt = $_POST["hdn_sub_file"];
                if ($file_cnt > 0) {

                    for ($i = 1;
                            $i <= $file_cnt;
                            $i++) {
                        $countfiles = count($_FILES['txtfile_' . $i]['name']);
// Looping all files
                        for ($j = 0;
                                $j < $countfiles;
                                $j++) {
                            $extension = pathinfo($_FILES['txtfile_' . $i]['name'][$j], PATHINFO_EXTENSION);
                            $file_name = rand() . "." . $extension;
                            $file_tmp = $_FILES['txtfile_' . $i]['tmp_name'][$j];
                            $name = $_FILES['txtfile_' . $i]['name'][$j];

                            if (move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name)) {
                                $sql = "insert into file set code='" . $code . "',doc_code='" . $_POST["hdndoc_code"] . "',file='" . $file_name . "',name='" . $name . "',ip='" . Base::ip() . "'";
                                $insert = Base::query($sql)->insert();
                            }
                        }
                    }
                } else {
                    $type = '1';
                }
            }


            if ($_FILES["txt_sub_file_present"]['size'] > 0) {

                $extension = pathinfo($_FILES['txt_sub_file_present']['name'], PATHINFO_EXTENSION);
                $file_tmp = $_FILES['txt_sub_file_present']['tmp_name'];
                $file_type = $_FILES['txt_sub_file_present']['type'];
                $file_present = rand() . "." . $extension;
                move_uploaded_file($file_tmp, "./storage/present/" . $file_present);
            }

            $no = Base::query("select max(no)+1 as mx from meeting_term where top = '" . $top . "'")->one();
            $sql = "insert into meeting_term "
                    . "set code='" . $code . "',title='',topic='" . $_POST["txttopic"] . "',no='" . $no["mx"] . "',number='" . $_POST["number"] . "',"
                    . "top='" . $top . "',doc_code='" . $_POST["hdndoc_code"] . "',type='" . $type . "',file_present='" . $file_present . "',link='" . $link . "',"
                    . "ip='" . Base::ip() . "'";
            $insert = Base::query($sql)->insert();

            if ($file_size > 0) {
                echo $file_size; //ทำloader 
            } else {
                echo "success";
            }
        }
    }

    public function update_row() {
        $update = "update meeting_term set no = '" . $_POST["no"] . "' where id='" . $_POST["id"] . "'";
        Base::query($update)->update();
        echo $_POST["no"] . " " . $_POST["id"];
    }

    public function edit_agenda() {
        $code = $_GET["code"];
        if (preview(userid(), 'edit', 'Agenda')) {

            $item = Base::query("select * from meeting where code = '" . $code . "'")->one();
            $terms = $this->getterm_edit($item["code"]);
            $topic = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")->fetchAll();
            $Master = new MasterController();
            $subcnt = $this->j;  //drag

            Redirect::view("Agenda/edit_agenda", array("item" => $item,
                "terms" => $terms,
                "topic" => $topic,
                "subcnt" => $subcnt,
                "Master" => $Master));
        } else {
            Redirect::para("Master", "detail", array("code" => $code));
        }
    }

    public function getterm_edit($code) {

        $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
                ->fetchAll();

        $padding = 0;
        $strsub = "";
        $i = 0;
        $n = 1;
        $no = 0;

        if ($term->num_rows > 0) {

            foreach ($term as $terms) {
                $topic = '';
                if ($terms["type"] == '1') {
                    $topic = $terms["topic"];
                } else if ($terms["type"] == '2') {
                    $topic = "<a href='" . $terms["link"] . "' target='_blank'>" . $terms["topic"] . "</a>";
                } else if ($terms["type"] == '3') {
                    $topic = "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open' target='_blank'>" . $terms["topic"] . "</a>";
                }
                $this->strsub .= "<tr class='root'><td style='width:15%;vertical-align:top;'>";
// $this->strsub .= "<input type='hidden' id='txtno_".$i."' name='txtno[".$i."]' value=".$terms["id"].">".$terms["title"]."</td>";
                $this->strsub .= "<input type='hidden' id='txtno_" . $i . "' name='txtno[" . $i . "]' value=" . $terms["id"] . ">" . $terms["title"] . "</td>";
                $this->strsub .= "<td style='width:60%;padding:0em;border:1px solid #7F8C8D;'>";
                $this->strsub .= "<div style='width:80%;padding:0.6em;float:left;background-color:#e6eeff;'>" . $topic . "</div>";

                $this->strsub .= "<div style='width:20%;padding:0.6em;float:left;text-align:center;background-color:#e6eeff;'>";

                if ($terms["file_present"] != '') {
                    $this->strsub .= "<a href='./storage/present/" . $terms["file_present"] . "' title='ไฟล์นำเสนอ' target='_blank'><img src='./assets/image/present.png?key=" . time() . "' style='width:20px;'></a> ";
                }

                if ($terms["type"] == '3') {
                    $cnt = self::check_file_cnt($terms["code"]);
                    $this->strsub .= "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open' target='_blank' title='เอกสารประกอบ'><img src='./assets/image/file_icon.jpg?key=<?php echo time();' style='width:20px;'>(" . $cnt . ")</a>";
                } else {
                    $this->strsub .= ".";
                }
                $this->strsub .= "</div>";
                $this->strsub .= $this->getsubterm_edit($terms["code"], $this->j);

                $this->strsub .= "</td>";

                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a  onclick='setsubtop(\"" . $terms["code"] . "\");' class='btn btn-primary' href='#sub_modal' rel='modal:open'><span style='color:white;' title='เพิ่ม' class='fa fa-plus'></span></a></th>";
                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a onclick='seteditroot(\"" . $terms["id"] . "\");' class='btn btn-default' style='border:1px solid #ccc;' href='#edit_root_modal' rel='modal:open'><span title='แก้ไข' class='fa fa-pencil-square-o'></span></a></th>";
                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a style='cursor:pointer;' onclick='delete_term(\"" . $terms["code"] . "\");' class='btn btn-danger'><span title='ลบ' style='color:white;' class='fa fa-trash'></span></a></th>";
                $this->strsub .= "</tr>";
                $i++;
//$this->j++;
// $n++;  
            }
        }
        return $this->strsub;
    }

    public function getsubterm_edit($code, $n) {

        $strsub = "";
        $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no asc")->fetchAll();
        $padding = 0;

        if ($n < ($this->j)) {
            $n = ($this->j++);
        }

        if ($term->num_rows > 0) {
            $n++;
            $this->strsub .= "<div style='width:100%;'>";
            $this->strsub .= "<ul id='sortable_" . $n . "' style='list-style:none;width:100%;'>";

            foreach ($term as $terms) {
                $topic = '';

                if ($terms["type"] == '1') {
                    if (!empty($terms["number"])) {
                        $topic .= $terms["number"] . ".";
                    }
                    $topic .= $terms["topic"];
                } else if ($terms["type"] == '2') {
                    $topic .= "<a href='" . $terms["link"] . "' target='_blank'>";

                    if (!empty($terms["number"])) {
                        $topic .= $terms["number"] . ".";
                    }
                    $topic .= $terms["topic"];
                    $topic .= "</a>";
                } else if ($terms["type"] == '3') {

                    $topic .= "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open' target='_blank' style='float:left;'>";
                    if (!empty($terms["number"])) {
                        $topic .= $terms["number"] . ".";
                    }
                    $topic .= $terms["topic"];
                    $topic .= "</a>";
                }
                $this->strsub .= "<li class='ui-state-default' style='padding: 1em;'>";
                $this->strsub .= "<input type='hidden' id='txtsubno' name='txtsubno' value='" . $terms["id"] . "'>";
                $this->strsub .= "<input type='hidden' id='txtcode' name='txtsubcode' value='" . $terms["top"] . "'>";
                $this->strsub .= "<table style='width:100%;table-layout: fixed;'><tr><td style='width:90%;padding:0 em;'>";
                $this->strsub .= "<div style='width:90%;float:left; word-wrap: break-word;'>";

                $this->strsub .= $topic;

                $this->strsub .= "</div>";
                $this->strsub .= "<div style='width:10%;float:left;text-align:center;'>";

                if (!empty($terms["file_present"])) {
                    $this->strsub .= "<a href='./storage/present/" . $terms["file_present"] . "' title='ไฟล์นำเสนอ' target='_blank'><img src='./assets/image/present.png?key=" . time() . "' style='width:20px;'></a> ";
                }

                if ($terms["type"] == '3') {
                    $cnt = self::check_file_cnt($terms["code"]);
                    $this->strsub .= "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open' target='_blank' title='เอกสารประกอบ'><img src='./assets/image/file_icon.jpg?key=<?php echo time();' style='width:20px;'>(" . $cnt . ")</a>";
                } else {
                    $this->strsub .= ".";
                }
                $this->strsub .= "</div>";

                $this->strsub .= "</td>";
                $this->strsub .= "<td style='width:5%;text-align:center;'>";
                $this->strsub .= "<a href='#sub_modal'  onclick='setsubtop(\"" . $terms["code"] . "\");' rel='modal:open'>" . $terms["title"] . "<span style='cursor:pointer;' title='เพิ่ม' class='fa fa-plus'></span></a>";
                $this->strsub .= "</td>";
                $this->strsub .= "<td style='width:5%;text-align:center;'>";
                $this->strsub .= "<a href='#edit_sub_modal' onclick='seteditsub(\"" . $terms["id"] . "\");' rel='modal:open'>" . $terms["title"] . "<span style='cursor:pointer;' title='แก้ไข' class='fa fa-pencil'></span></a>";
                $this->strsub .= "</td>";
                $this->strsub .= "<td style='width:5%;text-align:center;'>";
                $this->strsub .= "<a  onclick='deletesub(\"" . $terms["code"] . "\");'><span style='color:red;cursor:pointer;' title='ลบ' class='fa fa-trash'></span></a>";
                $this->strsub .= "</td></tr></table>";

                $this->strsub .= $this->getsubterm_edit($terms["code"], $n);

                $this->strsub .= "</li>";
            }

            $this->strsub .= "</ul>";
            $this->strsub .= "</div>";
        }

        $this->j++;

        return $strsub;
    }

    public function delete_doc() {


        self::delete_root($_GET["code"]);
        $delete = Base::query("delete from meeting where code='" . $_GET["code"] . "'")->execute();

        Redirect::url("Agenda", "index");
    }

    public function delete_root($code) {
        self::delete_sub_root($code);
        echo true;
    }

    public function delete_term() {
        self::deletesub($_POST["code"]);
        echo true;
    }

    public function delete_sub() {
        self::deletesub($_POST['code']);
    }

    public function delete_sub_root($code) {
//deletefile_present
        $present = Base::query("select * from meeting_term where doc_code='" . $code . "'")->fetchAll();
        foreach ($present as $presents) {
            if (file_exists("./storage/present/" . $presents["file_present"])) {
                unlink("./storage/present/" . $presents["file_present"]);
            }
        }
        $delete = Base::query("delete from meeting_term where doc_code='" . $code . "'")->execute(); //delete root
        $file = Base::query("select * from file where doc_code='" . $code . "'")->fetchAll();
        if ($file->num_rows) {
            foreach ($file as $files) {
                if (file_exists("./storage/agenda/" . $files["file"])) {
                    unlink("./storage/agenda/" . $files["file"]);
                }
            }
            $delete = Base::query("delete from file where doc_code='" . $code . "'")->execute(); //delete root
        }
    }

    public function deletesub($code) {

//deletefile_present
        $present = Base::query("select * from meeting_term where code='" . $code . "'")->fetchAll();

        foreach ($present as $presents) {
            if (file_exists("./storage/present/" . $presents["file_present"])) {
                unlink("./storage/present/" . $presents["file_present"]);
            }

            $file = Base::query("select * from file where code='" . $presents["code"] . "'")->fetchAll();
            if ($file->num_rows) {
                foreach ($file as $files) {
                    if (file_exists("./storage/agenda/" . $files["file"])) {
                        unlink("./storage/agenda/" . $files["file"]);
                    }
                }
            }
            $delete = Base::query("delete from file where code='" . $presents["code"] . "'")->execute(); //delete file
        }

        $delete_top = Base::query("select * from meeting_term where top='" . $code . "'")->fetchAll();
        if ($delete_top->num_rows > 0) {
            foreach ($delete_top as $delete_top) {
                $this->deletesub($delete_top["code"]);
            }
        }

        $delete = Base::query("delete from meeting_term where code='" . $code . "'")->execute(); //delete root
    }

    public function showdoc_top() {
        $top = Base::query("SELECT * FROM meeting where code='" . $_GET["code"] . "'")
                ->one(); // วาระ

        $code = $_GET["code"];
        $topic = $top["topic"];

        Redirect::view("meeting/pdf_preview", array("top" => $top, "code" => $code, "file" => $top["file"], "topic" => $topic));
    }

    public function showdoc() {
        $sub = Base::query("SELECT * FROM meeting_term where code='" . $_GET["code"] . "'")
                ->one(); // วาระ

        $top = Base::query("SELECT * FROM meeting where code='" . $sub["doc_code"] . "'")
                ->one(); // วาระ

        $code = $top["code"];
        $topic = $top["topic"];

        Redirect::view("meeting/pdf_preview", array("sub" => $sub, "top" => $top, "file" => $sub["file"], "code" => $code, "topic" => $topic));
    }

    public function update_meeting() {
        Base::query("update meeting set " . $_POST["field"] . "='" . $_POST["value"] . "' where code='" . $_POST["code"] . "'")->execute();
        echo $_POST["value"];
    }

    public function update_meeting_type() {
        $link = "";
        if (($_POST["type"] == '2') || ($_POST["type"] == '3')) {
            $link = $_POST["link"];
        }
        Base::query("update meeting set type='" . $_POST["type"] . "',link='$link' where code='" . $_POST["code"] . "'")->execute();
        echo true;
    }

    public function deletefile_edit($code) {

        $file = Base::query("select * from file where code='" . $code . "'")->fetchAll();

        if ($file->num_rows) {
            foreach ($file as $files) {
                if (file_exists("./storage/agenda/" . $files["file"])) {
                    unlink("./storage/agenda/" . $files["file"]);
                }
            }

            $delete = Base::query("delete from file where code='" . $code . "'")->execute(); //delete root
        }
    }

    public function edit_root() {
        $type = $_POST["rdo_edit_root_type"];
        $link = '';
        $file_size = 0;
        $file_present = $_POST["hdn_edit_root_file_present"];

        if ($type == '1') {
            $link = '';
            self::deletefile_edit($_POST["hdn_edit_root_code"]);
        } else if ($type == '2') {
            if (!empty($_POST["txt_edit_root_link"])) {
                $link = $_POST["txt_edit_root_link"];
                self::deletefile_edit($_POST["hdn_edit_root_code"]);
            } else {
                $type = 1;
            }
        } else if ($type == '3') {
            $file_cnt = $_POST["hdn_edit_root_file"];
            if ($file_cnt > 0) {

                for ($i = 1;
                        $i <= $file_cnt;
                        $i++) {
                    $countfiles = count($_FILES['txtfile_' . $i]['name']);
// Looping all files
                    for ($j = 0; $j < $countfiles; $j++) {

                        $extension = pathinfo($_FILES['txtfile_' . $i]['name'][$j], PATHINFO_EXTENSION);
                        $file_name = rand() . "." . $extension;
                        $file_tmp = $_FILES['txtfile_' . $i]['tmp_name'][$j];
                        $name = $_FILES['txtfile_' . $i]['name'][$j];

                        if (move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name)) {
                            $sql = "insert into file set code='" . $_POST["hdn_edit_root_code"] . "',doc_code='" . $_POST["hdn_edit_root_doc_code"] . "',file='" . $file_name . "',name='" . $name . "',ip='" . Base::ip() . "'";
                            $insert = Base::query($sql)->insert();
                        }
                    }
                }
            }
        }

//update file_present

        if ($_FILES["txt_edit_root_file_present"]['size'] > 0) {

            $extension = pathinfo($_FILES['txt_edit_root_file_present']['name'], PATHINFO_EXTENSION);
            $file_tmp = $_FILES['txt_edit_root_file_present']['tmp_name'];
            $file_type = $_FILES['txt_edit_root_file_present']['type'];
            $file_present = rand() . "." . $extension;
            move_uploaded_file($file_tmp, "./storage/present/" . $file_present);
        }


        if (empty($errors)) {

            $update = Base::query("update meeting_term set title='" . $_POST["txttitle"] . "',topic='" . $_POST["txttopic"] . "',type='" . $type . "',link='" . $link . "',file_present='" . $file_present . "' where id='" . $_POST["hdn_edit_root_id"] . "'")->update();
            if ($file_size > 0) {
                echo $file_size;
            } else {
                echo 'success';
            }
        } else {
            print($errors);
            exit();
        }
    }

    public function edit_sub() {

        $file_name = "";
        $type = $_POST["rdo_edit_sub_type"];
        $link = "";
        $errors = "";
        $file_size = 0;
        $file_present = $_POST["hdn_edit_sub_file_present"];

        if ($type == '1') {
            $link = "";
            self::deletefile_edit($_POST["hdn_edit_sub_code"]);
        } else if ($type == '2') {
            if (!empty($_POST["txteditsublink"])) {
                $link = $_POST["txteditsublink"];
            } else {
                $type = '1';
            }

            self::deletefile_edit($_POST["hdn_edit_sub_code"]);
        } else if ($type == '3') {

            $file_cnt = $_POST["hdn_edit_sub_file"];
            if ($file_cnt > 0) {
                for ($i = 1; $i <= $file_cnt; $i++) {
                    $countfiles = count($_FILES['txtfile_' . $i]['name']);
// Looping all files
                    for ($j = 0;
                            $j < $countfiles;
                            $j++) {
                        $extension = pathinfo($_FILES['txtfile_' . $i]['name'][$j], PATHINFO_EXTENSION);
                        $file_name = rand() . "." . $extension;
                        $file_tmp = $_FILES['txtfile_' . $i]['tmp_name'][$j];
                        $name = $_FILES['txtfile_' . $i]['name'][$j];

                        if (move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name)) {
                            $sql = "insert into file set code='" . $_POST["hdn_edit_sub_code"] . "',doc_code='" . $_POST["hdn_edit_sub_doc_code"] . "',file='" . $file_name . "',name='" . $name . "',ip='" . Base::ip() . "'";
                            $insert = Base::query($sql)->insert();
                        }
                    }
                }
            }
        }

        if ($_FILES["txt_edit_sub_file_present"]['size'] > 0) {

            $extension = pathinfo($_FILES['txt_edit_sub_file_present']['name'], PATHINFO_EXTENSION);
            $file_tmp = $_FILES['txt_edit_sub_file_present']['tmp_name'];
            $file_type = $_FILES['txt_edit_sub_file_present']['type'];
            $file_present = rand() . "." . $extension;
            move_uploaded_file($file_tmp, "./storage/present/" . $file_present);
        }

        $update = Base::query("update meeting_term set number='" . $_POST["number"] . "',topic='" . $_POST["txttopic4"] . "',type='" . $type . "',link='" . $link . "',file_present='" . $file_present . "' where id='" . $_POST["hdn_edit_sub_id"] . "'")->update();

        if ($file_size > 0) {
            echo $file_size;
        } else {
            echo "success";
        }
    }

    public function getedit_term() {
        $data = Base::query("select * from meeting_term where id='" . $_POST["id"] . "'")->fetchAll();
        echo json_encode($data);
    }

    public function updates_active() {
        $update = "update meeting set active = '0'";
        Base::query($update)->update();

        $update = "update meeting set active = '" . $_POST["value"] . "' where code='" . $_POST["code"] . "'";
        Base::query($update)->update();
        echo true;
    }

    public function getroot_edit() {
        $term = Base::query("select * from meeting_term where id = '" . $_POST['id'] . "'")->one();
        echo json_encode($term);
    }

    function getitmfile() {
        $term = Base::query("select * from file where code = '" . $_POST['code'] . "'")->fetchAll();
        foreach ($term as $terms) {
            echo "<div id='itm_file_" . $terms['id'] . "' style='padding:0.5em;background-color:#E6E6FA;margin:0.5em;'><table style='width:100%;'><tr><td style='width:90%;'><a href='./storage/agenda/" . $terms["file"] . "' target='_blank'>" . $terms["name"] . "</a></td><td style='width:10%;text-align:center;color:red;'><a onclick='deleteitmfile(" . $terms["id"] . ");' style='color:red;cursor:pointer;'>ลบ</a></td></tr></table></div>";
        }
    }

    function delete_one_file() {

        $term = Base::query("select * from file where id = '" . $_POST['id'] . "'")->one();

        if (file_exists("./storage/agenda/" . $term['file'])) {
            if (unlink("./storage/agenda/" . $term['file'])) {
                $term = Base::query("delete from file where id = '" . $_POST['id'] . "'")->delete();
                echo true;
            }
        } else {
            echo "nofile";
        }
    }

    function delete_all_file() {
        $term = Base::query("delete from file where id = '" . $_POST['id'] . "'")->delete();
        echo true;
    }

    function delete_present_file() {
        $term = Base::query("update meeting_term set file_present='' where id='" . $_POST['id'] . "'")->execute();
        if (file_exists("./storage/present/" . $_POST['file_name'])) {
            unlink("./storage/present/" . $_POST['file_name']);
        }
        echo true;
    }

    function check_file_cnt($code) {
        $term = Base::query("select count(*) as cnt from file where code = '" . $code . "'")->one();
        return $term["cnt"];
    }

    function check_close_file() {

        $term = Base::query("select count(*) as cnt from file where code = '" . $_POST['code'] . "'")->one();
        echo $term['cnt'];
        if ($term['cnt'] <= 0) {
            $update = Base::query("update meeting_term set type='1' where code = '" . $_POST['code'] . "'")->update();
        }
    }

    public function search() {
        $doc_type = 1;
        $topic = $_GET["txttopic"];
        $startdate = $_GET["txtstartdate"];
        $enddate = $_GET["txtenddate"];
        $count = 0;
        $sql = "select * from meeting";
        if ((!empty($doc_type)) || (!empty($topic)) || (!empty($startdate)) || (!empty($enddate))) {
            $sql .= " where ";
        }
        if (!empty($doc_type)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "doc_type ='" . $doc_type . "'";
            $count++;
        }
        if (!empty($topic)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "topic like '%" . $topic . "%'";
            $count++;
        }
        if (!empty($startdate)) {
            if (!empty($enddate)) {
                if ($count > 0) {
                    $sql .= " and ";
                }
                $sql .= "(start_date >='" . $startdate . "' and end_date <='" . $enddate . "')";
                $count++;
            } else {
                if ($count > 0) {
                    $sql .= " and ";
                }
                $sql .= "start_date ='" . $startdate . "'";
                $count++;
            }
        }

        if (!empty($enddate)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "end_date ='" . $enddate . "'";
            $count++;
        }
        $sql .= " order by start_date desc";
//////////////////////////////////////////
        $lists = Base::query($sql)
                ->limit(10)
                ->fetchAll(); //ทั้งหมด   

        $link = Base::links();
        Redirect::view("Agenda/index", array("lists" => $lists, "link" => $link));
    }

}
