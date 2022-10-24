<?php

require_once './app/Base.php';

function subcode() {
    
    $base = new Base();
    $sub = $base->query("select 100000+max(id)+1 as mx from meeting_term")->one();
   
    if(empty($sub["mx"])){
        return "S00001";
   }else{
       return "S" . substr($sub["mx"],1);     
   }
}

?>