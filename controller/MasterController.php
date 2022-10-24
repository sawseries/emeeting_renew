<?php

require_once './app/Base.php';

class MasterController extends Base {

    var $strsub;
    public $strsub_mobile;
    var $j;

    public function __construct() {
        if (!(auth())) {
            Redirect::url("Auth", "loginpage");
        }
    }

    public function index() {
        $meeting = Base::query("select * from meeting where active='1'")->one();
        $terms = '';
        $terms_mobile = '';
        if (isset($meeting)) {
            $terms = $this->getterm($meeting["code"]);
            $terms_mobile = $this->getterm_mobile($meeting["code"]);
        }
        $sql = "select * from meeting where doc_type='1' order by created_at desc";
        $agenda = Base::query($sql)
                ->limit(5)
                ->fetchAll();
        $sql = "select * from meeting where doc_type='2' order by created_at desc";
        $report = Base::query($sql)
                ->limit(5)
                ->fetchAll();
        Redirect::view("master/index", array("meeting" => $meeting, "terms" => $terms, "terms_mobile" => $terms_mobile, "agenda" => $agenda, "report" => $report, "links" => Base::links()));
    }

    public function shwdoc() {

        $type = $_GET["type"];
        $topic = doctext($type);

        $sql = "select * from meeting where doc_type='" . $type . "' order by created_at desc";

        $lists = Base::query($sql)
                ->limit(10)
                ->fetchAll();

        Redirect::view("meeting/display", array("lists" => $lists, "topic" => $topic, "links" => Base::links()));
    }

    public function search() {
        $doc_type = $_GET["type"];
        $topic = $_GET["txttopic"];
        $startdate = $_GET["txtstartdate"];
        $enddate = $_GET["txtenddate"];
        $count = 0;
        $sql = "select * from meeting";
        $topic_text = '';

        $topic_text = doctext($doc_type);

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

        Redirect::view("meeting/display", array("lists" => $lists, "topic" => $topic_text, "links" => Base::links()));
    }

    public function detail() {

        $meeting = Base::query("select * from meeting where code='" . $_GET["code"] . "'")->one();
        $terms = $this->getterm($meeting["code"]);
        $terms_mobile = $this->getterm_mobile($meeting["code"]);

        Redirect::view("master/detail", array("meeting" => $meeting, "terms" => $terms, "terms_mobile" => $terms_mobile));
    }

    public function getterm($code) {
        $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
                ->fetchAll();
        $padding = 0;
        $strsub = "";
        $i = 0;
        if ($term->num_rows > 0) {
            foreach ($term as $terms) {
                $topic = '';
                 $file = Base::query("select * from file  where code = '" . $terms["code"] . "'")->one();
                if ($terms["type"] == "1") {//text
                    $topic = $terms["topic"];
                } else if ($terms["type"] == "2") {//link 
                    $topic = "<a href='" . $terms["link"] . "' target='blank'>" . $terms["topic"] . "</a>";
                } else if ($terms["type"] == "3") {//file 
                    $topic = "<a href='./storage/agenda/" . $file["file"] . "' title='" . $file["name"] . "' target='_blank'>" . $terms["topic"] . "</a>";
                }

                $this->strsub .= "<tr><td style='vertical-align:top;width:20%;padding-left:0;'>" . $terms['title'] . "</td>";
                $this->strsub .= "<td style='width:60%;vertical-align:top;'>";
                $this->strsub .= "" . $topic . "";
                $this->strsub .= "</td>";

                $this->strsub .= "<td style='width:10%;text-align:right;'>";
                if ($terms["file_present"] != '') {
                    $this->strsub .= "<a href='./storage/present/" . $terms["file_present"] . "' title='ไฟล์นำเสนอ' target='_blank'><img src='./assets/image/present.png?" . time() . "' style='width:20px;'></a> ";
                }
                $this->strsub .= "</td>";
                $this->strsub .= "<td style='width:10%;text-align:center;'>";
                if ($terms["type"] == '3') {
                    $cnt = self::check_file_cnt($terms["code"]);
                    $this->strsub .= "<a href='./storage/agenda/" . $file["file"] . "' title='" . $file["name"] . "' target='_blank' title='เอกสารประกอบ'><img src='./assets/image/file_icon.jpg?key=<?php echo time();' style='width:20px;'>(" . $cnt . ")</a>";
                } else {
                    $this->strsub .= ".";
                }
                $this->strsub .= "</td>";
                $this->strsub .= $this->getsubterm($terms["code"], 0);
                $this->strsub .= "</tr>";
                $i++;
            }
        }

        return $this->strsub;
    }

