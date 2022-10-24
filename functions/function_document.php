<?php

require_once './app/Base.php';

function docname($docid) {
    
    $base = new Base();
    $doc = $base->query("select * from document where id='".$docid."'")->one();
    return $doc["doc_name"];     
}


function docbref($docid) {
    
    $base = new Base();
    $doc = $base->query("select * from document where id='".$docid."'")->one();
    return $doc["bref_nm"];     
}

function menu_preview($prv){
    $base = new Base();
    $doc = $base->query("select * from document")->fetchAll();
    $preview = [];
    $i=0;
    foreach($doc as $docs){

        if(preview(userid(),$prv,$docs["id"])){
             $preview[$i] = $docs;
             $i++;
        }

    }

    return $preview;

}


?>