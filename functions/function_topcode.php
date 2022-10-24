<?php

require_once './app/Base.php';

function topcode() {
    
    $base = new Base();
    $top = $base->query("select 100000+max(id)+1 as mx from meeting")->one();
   
    if(empty($top["mx"])){
        return "T00001";
   }else{
       return "T" . substr($top["mx"],1);     
   }
}


?>