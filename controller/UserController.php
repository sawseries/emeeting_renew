<?php

require_once './app/Base.php';

class UserController extends Base {

    var $strsub;
    public $j = 0;

    public function __construct() {
        if (!(auth())) {
            Redirect::url("Auth", "loginpage");
        }
    }

    public function index() {
        $lists = Base::query("SELECT * FROM user order by id desc")
                ->limit(10)
                ->fetchAll(); //ทั้งหมด    
        $link = Base::links();
        Redirect::view("user/index", array("lists" => $lists, "link" => $link));
    }

    public function edit_user() {
        $item = Base::query("SELECT * FROM user where id='" . $_GET["id"] . "'")->one();
        $user = new UserController();
        $document = Base::query("SELECT * FROM document")->fetchAll();
        $privilege = Base::query("SELECT * FROM user_privilege where user_id='" . $_GET["id"] . "'")->fetchAll();

        Redirect::view("user/edit_user", array("item" => $item, "user" => $user, "document" => $document, "privilege" => $privilege));
    }

    public function showdoc() {
        $item = Base::query("SELECT * FROM user where id='" . $_GET["id"] . "'")->one();
        $user = new UserController();
        $document = Base::query("SELECT * FROM document")->fetchAll();
        $privilege = Base::query("SELECT * FROM user_privilege where user_id='" . $_GET["id"] . "'")->fetchAll();
        if (preview(userid(), 'edit', 'Member')) {
            Redirect::view("user/edit_user", array("item" => $item, "user" => $user, "document" => $document, "privilege" => $privilege));
        } else {
            Redirect::view("user/detail", array("item" => $item, "user" => $user, "document" => $document, "privilege" => $privilege));
        }
    }

    public function detail() {
        $item = Base::query("SELECT * FROM user where id='" . $_GET["id"] . "'")->one();
        $user = new UserController();
        $document = Base::query("SELECT * FROM document")->fetchAll();
        $privilege = Base::query("SELECT * FROM user_privilege where user_id='" . $_GET["id"] . "'")->fetchAll();

        Redirect::view("user/detail", array("item" => $item, "user" => $user, "document" => $document, "privilege" => $privilege));
    }

    public function edit() {
        $item = Base::query("SELECT * FROM user where id='" . $_GET["id"] . "'")->one();
        $user = new UserController();
        $document = Base::query("SELECT * FROM document")->fetchAll();
        $privilege = Base::query("SELECT * FROM user_privilege where user_id='" . $_GET["id"] . "'")->fetchAll();

        Redirect::view("user/edit", array("item" => $item, "user" => $user, "document" => $document, "privilege" => $privilege));
    }

    public function update() {
        Base::query("update user set " . $_POST["field"] . "='" . $_POST["value"] . "' where id='" . $_POST["id"] . "'")->execute();
        echo $_POST["value"];
    }

    public function updates() {
        Base::query("update user set " . $_POST["field"] . "='" . $_POST["value"] . "' where id='" . $_POST["id"] . "'")->execute();
        echo $_POST["value"];
    }

    public function create() {

        if (preview(userid(), 'write', 'Member')) {
            Redirect::to("user/create_user");
        } else {
            Redirect::url("User", "index");
        }
    }

    public function insert() {

        $sql = "insert into user set firstname='" . $_POST["firstname"] . "',"
                . "lastname='" . $_POST["lastname"] . "',"
                . "department='" . $_POST["department"] . "',"
                . "position='" . $_POST["position"] . "',"
                . "username='" . $_POST["username"] . "',"
                . "password='" . $_POST["password"] . "',"
                . "line='" . $_POST["line"] . "',"
                . "phone='" . $_POST["phone"] . "',"
                . "email='" . $_POST["email"] . "',"
                . "approve='0',"
                . "status='" . $_POST["status"] . "'";

        Base::query($sql)->execute();
        Redirect::para("User", "index", array("success" => "เพิ่มผู้ใช้สำเร็จ"));
    }

    public function delete() {
        $delete = Base::query("delete from user where id='" . $_GET["id"] . "'")->execute();
        Redirect::para("User", "index", array("success" => "ลบข้อมูลสำเร็จ"));
    }

    public function resetpassword() {
        // echo "update user set password = '".$_POST["password"]."',updated_at='".date('Y-m-d H:i:s')."' where id='".$_POST["hdnid"]."'";
        $update = Base::query("update user set password = '" . $_POST["password"] . "',updated_at='" . date('Y-m-d H:i:s') . "' where id='" . $_POST["hdnid"] . "'")->execute();
        Redirect::para("User", "edit_user", array("success" => "Reset Password Success", "id" => $_POST["hdnid"]));
    }