    public function getsubterm($code, $padding) {
        $strsub = "";
        $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no asc")->fetchAll();
        $i = 0;
         
        if ($term->num_rows > 0) {
            foreach ($term as $terms) {
                $topic = '';
                 $file = Base::query("select * from file  where code = '" . $terms["code"] . "'")->one();
                if ($terms["type"] == '1') {
                    if (!empty($terms["number"])) {
                        $topic .= "<div style='width:6%;float:left;'>" . $terms["number"] . "</div>";
                    }
                    $topic .= "<div style='width:94%;float:left;word-wrap: break-word;'>" . $terms["topic"] . "</div>";
                } else if ($terms["type"] == '2') {

                    $topic .= "<a href='" . $terms["link"] . "' target='_blank'>";

                    if (!empty($terms["number"])) {
                        $topic .= "<div style='width:6%;float:left;'>" . $terms["number"] . "</div>";
                    }
                    $topic .= "<div style='width:94%;float:left;word-wrap: break-word;'>" . $terms["topic"] . "</div>";
                    $topic .= "</a>";
                } else if ($terms["type"] == '3') {
                    $topic .= "<a  href='./storage/agenda/" . $file["file"] . "' title='" . $file["name"] . "'   target='_blank'  target='_blank'>";
                    if (!empty($terms["number"])) {
                        $topic .= "<div style='width:6%;float:left;'>" . $terms["number"] . "</div>";
                    }
                    $topic .= "<div style='width:94%;float:left;word-wrap: break-word;'>" . $terms["topic"] . "</div>";
                    $topic .= "</a>";
                }

                $this->strsub .= "<tr>";
                $this->strsub .= "<td style='verticle-align:top;'>" . $terms["title"] . "</td>";
                $this->strsub .= "<td style='verticle-align:top;padding-left:" . $padding . "px;'>" . $topic . "</td>";

                $this->strsub .= "<td style='width:10%;text-align:right;'>";
                if ($terms["file_present"] != '') {
                    $this->strsub .= "<a href='./storage/present/" . $terms["file_present"] . "' title='ไฟล์นำเสนอ' target='_blank'><img src='./assets/image/present.png?" . time() . "' style='width:20px;'></a> ";
                }
                $this->strsub .= "</td>";
                $this->strsub .= "<td style='width:20%;'>";
                if ($terms["type"] == '3') {
                    $cnt = self::check_file_cnt($terms["code"]);
                    $this->strsub .= "<a  href='./storage/agenda/" . $file["file"] . "' title='" . $file["name"] . "'  target='_blank' title='เอกสารประกอบ'><img src='./assets/image/file_icon.jpg?key=<?php echo time();' style='width:20px;'>(" . $cnt . ")</a>";
                } else {
                    $this->strsub .= ".";
                }
                $this->strsub .= "</td>";

                $this->strsub .= "</tr>";

                $this->strsub .= $this->getsubterm($terms["code"], ($padding + 40));
                $i++;
            }
        }
        return $strsub;
    }

    public function getterm_mobile($code) {
        $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
                ->fetchAll();

        if ($term->num_rows > 0) {


            foreach ($term as $terms) {

                $topic = '';
                if ($terms["type"] == '1') {
                    $topic = $terms["topic"];
                } else if ($terms["type"] == '2') {
                    $topic = "<a href='" . $terms["link"] . "' target='_blank'>" . $terms["topic"] . "</a>";
                } else if ($terms["type"] == '3') {
                    $topic = "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open'>" . $terms["topic"] . "</a>";
                }

                $this->strsub_mobile .= "<div style='width:100%;padding:1em;border-bottom:1px solid gray;word-wrap: break-word;white-space: nowrap;overflow:auto;'>";

                if ($terms["file_present"] != '') {
                    $this->strsub .= "<a href='./storage/present/" . $terms["file_present"] . "' title='ไฟล์นำเสนอ' target='_blank'><img src='./assets/image/present.png?key=<?php echo time();' style='width:20px;'></a> ";
                }

                if ($terms["type"] == '3') {
                    $cnt = self::check_file_cnt($terms["code"]);
                    $this->strsub .= "<a onclick='setitmfile(\"" . $terms["code"] . "\",\"show_report_modal\");' href='#report_modal' rel='modal:open' target='_blank' title='เอกสารประกอบ'><img src='./assets/image/file_icon.jpg?key=<?php echo time();' style='width:20px;'>(" . $cnt . ")</a>";
                } else {
                    $this->strsub .= ".";
                }

                $this->strsub_mobile .= "<b>" . $terms["title"] . " " . $topic . "</b><br>";
                $this->strsub_mobile .= $this->getsubterm_mobile($terms["code"], 0);
                $this->strsub_mobile .= "</div>";
            }
        }
        $this->strsub_mobile .= "";
        return $this->strsub_mobile;
    }

    public function getsubterm_mobile($code, $padding) {
        $strsub_mobile = "";
        $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no asc")->fetchAll();
        $i = 0;

        if ($term->num_rows > 0) {
            $this->strsub_mobile .= "<div style='width:100%;padding:0;padding-left:" . $padding . "px;'>";
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

                $this->strsub_mobile .= "<br>" . $topic;
                $this->strsub_mobile .= $this->getsubterm_mobile($terms["code"], $padding + 10);
                $i++;
            }
            $this->strsub_mobile .= "</div>";
        }
        return $strsub_mobile;
    }

    function getitmfile() {
        $term = Base::query("select * from file where code = '" . $_POST['code'] . "'")->fetchAll();
        foreach ($term as $terms) {
            echo "<div id='itm_file_" . $terms['id'] . "' style='padding:0.5em;background-color:#E6E6FA;margin:0.5em;'><table style='width:100%;'><tr><td style='width:90%;'><a href='./storage/agenda/" . $terms["file"] . "' target='_blank'>" . $terms["name"] . "</a></td></tr></table></div>";
        }
    }

    function check_file_cnt($code) {
        $term = Base::query("select count(*) as cnt from file where code = '" . $code . "'")->one();
        return $term["cnt"];
    }

}
