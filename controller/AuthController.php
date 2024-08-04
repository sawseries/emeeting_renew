<?php

require_once './app/Base.php';


class AuthController extends Base {

    public function __construct() {
    }

    public function index() {      
        if(auth()==true){  
        Redirect::url("Master", "index");    
        }else{
            Redirect::url("Auth", "loginpage");
        }  
    }

    public function registerpage(){
        Redirect::to("login/register");
    }

    public function register(){
        
        $sql = "insert into user set firstname='".$_POST["firstname"]."',"
        . "lastname='".$_POST["lastname"]."',"
        . "department='".$_POST["department"]."',"
        . "position='".$_POST["position"]."',"
        . "username='".$_POST["username"]."',"
        . "password='".$_POST["password"]."',"
        . "line='".$_POST["line"]."',"
        . "phone='".$_POST["phone"]."',"
        . "email='".$_POST["email"]."',"
        . "approve='0',"
        . "status='1'";
        Base::query($sql)->insert();

        self::notify();
        
        Redirect::view("login/login", array("success" => "สมัครสมาชิกสำเร็จ กรุณารอตรวจสอบสิทธิ์ และยืนยันผล การลงทะเบียนของท่านทาง Email"));
        
    }

    public function notify(){

        ini_set('display_errors', 1);
	    ini_set('display_startup_errors', 1);
	    error_reporting(E_ALL);
	    date_default_timezone_set("Asia/Bangkok");

	$sToken = line_token();
	$sMessage = "มีรายการสมัครสมาชิกใหม่";

	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	curl_close( $chOne );   

    }

    public function login() {

        if(isset($_POST["username"])&&isset($_POST["password"])){

        $term = Base::query("select *,count(*) as cnt FROM user where username='" . $_POST["username"] . "' and password='" . $_POST["password"] . "'")->one();

        if ($term["cnt"] > 0) {
            
            if($term["approve"]==1){
            $_SESSION["Auth"] = true;
            $_SESSION["fullname"] = $term["firstname"] . " " . $term["lastname"];
            $_SESSION["status"] = $term["status"];
            $_SESSION["user"] = $term["username"];
            $_SESSION["user_id"] = $term["id"];

            
                if($term["status"]>1){
                    Redirect::url("Admin", "index");
                }else{
                    Redirect::url("Master", "index");
                }
            $update = Base::query("update user set last_login = '".date('Y-m-d H:i:s')."',ip='".Base::ip()."' where id='".$term["id"]."'")->update();
            }else{
                Redirect::view("login/login", array("fail" => "กรุณารอตรวจสอบสิทธิ์ และยืนยันผล การลงทะเบียนของท่านทาง Email"));
            }
        } else {
            Redirect::view("login/login", array("fail" => "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"));
        }

        }else{
             Redirect::to("login/login");
        }
    }

    public function logout() {        
        if(isset($_SESSION)){
        session_destroy();
        }
        Redirect::url("Auth", "loginpage");
    }

    public function reset() {        
        Redirect::to("login/reset");
    }



    public function resetpassword() {        
      
      $update=Base::query("update user set password = '".$_POST["password"]."',updated_at='".date('Y-m-d H:i:s')."' where email='".$_POST["email"]."'")->update();

      if($update){
        Redirect::para("Auth","loginpage",array("success" => "Reset Password Success"));
      }

    }

    public function loginpage() {        
        Redirect::to("login/login");
    }


    public function sendotp() {              
        $to_email = $_POST["email"];
       $otp = random_int(100000, 999999);
        $checkemail = Base::query("select count(*) as cnt FROM user where email='".$to_email."'")->one();
       if ($checkemail["cnt"] > 0) {         
        $update = Base::query("update user set reset = '".$otp."',reset_time='".date('Y-m-d H:i:s')."',updated_at='".date('Y-m-d H:i:s')."' where email='".$to_email."'")->update();
        //send email

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp2.psu.ac.th';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'pabhada.j';
            $mail->Password = 'pabhada.10';
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
            $mail->From = 'pabhada.j@psu.ac.th';
            $mail->addAddress($to_email,"reset-password");     // Add a recipient
            $mail->addReplyTo('mailsender@meeting.stiinfras.com', 'meeting.stiinfras');
            $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
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
            <h1>E-meeting reset password</h1>
            <p><span style='font-size:16pt;'>your otp ".$otp."</span></p>
            </body>
            </html>";
                       
            $mail->Subject = 'E-meeting Reset-Password';
            $mail->Body = $htmlContent; 
          
            if ($mail->send()) {        
                Redirect::para("Auth","otppage",array("email" => $_POST["email"]));
            }else{
                echo "not success".$mail->ErrorInfo;
            }

        }else{
            Redirect::view("login/reset", array("fail" => "ไม่มี E-mail"));
        }
    }

    public function otppage() {

        Redirect::view("login/otp", array("email" => $_GET["email"]));
    }

    public function checkotp() {
        $email = $_POST["email"];
        $otp = $_POST["otp"];

        $checkotp = Base::query("select count(*) as cnt FROM user where email='".$email."' and reset='".$otp."'")->one();

        if ($checkotp["cnt"] > 0) {        
            Base::query("update user set reset = '',reset_time='0000-00-00 00:00:00',updated_at='".date('Y-m-d H:i:s')."' where email='".$email."'")->update();
            Redirect::para("Auth","resetpage",array("email" => $_POST["email"]));
        }else{
            Redirect::view("login/otp", array("email" => $_POST["email"],"fail" => "รหัสยืนยันไม่ถูกต้อง"));
        }
    }  

    public function resetpage() {

        Redirect::view("login/resetpassword", array("email" => $_GET["email"]));   
    }

    public function email_check() {
        $check = Base::query("select count(*) as cnt FROM user where email='".$_POST["email"]."'")->one();
        
        if ($check["cnt"] > 0) { 
            echo true;
        }else{
            echo false;
        }  
    }

    public function username_check() {
        $check = Base::query("select count(*) as cnt FROM user where username='".$_POST["username"]."'")->one();
        if ($check["cnt"] > 0) { 
            echo true;
        }else{
            echo false;
        }  
    }







}
