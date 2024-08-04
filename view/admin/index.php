
<?php
require_once './layouts/header_admin.php';
?>


<link href="./assets/css/admin.css?key=<?php echo time(); ?>" rel="stylesheet" />

<div class="container white" id="page-content-wrapper" style='min-height:1200px;'>                 
  <div class="row">      


  <?php if ((isset($_SESSION["Auth"]) == true)) {  ?> 
   
  <div style="width:100%;padding-bottom:10px;margin-top:5px;"> 
  <div class="dropdowns">
  <div class="btns" style="border-left:1px solid #0d8bf2;font-size:11pt;">
   เพิ่มเอกสารใหม่ <i class="fa fa-caret-down"></i>
  <div class="dropdown-contents">
    <?php if(preview(userid(),'write','Agenda')){ ?>     
    <a href="./index.php?controller=Agenda&action=create_agenda"><li class='fa fa-plus'></li> ระเบียบวาระการประชุม</a>
    <?php } ?> 

    <?php if(preview(userid(),'write','Report')){ ?> 
    <a href="./index.php?controller=Report&action=create_report"><li class='fa fa-plus'></li> รายงานการประชุม</a>
    <?php } ?> 
    
  </div>
  </div>
  </div>  
  </div>   
<?php } ?> 

   
          <div style="overflow-x:auto;">



          <div class='search-panel'>
    <form method="GET" action="./index.php">
    <input type="hidden" class='form-control' id="controller" name="controller" value='Admin'> 
    <input type="hidden" class='form-control' id="action" name="action" value='search'>
    <table style='width:100%;text-align:center;'>
    <tr>
      <td>ประเภท</td>
      <td>
        <select id="txtdoctype" name="txtdoctype" class='form-control' style='text-align:center;'> 
        <?php $doctype = array(""=>"--ประเภทเอกสาร--","1"=>"ระเบียบวาระการประชุม","2"=>"รายงานการประชุม");
         foreach($doctype as $x=>$x_value){ 
          if(($_GET["txtdoctype"])==$x){  ?>              
              <option value='<?=$x;?>' selected><?=$x_value;?></option>
         <?php }else{ ?>
              <option value='<?=$x;?>'><?=$x_value;?></option>
         <?php } } ?>
        </select>
      </td>
      <td>หัวข้อ</td>
      <td><input type="text" class='form-control' style='text-align:center;' id="txttopic" name="txttopic" value='<?php echo (!empty($_GET["txttopic"]) ? $_GET["txttopic"] : ""); ?>' placeholder='หัวข้อ'></td>
      <td> วันที่เริ่มต้น </td>
      <td><input type="date" class='form-control' id="txtstartdate" name="txtstartdate" value='<?php echo (!empty($_GET["txtstartdate"]) ? $_GET["txtstartdate"] : ""); ?>'  placeholder='วันที่เริ่มต้น'></td>
      <td> วันที่สิ้นสุด </td>
      <td><input type="date" class='form-control' id="txtenddate" name="txtenddate" value='<?php echo (!empty($_GET["txtenddate"]) ? $_GET["txtenddate"] : ""); ?>' placeholder='วันที่สิ้นสุด'></td>
      <td><input type="submit" class='btn btn-info' value='Search'></td>
    </tr>
    </table>
    </form>
    </div>


            <table class="table_master" border="1">
                <tr class="header_blue">
                    <td style="text-align:center;">รหัสเอกสาร</td>
                    <td>หัวข้อ</td>
                    <td>ประเภท</td>
                    <td style="text-align:center;">ค่าเริ่มต้น</td>
                     <td>วันที่</td>
                     <td>เวลา</td>
                     
                     <td></td>
                </tr>
                <?php foreach ($lists as $list) { ?>

                  <?php if($list["doc_type"]=='1'){ ?>
                          <tr class='link_to' onclick="window.location='./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>'">
                          <?php }else if($list["doc_type"]=='2'){ ?>
                          <tr class='link_to' onclick="window.location='./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>'">  
                  <?php } ?>

                    


                        <td style="width:10%;text-align:center;"><?= $list["code"]; ?></td>
                        <td style="width:30%;">
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                        <a href="./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>">
                      
                        <?php }else if($list["doc_type"]=='2'){ ?>

                        <a href="./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>">

                        <?php } ?>

                        <?php echo (!empty($list["topic"]) ? $list["topic"] : "--"); ?>
                        </a>
                        </td>
                        <td style="width:15%;">
                            <?= report($list["doc_type"]); ?>
                        </td>
                        <td style="width:10%;text-align:center;">
                        <?php 
                          if($list["active"]=='1'){
                            echo "<span style='color:green;'><b>open</b></span>";
                          }else{
                            echo "<span style='color:red;'><b>close</b></span>";
                          }
                         ?>
                        </td>
                        <td class="text_fit" style="width:15%;">
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." - ".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                        </td>
                        <td class="text_fit" style="width:10%;padding:0;"><?= substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?></td>
                        <td style="width:5%;text-align:center;">
                            <a href="./index.php?controller=Agenda&action=delete_doc&code=<?= $list["code"]; ?>"><i style='color:red;' class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>                            
            </table>
        
        </div>
        <div class="footer_index">
        <?=$link;?>
        </div>
    </div>


    <div class="row gray mobile" style='padding:0;'>
          <div style="overflow-x:auto;">
              <table class="tbl_index" style="width:100%;">
                   <tr class="header_tranparent">
                     <td colspan="2">
                        <b><i class="fa fa-bookmark" style="font-size:25px;"></i> เอกสารทั้งหมด</b><br>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach ($lists as $list) { ?>
                    <tr>
                        <td style="width:5px;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                        <td>
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                          <a href="./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>">
                        
                          <?php }else if($list["doc_type"]=='2'){ ?>
  
                          <a href="./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>">
  
                          <?php } ?>
                                <?=$list["topic"]; ?></a>
                            <br>
                             วันที่ : 
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." - ".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                            เวลา : <?=substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?>
                        </td>
                        <td>
                        <?php 
                          if($list["active"]=='1'){
                            echo "<span style='color:green;'><b>open</b></span>";
                          }else{
                            echo "<span style='color:red;'><b>close</b></span>";
                          }
                         ?>
                        </td>
                        <td><a href="#">ลบ</a></td>
                    </tr>
                   
                <?php } ?>                            
            </table>
        </div>
         <div class="footer_index"></div>
    </div>
        
</div>
</div>




<?php
require_once './layouts/footer_main.php';
?>