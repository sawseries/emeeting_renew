<?php require_once './layouts/header.php';?>

<head>
<link href="./assets/css/report.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script type="text/javascript" src="./front/report/report_element.js?key=<?php echo time(); ?>"></script>
<script type="text/javascript" src="./front/report/report_control.js?key=<?php echo time(); ?>"></script>
</head>

<body>
<!-- Page content-->
<div class="container">
<div class="row">
    <div class="white_background" style="min-height:1000px;" style="background-color:red;">
    <div class="header_topic"><h4><i class="fa fa-plus-circle"></i> รายงานการประชุม </h4></div>
    <br>
        <?php if ((isset($_SESSION["Auth"]) == true)) { ?>        
            <div style="width:100%;padding:0;text-align:right;" >
            <a href="./index.php?controller=Report&action=index" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-reply-all" style="font-size:14px;"></i> ย้อนกลับ
                    </a>
                    <a href="./storage/report/<?=$meeting["link"];?>" target="_blank" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-search" style="font-size:14px;"></i> preview
                </a>
            </div>
        <?php } ?>            
        <br>
        <input type="hidden" id="hdncode" name="hdncode" value="<?= $meeting["code"]; ?>">
        <table class="tbl_term table_border" style="width:100%;">
            <tr>
                <td style="width:20%;"> หัวข้อ </td>
                <td >
                    <div id="display_topic">
                        <?=(!empty($meeting["topic"]) ? $meeting["topic"] : ".");?>
                    </div>
                  
                </td>
            </tr>
            <tr>
                <td> ประเภทเอกสาร </td>
                <td style='cursor:no-drop;'>
                    <div id="display_doc_type"><b><?=report($meeting["doc_type"]); ?></b></div>
                </td>
            </tr>
            <tr>
                <td> ห้องประชุม </td>
                <td>
                    <div id="display_room">
                    <?=(!empty($meeting["room"]) ? $meeting["room"] : ".");?>
                    </div>
                </td>
            </tr>
            <tr>
                <td> วันที่เริ่มต้น </td>
                <td>
                    <div id="display_start_date"><?=(!empty($meeting["start_date"]) ? $meeting["start_date"] : "."); ?></div>                    
                </td>
            </tr>            
            <tr>
                <td> วันที่สิ้นสุด </td>
                <td>
                    <div id="display_end_date"><?=(!empty($meeting["end_date"]) ? $meeting["end_date"] : "."); ?></div>                 
                </td>
            </tr>
            <tr>
                <td>เวลาเริ่มต้น</td>
                <td>
                      <div id="display_time_start"><?=(!empty($meeting["time_start"]) ? $meeting["time_start"] : "."); ?></div>
                </td>
            </tr>
               <tr>
                <td>เวลาสิ้นสุด</td>
                <td>
                      <div id="display_time_end"><?=(!empty($meeting["time_end"]) ? $meeting["time_end"] : "."); ?></div>
                </td>
               </tr>
               <tr>
                <td>เอกสาร</td>
                <td>
                     <a href="./storage/report/<?=$meeting["link"];?>" target='_blank'><?=$meeting["link"];?></a> 
                </td>
               </tr>
        </table>
    </div>
</div>
</div>
</div> <!--row-->
</div>    <!--containner-->
</body>
<?php require_once './layouts/footer.php';?>