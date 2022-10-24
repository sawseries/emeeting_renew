
<?php
require_once './layouts/header.php';
?>

<script type="text/javascript" src="./front/master/master_element.js?key=<?php echo time(); ?>"></script>

                <!-- Page content-->
                <div class="container" id="page-content-wrapper" style='padding:0;'>
                   <div class="row white text" style="min-height:1200px;padding-bottom:50px;overflow-x:auto;">    
            
                
                    <?php if(isset($meeting)){ ?>
                    <br>
                    <div class='topic'>
                        <b><?= trim($meeting["doctopic_text"]); ?></b>
                    </div>
                   

                  
                    <div style="text-align:left;padding:0.5em;width:80%;background-color:red;">
                
                    <?=trim($meeting["detail"]);?>
                    </div>
                    <div style="text-align:left;padding:0.5em;width:80%;margin:auto;">
                    <?php if($meeting["type"]=='2'){ ?>
                        <table style="width:90%;margin:20px;">
                            <tr>
                                <th style="width:20%;">Link :  </th>
                                <td style="padding:0.2em;">
                                    <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a>
                                </td>
                            </tr>
                        </table>
                    <?php }else if($meeting["type"]=='3'){ ?>
                        <table style="width:90%;margin:20px;">
                            <tr>
                                <th style="width:20%;">conference   </th>
                                <td style="padding:0.2em;">
                                <a href="<?= $meeting["link"]; ?>" target="_blank" style="width:100px;"><img src="./assets/image/zoom.jpg" width="200"></a>
                                </td>
                            </tr>
                        </table>
                   <?php } ?>  
                   </div>

                   <div class="display" style="margin:0 auto;font-size:12pt;width:80%;margin-top:20px;">
                    
                    <table class="tbl_index" border="0" style="width:100%;">
                    <?php echo $terms;?>                            
                    </table>    
                    </div>

                   <div class="mobile" style="font-size:12pt;overflow-x:scroll;">
                   <table class="tbl_index" border="0" style="width:100%;">
                    <?php echo $terms_mobile;?>                            
                  </table>    
                  </div>
                </div> 
                <?php 
                }else{ ?>
                <div class="panel_blue" style="text-align:center;font-size:20pt;">
                <b>ไม่มีวาระการประชุมในขณะนี้</b>
                </div>   

                <?php }
                ?>
                </div> <!--endcard-->
        <!--modal-->
        <div  class="modal"  id="report_modal" tabindex="-1" role="dialog">
        <div class="modal-content" style=''>
        <div style='width:100%;text-align:right;'>
            <a class="btn btn-default" rel="modal:close">close</a>
        </div> 
        <div id='show_report_modal' style='padding:1em;margin:auto;width:40%;'></div>       
        </div>    
        </div>
        <!--modal-->

    </div> <!--end containner-->

<?php require_once './layouts/footer.php';?>

