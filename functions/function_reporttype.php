<?php

function report($type){

    switch ($type){
        case '1' : return "ระเบียบวาระการประชุม";
        case '2' : return "รายงานการประชุม";
    }
}