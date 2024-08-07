<?php 


if($_SESSION["status"]>1){
    require_once './layouts/header_admin.php'; 
    }else{
        require_once './layouts/header_main.php';     
    }

?>


<script type="text/javascript" src="./front/master/master_element.js?key=<?php echo time(); ?>"></script>
<style>

</style>
<div class="container" style="background-color:white;margin-top:20px;margin-bottom:10px;">
    
    <div class="row box-shadow1" style="min-height:1000px;">
        <div class="col-md-12 col-lg-12  col-sm-12">
                
                    <?php if (isset($meeting)) { ?>
            
            
                    <!-- Page display-->            
                    <div style="margin:0 auto;height:auto;">
                        <div class='topic'>
                            <b><?= trim($meeting["doctopic_text"]); ?></b>
                        </div>
                        <div style='width:100%;margin-bottom:20px;margin-top:20px;'>
                            <?= trim($meeting["detail"]); ?>
                        </div>
                        <?php if ($meeting["type"] == '2') { ?>
                            <table style="width:90%;">
                                <tr>
                                    <th style="width:20%;">Link :  </th>
                                    <td style="padding:0.2em;">
                                        <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a>
                                    </td>
                                </tr>
                            </table>
                        <?php } else if ($meeting["type"] == '3') { ?>
                            <table style="width:90%;">
                                <tr>
                                    <th style="width:20%;">conference   </th>
                                    <td style="padding:0.2em;">
                                        <a href="<?= $meeting["link"]; ?>" target="_blank" style="width:100px;"><img src="./assets/image/zoom.jpg" width="200"></a>
                                    </td>
                                </tr>
                            </table>
                        <?php } ?>  
                        <table class="tbl_index" border="0" style="width:100%;margin-top:30px;">
                            <?php echo $terms; ?>                            
                        </table>    
                    </div>

                <?php } ?>        
            </div>
                    <div  class="modal"  id="report_modal" tabindex="-1" role="dialog">
        <div class="modal-content" style=''>
        <div style='width:100%;text-align:right;'>
            <a class="btn btn-default" rel="modal:close">close</a>
        </div> 
        <div id='show_report_modal' style='padding:1em;margin:auto;width:40%;'></div>       
        </div>    
        </div>
    </div>
    

</div>
<?php require_once './layouts/footer_main.php'; ?>
