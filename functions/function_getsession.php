<?php

function auth(){
    if(isset($_SESSION["Auth"])==true){
        return true;
    }else{
        return false;
    }
    
}

function userid(){
    return $_SESSION["user_id"];
}


function user_status(){
    return $_SESSION["status"];
}

function fullname(){
    return $_SESSION["fullname"];
}


?>