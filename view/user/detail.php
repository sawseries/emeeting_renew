<?php
require_once './layouts/header.php';
?>
<head>
<script type="text/javascript" src="./front/user/user_element.js?key=<?php echo time(); ?>"></script>
<script type="text/javascript" src="./front/user/user_control.js?key=<?php echo time(); ?>"></script>
<link href="./assets/css/report.css?key=<?php echo time(); ?>" rel="stylesheet" /> 
</head>
<body>
<!-- Page content-->
<div class="container">
<div class="row" style='padding:0em;'>



    <div class="white_background" style="min-height:1000px;margin:0;"> 
    
    
    
    <div class="header_topic"><a href='./index.php?controller=User&action=index' style='color:#1589FF;'><h3><i class="fa fa-plus-circle"></i> การจัดการสมาชิก </h3></a></div>
    <br>


    <?php if(isset($_GET["success"])){ ?>
    <div class='reset-box' style='color:blue;'><i class="fa fa-telegram" aria-hidden="true" style='font-size:16pt;'></i> <?=$_GET["success"];?></div><br>
    <?php }else if(isset($_GET["fail"])){ ?>
    <div class='fail'><?=$_GET["fail"];?></div><br>
    <?php } ?> 

        <input type="hidden" id="hdnid" name="hdnid" value="<?= $item["id"]; ?>">
        <table class="table_border" style="width:100%;">
            <tr>
                <td style="width:20%;"> ชื่อ </td>
                <td>
                    <div id="display_firstname">
                     
                       <?=(!empty($item["firstname"]) ? $item["firstname"] : ".")?>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td> นามสกุล </td>
                <td>
                    <div id="display_lastname" ><?=(!empty($item["lastname"]) ? $item["lastname"] : ".")?></div>
                    
                </td>
            </tr>
            <tr>
                <td> ตำแหน่ง </td>
                <td>
                    <div id="display_position" ondblclick="showedit('position');"><?=(!empty($item["position"]) ? $item["position"] : ".")?></div>
                    
                </td>
            </tr>
            <tr>
                <td> หน่วยงาน </td>
                <td>
                    <div id="display_department"><?=(!empty($item["department"]) ? $item["department"] : ".")?></div>
                    
                </td>
            </tr>
            <tr>
                <td> line </td>
                <td>
                    <div id="display_line"><?=(!empty($item["line"]) ? $item["line"] : ".")?></div>
                </td>
            </tr>
            <tr>
                <td> เบอร์โทรศัพท์ </td>
                <td>
                    <div id="display_phone"><?=(!empty($item["phone"]) ? $item["phone"] : ".")?></div>
                   
                </td>
            </tr>
            <tr>
                <td> E-mail </td>
                <td style='cursor:no-drop;'>
                    <div id="display_email"><b><?=(!empty($item["email"]) ? $item["email"] : ".")?></b></div>
                    
                </td>
            </tr>
            <tr>
                <td> สถานะ </td>
                <td>
                    <div id="display_status"><?=(!empty($item["status"]) ? u_status($item["status"]) : ".")?></div>
               
                </td>
            </tr>
            <tr>
                <td>ยืนยัน</td>
                <td>
            <input type='hidden' id='userid' name='userid' value='<?=$item["id"];?>'>
            <?php if($item["approve"]=='1'){ ?>
                <span style='color:blue;'><b><i>สำเร็จ</i></b></span>
            <?php }else{  ?>
                <a class='btn btn-default' style='color:red;'>รอตรวจสอบสิทธิ์</a>
            <?php } ?>
                </td>
               </tr>
            
        </table>
    
    <hr>
    <table class="table_border" style="width:100%;">
    <tr>
                <td style="width:20%;"> เอกสาร </td>
                <?php if($item["approve"]=='1'){ ?>
                <td></td>   
                <?php } ?>
            </tr>
            <tr>
                <td> กำหนดสิทธิ์ </td>
                <td>
                    <div>
                    <table style='width:60%;'>
                    <?php foreach($privilege as $privileges){ ?>
                    <tr>
                        <td><?=docname($privileges["doc_id"]);?></td>
                        <?php                         
                        $status = array("1"=>"read","2"=>"write","3"=>"edit","4"=>"delete");                
                        foreach($status as $x=>$x_value){    
                        $action = $user->check_privilege($item["id"],$privileges["doc_id"],$x_value);
                        if($action==1){ ?>
                        <td><i class="fa fa-check-square-o" aria-hidden="true"></i> <?=$x_value?>   </td>
                        <?php }else{ ?>
                        <td><i class="fa fa-square-o" aria-hidden="true"></i> <?=$x_value?>  </td>
                        <?php }                          
                        } ?>
                    </tr>  
                    <?php } ?>                           
                    </table>
                    </div>
                </td>
            </tr>
    </table>                     

        <br><b>Last-Login :</b> <?=$item["last_login"];?>
        <hr>

        <div>
        <input type='hidden' id="hdnid" name="hdnid" value='<?=$item["id"];?>'>
        <table class="tbl_term table_border" style="width:100%;margin:0 auto;">
        <tr>
            <td style='width:20%;'> UserName </td>
            <td style='cursor:no-drop;'>
                    <div id="display_username"><b><?=(!empty($item["username"]) ? $item["username"] : ".")?></b></div>
            </td>
        </tr>
        </table>
        </div>
                        
    </div>
</div>
</div>
</div> <!--row-->
</div>    <!--containner-->


</body>

<?php
require_once './layouts/footer.php';
?>