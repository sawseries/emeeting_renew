
<?php 


function doctext($doc_type){
    $topic_text='';
    if ($doc_type == '1') {
        $topic_text = "ระเบียบวาระการประชุม";
    } else if ($doc_type == '2') {
        $topic_text = "รายงานการประชุม";
    }
    return $topic_text;
}

?>