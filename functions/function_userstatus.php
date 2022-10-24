<?php

function u_status($status){

    switch($status){
        case '1' : return "User";
        case '2' : return "Admin";
        case '3' : return "Superadmin";
        default : return "No status";

    }

}

function approve($status){

    switch($status){
        case '0' : return "<span style='color:blue;'>รออนุมัติ</span>";
        case '1' : return "<span style='color:green;'>อนุมัติ</span>";
        default : return "<span style='color:red;'>ไม่อนุมัติ</span>";

    }

}

?>