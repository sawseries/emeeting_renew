<?php

require_once './app/Base.php';

class AdminController extends Base {
    var $strsub;
    public  $j=0;

    public function __construct() {
        if (!(auth())) {
            Redirect::url("Auth", "loginpage");
        }
    }

    public function showdoc() {
        if (user_status() >= 2){
            switch ($_GET["doc"]) {
                case 1:
                    if(preview(userid(),'read','Agenda')){   
                    Redirect::url("Agenda", "index");
                    }break;
                case 2:
                    if(preview(userid(),'read','Report')){
                       Redirect::url("Report", "index");
                    }break; 
                case 3:
                    if(preview(userid(),'read','Member')){
                    Redirect::url("User", "index");
                    }break;
              }
        }
    }

    public function index() {
        $lists = Base::query("SELECT * FROM meeting order by start_date desc")
                ->limit(10)
                ->fetchAll(); //ทั้งหมด    
        $link = Base::links();        
        Redirect::view("admin/index", array("lists" => $lists,"link"=>$link));
    }

    public function delete_doc() {        
        $data = Base::query("select * from meeting where code='" . $_GET["code"] . "'")->one(); //checkfile
        if(($data["doc_type"]=='2')&&(!empty($data["link"]))){  //รายงานการประชุม
            if(file_exists("./storage/report/".$data["file"])){
                unlink("./storage/report/".$data["file"]);
            }
        }
        $delete = Base::query("delete from meeting where code='" . $_GET["code"] . "'")->execute();
        $delete_term = Base::query("delete from meeting_term where doc_code='" . $_GET["code"] . "'")->execute();
        Redirect::url("Admin", "index");
    }

   public function search() {
    $doc_type=$_GET["txtdoctype"];
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
    Redirect::view("admin/index", array("lists" => $lists,"link"=>$link));
    }
 
}
