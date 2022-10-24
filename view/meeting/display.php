<?php require_once './layouts/header_main.php'; ?>
<style>
  
</style>

<div class="container"  style="min-height:1000px;">                               
        <div class="row">           
        <div class='display' style='margin-top:30px;width:100%;'>
            <table  border='0' style='' class='table_main' style="width:100%;">
                <tr class="header_blue">
                
                    <th style='width:70%;'><b><i class="fa fa-bookmark" style="font-size:25px;margin-left:10px;"></i> </b> <?=$topic;?></th>
                     <th style='width:15%;'>วันที่</th>
                    <th style='width:15%;'>เวลา</th>
                </tr>
                <?php foreach ($lists as $list) { ?>
                    <?php if($list["doc_type"]=='1'){ ?>
                    <tr class='link_to' onclick="window.location='./index.php?controller=Master&action=detail&code=<?= $list["code"]; ?>'">
                    <?php }else if($list["doc_type"]=='2'){ ?> 
                        <tr class='link_to'  onclick="window.open('./storage/report/<?= $list["link"]; ?>', '_blank')">    
                        <?php } ?>    
                        <td style='width:70%;'>
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                            <a href="./index.php?controller=Master&action=detail&code=<?= $list["code"]; ?>">
                        
                          <?php }else if($list["doc_type"]=='2'){ ?>
  
                          <a href="./storage/report/<?= $list["link"]; ?>" target="_blank">
  
                          <?php } ?>
                        
                                <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i>  <?= $list["topic"]; ?>
                        </a>
                       </td>
                       <td style='width:15%;'>
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." - ".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                              </td>
                              <td style='width:15%;'><?= substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?></td>
                    </tr>
                <?php } ?>                            
            </table>
            </div>


        <div style='width:100%;text-align:right;margin-top:50px;'>
            <?=$links;?>
        </div>

    </div> <!--endcontent-->
    </div> <!--endcontent-->









<?php
require_once './layouts/footer_main.php';
?>