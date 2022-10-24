<?php

require_once './app/Base.php';

function preview($userid,$prv,$bref) {
    
    $base = new Base();
    $doc = $base->query("select * from user_privilege where user_id='".$userid."' and bref_nm='".$bref."'")->one();
    if(!empty($doc)){
    if($doc["$prv"]==1){
    return true;    
    }else{
    return false;
    }
    }


}


?>