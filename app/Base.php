<?php

require_once __DIR__.'/autoload.php';
ini_set("memory_limit","1000M");


class Base {

    public $con;
    public $sql;
    public $sql_before;
    public $query;
    public $num;
    public $limits;

    public function __construct() {
        $this->con = $this->getInstance();
    }

    public static function DB() {

        return new Base;
    }
    
    
    public function Auth(){
         if(isset($_SESSION["Auth"])==true){             
             return TRUE;             
         }else{
             return FALSE;
         }
     }

    public function getInstance() {

        $con = new mysqli(DB::$connect["host"], DB::$connect["user"], DB::$connect["password"], DB::$connect["database"]);
        $con->set_charset("utf8");
        return $con;
    }



    public function fetchAll() {
        $query = $this->getInstance()->query($this->sql);
        $query->fetch_row();
        return $query;
    }

    public function query($sql) {

        $this->sql_before = $sql;
        $this->sql = $sql;
        return $this;
    }

    public function limit($limit) {


        $page = 1;
        $start = 1;
        $end = $limit;
        $this->limits = $limit;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        if ($page>1) {
            $start = (($page - 1) * $limit);
            $end = $limit;
            $this->sql .= " limit ".$start.",".$end;
        }else{
            $this->sql .= " limit ".$limit;
        }        
        $limit = $start . ",$limit"; 
        //echo $this->sql;
        return $this;
    }

    public function update() {
        $query = $this->getInstance()->query($this->sql);
        return $query;
    }

    public function insert() {
        $query = $this->getInstance()->query($this->sql);
        return $this;
    }
    
      public function execute() {
        $query = $this->getInstance()->query($this->sql);
        return $this;
    }
    
    
    
     public function insert_last_id() {
        $query = $this->getInstance()->query($this->sql);
        $last_id = $this->getInstance()->insert_id;
        return $last_id;
    }
    
    public function delete() {
        $query = $this->getInstance()->query($this->sql);
        return $query;
    }

    public function paginate($limit) {


        $page = 1;
        $start = 1;
        $end = $limit;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }

        if ($page != 1) {
            $start = (($page - 1) * $limit) + 1;
            $end = $start + $limit;
        }

        $limit = $start . "," . $limit;


        $this->sql .= " " . "limit " . $limit;
        return $this;
    }

    public function links() {

        $page = 1;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }

        $re = $this->getInstance()->query($this->sql_before);
        $re->fetch_row();
        $rs =  $re->num_rows;
        $page_cnt = @ceil($rs / $this->limits);

        $url_link = $_SERVER['REQUEST_URI'];

        if(isset($_GET["page"])){

            $url_link = explode("&page=",  $url_link)[0];
    
        }


        $pagestr = "<div class='pagination'>
                    <a href='$url_link&page=1'>&laquo;</a>";

        if ($page_cnt <= 20) {

            for ($i = 1; $i <= ($page_cnt); $i++) {
                if ($i == $page) {
                    $pagestr .= "<a href='$url_link&page=$i' class='active'>" . $i . "</a>";
                } else {
                    $pagestr .= "<a href='$url_link&page=$i'>$i</a>";
                }
            }
        } else {
            if ($page < 10) {
                for ($i = 1; $i <= 10; $i++) {
                    if ($i == $page) {
                        $pagestr .= "<a href='$url_link&page=$i' class='active'>" . $i . "</a>";
                    } else {
                        $pagestr .= "<a href='$url_link&page=$i'>$i</a>";
                    }
                }

                $pagestr .= "<a href=''> .......... </a>";

              /*  for ($j = ($page_cnt-3); $j <= $page_cnt; $j++) {

                    if ($j == $page) {
                        $pagestr .= "<a href='$url_link&page=$j' class='active'>" . $j . "</a>";
                    } else {
                        $pagestr .= "<a href='$url_link&page=$j'>$j</a>";
                    }
                } */
            } else if (($page < 10) || ($page < ($page_cnt - 10))) {

                $pagestr .= "<a href=''> .......... </a>";

                for ($i = ($page - 3); $i <= $page + 3; $i++) {

                    if ($i == $page) {
                        $pagestr .= "<a href='$url_link&page=$i' class='active'>" . $i . "</a>";
                    } else {
                        $pagestr .= "<a href='$url_link&page=$i'>$i</a>";
                    }
                }

                $pagestr .= "<a href=''> .......... </a>";

                for ($i = ($page_cnt - 3); $i <= $page_cnt; $i++) {

                    if ($i == $page) {
                        $pagestr .= "<a href='$url_link&page=$i' class='active'>" . $i . "</a>";
                    } else {
                        $pagestr .= "<a href='$url_link&page=$i'>$i</a>";
                    }
                }
            } else {

                $pagestr .= "<a href='$url_link=1'>1</a>";

                $pagestr .= "<a href=''> .......... </a>";

                for ($i = ($page - 3); $i <= $page_cnt; $i++) {

                    if ($i == $page) {
                        $pagestr .= "<a href='$url_link&page=$i' class='active'>" . $i . "</a>";
                    } else {
                        $pagestr .= "<a href='$url_link&page=$i'>$i</a>";
                    }
                }
            }
        }

        $pagestr .= "<a href='$url_link&page=$page_cnt'>&raquo;</a></div>";

        return $pagestr;
    }

    public function one() {


        $result = $this->getInstance()->query($this->sql);
        $row=$result->fetch_assoc();
        return $row;
    }

    public static function ip() {
        if (getenv('HTTP_CLIENT_IP'))
            $ip = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ip = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ip = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ip = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ip = getenv('REMOTE_ADDR');
        else
            $ip = 'UNKNOWN';
        //self::$ip = $ip;
        return $ip;
    }

}

?>