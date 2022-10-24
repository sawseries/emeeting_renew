<?php

require_once './app/Base.php';

class ReportController extends Base {
    public  $j=0;
    
    public function __construct() {
          if (!(auth())) {
            Redirect::url("Auth", "loginpage");
        }
    }

    public function index() {
        $lists = Base::query("SELECT * FROM meeting where doc_type='2' order by start_date desc")
                ->limit(10)
                ->fetchAll(); //ทั้งหมด    
        $link = Base::links();        
        Redirect::view("Report/index", array("lists" => $lists,"link"=>$link));
    }

    public function create_report() {
        Redirect::to("Report/create_report");
    }

    public function insert_report() {

        $code = topcode();
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $filename='';
        if ($check['cnt'] <= 0) {
            $file_size = $_FILES['txtfile']['size'];
            if ($file_size > 0) {
                $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);          
                $file_name = rand().".".$extension;     
                $file_size = $_FILES['txtfile']['size'];
                $file_tmp = $_FILES['txtfile']['tmp_name'];
                $file_type = $_FILES['txtfile']['type'];
                move_uploaded_file($file_tmp, "./storage/report/".$file_name);   
                $filename = $file_name;                   
            }else{
                $errors = 'File is empty';  
            }
            if(empty($errors)){
            $sql = "insert into meeting "
            . "set code='" . $code . "',topic='" . $_POST["txttopic"] . "',doc_type='2',type='1',"
            . "start_date='" . $_POST["txtstartdate"] . "',time_start='" . $_POST["txttimestart"] . "',"
            . "end_date='" . $_POST["txtenddate"] . "',time_end='" . $_POST["txttimeend"] . "',"
            . "room='" . $_POST["txtroom"] . "',active='0',"
            . "link='" . $filename . "',doctopic_text='',detail='',user='" . $_SESSION["user"] . "',ip='" . Base::ip() . "'";
            $insert = Base::query($sql)->execute();
            Redirect::para("Report", "edit_report", array("code" => $code)); 
            }
        }
    }

    public function update_row(){
        $update = "update meeting_term set no = '".$_POST["no"]."' where id='" . $_POST["id"] . "'";  
        Base::query($update)->update();
        echo true;
    }

    public function edit_report() {
        $code = $_GET["code"];
        $meeting = Base::query("select * from meeting where code = '" . $code . "'")->one();
        $topic =  Base::query("select * from meeting_term where doc_code = '".$code."' and top='0' order by no asc")->fetchAll();
        $Master = new MasterController();

        if(preview(userid(),'edit','Report')){ 
        Redirect::view("Report/edit_report", array("meeting" => $meeting,
            "topic" => $topic,
            "Master" => $Master));
        }else{
            Redirect::view("Report/detail", array("meeting" => $meeting,
            "topic" => $topic,
            "Master" => $Master));
        }
    }

   public function update_report_file(){
    $file_size = $_FILES['txtfile']['size'];
    $hdnfile =$_POST["hdnfile"];
    $link = '';
    if ($file_size > 0) {
        if(!empty($hdnfile)){
            if(file_exists("./storage/report/".$hdnfile)){
                unlink("./storage/report/".$hdnfile);
            }
        }
        
        $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);              
        $file_name = rand().".".$extension;

        $file_size = $_FILES['txtfile']['size'];
        $file_tmp = $_FILES['txtfile']['tmp_name'];
        $file_type = $_FILES['txtfile']['type'];
        move_uploaded_file($file_tmp, "./storage/report/" . $file_name);   
        $link = $file_name;                   
    }else{
        if(!empty($hdnfile)){
            $link = $hdnfile;
        }else{
        $errors = 'File is empty'; 
        } 
    }

    $update = "update meeting set link = '".$link."' where code='".$_POST["hdncode"]."'";  
    Base::query($update)->update();

    Redirect::para("Report", "edit_report", array("code" => $_POST["hdncode"])); 

   } 
   

   public function getroot_edit(){

    $term = Base::query("select * from meeting_term where id = '" . $_POST['id'] . "'")->one();
    echo json_encode($term);
   }


   public function update_meeting(){        
    Base::query("update meeting set ".$_POST["field"]."='".$_POST["value"]."' where code='".$_POST["code"]."'")->execute();
    echo $_POST["value"];
   }
    public function update_meeting_type(){   
     $link = "";
   if(($_POST["type"]=='2')||($_POST["type"]=='3')){
       $link = $_POST["link"];
    }
    Base::query("update meeting set type='".$_POST["type"]."',link='$link' where code='".$_POST["code"]."'")->execute();
    echo true;   
    }
   
    public function delete_doc() {               
        $report = Base::query("select * from meeting where code = '" . $_GET["code"]  . "'")->one();
        if(file_exists("./storage/report/".$report["link"])){              
           unlink("./storage/report/".$report["link"]);
         }
              
         $delete = Base::query("delete from meeting where code='" . $_GET["code"] . "'")->execute();    
        
          Redirect::url("Report", "index");
    }

    public function delete_term() {
        $delete = Base::query("delete from meeting_term where code='" . $_POST["code"] . "'")->execute();
        $deleteterm = Base::query("delete from meeting_term where top='" . $_POST["code"] . "'")->execute();
        return true;
    }


    public function search() {
        $doc_type=2;
        $topic=$_GET["txttopic"];
        $startdate=$_GET["txtstartdate"];
        $enddate=$_GET["txtenddate"];
        $count = 0;
        $sql = "select * from meeting";
        if((!empty($doc_type))||(!empty($topic))||(!empty($startdate))||(!empty($enddate))){
            $sql .= " where ";
        }
        if(!empty($doc_type)){
            if($count>0){
                $sql .= " and ";
            }
            $sql .= "doc_type ='".$doc_type."'";
            $count++;
        }
        if(!empty($topic)){
            if($count>0){
                $sql .= " and ";
            }
            $sql .= "topic like '%".$topic."%'";
            $count++;
        }
        if(!empty($startdate)){        
            if(!empty($enddate)){
                if($count>0){
                    $sql .= " and ";
                }
                $sql .= "(start_date >='".$startdate."' and end_date <='".$enddate."')";
                $count++;
            }else{
                if($count>0){
                    $sql .= " and ";
                }
                $sql .= "start_date ='".$startdate."'";
                $count++;
            }
        }
    
        if(!empty($enddate)){
            if($count>0){
                $sql .= " and ";
            }
            $sql .= "end_date ='".$enddate."'";
            $count++;
        }
        $sql .= " order by start_date desc";    
        //////////////////////////////////////////
        $lists = Base::query($sql)
        ->limit(10)
        ->fetchAll(); //ทั้งหมด   
    
        $link = Base::links();        
        Redirect::view("Report/index", array("lists" => $lists,"link"=>$link));
        }

}