    public function search() {
        $firstname = $_GET["txtfirstname"];
        $lastname = $_GET["txtlastname"];
        $email = $_GET["txtemail"];
        $username = $_GET["txtusername"];
        $status = $_GET["txtstatus"];

        $count = 0;
        $sql = "select * from user";

        if ((!empty($firstname)) || (!empty($lastname)) || (!empty($email)) || (!empty($username)) || (!empty($status))) {
            $sql .= " where ";
        }
        if (!empty($firstname)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "firstname like '%" . $firstname . "%'";
            $count++;
        }

        if (!empty($lastname)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "lastname like '%" . $lastname . "%'";
            $count++;
        }

        if (!empty($email)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "email like '%" . $email . "%'";
            $count++;
        }

        if (!empty($username)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "username like '%" . $username . "%'";
            $count++;
        }

        if (!empty($status)) {
            if ($count > 0) {
                $sql .= " and ";
            }
            $sql .= "status = '" . $status . "'";
            $count++;
        }
        $sql .= " order by id asc";
        $lists = Base::query($sql)
                ->limit(10)
                ->fetchAll(); //ทั้งหมด   
        Redirect::view("user/index", array("lists" => $lists, "link" => Base::links()));
    }

    public function check_privilege($user_id, $doc_id, $field) {
        $term = Base::query("select * from user_privilege where user_id = '" . $user_id . "' and doc_id='" . $doc_id . "'")->one();
        return $term["$field"];
    }

    public function add_privilege() {
        $check = Base::query("select count(*) as cnt from user_privilege where user_id='" . $_POST["user_id"] . "' and doc_id='" . $_POST["doc_id"] . "'")->one();
        if ($check["cnt"] <= 0) {
            $insert = Base::query("insert into user_privilege set user_id='" . $_POST["user_id"] . "',bref_nm='" . docbref($_POST["doc_id"]) . "',doc_id='" . $_POST["doc_id"] . "',`read`=0,`write`=0,`edit`=0,`delete`=0")->execute();
            echo true;
        } else {
            echo 0;
        }
    }

    public function update_privilege() {
        Base::query("update user_privilege set `" . $_POST["field"] . "`='" . $_POST["value"] . "' where `user_id`='" . $_POST["user_id"] . "' and doc_id='" . $_POST["doc_id"] . "'")->execute();
        echo true;
    }

    public function delete_privilege() {
        Base::query("delete from user_privilege where `id`='" . $_POST["id"] . "'")->execute();
        echo true;
    }

    public function Approve() {

        $approve = $_POST["approve"];
        $update = Base::query("update user set approve='$approve' where id='" . $_POST["userid"] . "'")->execute();
        if (($update) && ($approve == 1)) {
           $info = Base::query("select * FROM user where id='" . $_POST["userid"] . "'")->one();
           $to_email = $info["email"];
           $doc = Base::query("select * FROM document")->fetchAll();
            
           foreach ($doc as $docs) {
                if ($info["status"] == 1) {
                    $update = Base::query("insert into user_privilege set `bref_nm`='" . $docs["bref_nm"] . "',`doc_id`='" . $docs["id"] . "',`user_id`='" . $info["id"] . "',`read`=1,`write`=0,`edit`=0,`delete`=0")->execute();
                } else {
                    $update = Base::query("insert into user_privilege set `bref_nm`='" . $docs["bref_nm"] . "',`doc_id`='" . $docs["id"] . "',`user_id`='" . $info["id"] . "',`read`=1,`write`=1,`edit`=1,`delete`=1")->execute();
                }
            }
            
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp2.psu.ac.th';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'pabhada.j';
            $mail->Password = 'pabhada.10';
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
            $mail->From = 'pabhada.j@psu.ac.th';
            $mail->addAddress($to_email,$info["firstname"].' '.$info["lastname"]);     // Add a recipient
            $mail->addReplyTo('mailsender@meeting.stiinfras.com', 'meeting.stiinfras');
            $mail->WordWrap = 100;                                 // Set word wrap to 50 characters
            $mail->smtpConnect([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);

            $mail->isHTML(true);      
             $htmlContent = "
            <html>
            <body>
            <h1>อนุมัติการเข้าใช้งานระบบ E-meeting สำเร็จ</h1>
            <p>คุณได้รับสิทธิ์การเข้าใช้งานระบบ E-meeting</p>
            <p>username :".$info["username"]."</p>
            <p>email :".$info["email"]."</p>
            <p>password :".$info["password"]."</p>
            <p>@Copy right@อุทยานวิทยาศาสตร์ ม.สงขลานครินทร์</p>    
            </body>
      </html>";
                       
            $mail->Subject = 'E-meeting Approve';
            $mail->Body = $htmlContent;

            if ($mail->send()) {
                Redirect::para("User", "edit_user", array("success" => "ส่งข้อมูล ยืนยันผู้ใช้ระบบ <b>" . $info["email"] . "</b> สำเร็จ", "id" => $info["id"]));
            } else {
                Redirect::para("User", "edit_user", array("fail" => "ส่งข้อมูล ยืนยันผู้ใช้ระบบ <b>" . $info["email"] . "</b> ไม่สำเร็จ", "id" => $info["id"]));
            }
        }
    }

    public function approvepage() {

        $item = Base::query("select * from user where id='" . $_GET["userid"] . "'")->one();

        Redirect::view("user/approve", array("email" => $item["email"], "userid" => $item["id"]));
    }

}
