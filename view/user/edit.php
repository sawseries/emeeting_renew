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
                <td class='showedit'>
                  
                 
                    <input id="txt_edit_firstname" name="txt_edit_firstname" class="form-control"  onchange="updates('firstname','<?= $item["id"];?>',this);" value="<?= $item["firstname"]; ?>">
                  
                </td>
            </tr>
            <tr>
                <td> นามสกุล </td>
                <td class='showedit'>
                    <input id="txt_edit_lastname" name="txt_edit_lastname" class="form-control"  onchange="updates('lastname','<?= $item["id"];?>',this);" value="<?= $item["lastname"]; ?>">
                </td>
            </tr>
            <tr>
                <td> ตำแหน่ง </td>
                <td class='showedit'>
              
                    <input id="txt_edit_position" name="txt_edit_position" class="form-control"  onchange="updates('position','<?= $item["id"];?>',this);" value="<?= $item["position"]; ?>">
               
                </td>
            </tr>
            <tr>
                <td> หน่วยงาน </td>
                <td class='showedit'>
               
                    <input id="txt_edit_department" name="txt_edit_department" class="form-control"  onchange="updates('department','<?= $item["id"];?>',this);" value="<?= $item["department"]; ?>">
               
                </td>
            </tr>
            <tr>
                <td> line </td>
                <td class='showedit'>
                    <input id="txt_edit_line" name="txt_edit_line" class="form-control"  onchange="updates('line','<?= $item["id"];?>',this);" value="<?= $item["line"]; ?>">
                </td>
            </tr>
            <tr>
                <td> เบอร์โทรศัพท์ </td>
                <td class='showedit'>
                    <input id="txt_edit_phone" name="txt_edit_phone" class="form-control"  onchange="updates('phone','<?= $item["id"];?>',this);" value="<?= $item["phone"]; ?>">
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
                <td class='showedit'>
                  
                    <select id="txt_edit_status" name="txt_edit_status" class='form-control' onchange="updates_select('status','<?= $item['id'];?>',this);"> 
                        <?php $status = array(""=>"--สถานะ--","1"=>"User","2"=>"Admin","3"=>"Superadmin");
                            foreach($status as $x=>$x_value){ 
                            if(($item["status"])==$x){  ?>              
                            <option value='<?=$x;?>' selected><?=$x_value;?></option>
                            <?php }else{ ?>
                            <option value='<?=$x;?>'><?=$x_value;?></option>
                            <?php } } ?>
                    </select>   
                </td>
            </tr>
            <tr>
                <td>ยืนยัน</td>
                <td>
            <input type='hidden' id='userid' name='userid' value='<?=$item["id"];?>'>
            <?php if($item["approve"]=='1'){ ?>
                <span style='color:blue;'><b><i>สำเร็จ</i></b></span>
            <?php }else{  ?>
                <a class='btn btn-default' style='color:red;' href='./index.php?controller=User&action=approvepage&userid=<?=$item["id"];?>'>รอตรวจสอบสิทธิ์</a>
            <?php } ?>
                </td> 
               </tr>
               <tr>
                <td></td>
                <td>
                <input type='submit' class='btn btn-info' value='แก้ไข'>
                </td> 
               </tr>    
            
        </table>
    
        <br><b>กำหนดสิทธิ์</b>
        <hr>
    <table class="table_border" style="width:100%;">
    <tr>
                <td style="width:20%;"> เอกสาร </td>
                <td>
                 <select id='sle_doc_name' name='sle_doc_name' style='width:200px;'>
                    <?php foreach($document as $document){ ?>
                        <option value='<?=$document["id"];?>'><?=$document["doc_name"];?></option>
                    <?php } ?>
                 </select> <a class='btn btn-info' onclick='add_privileges(<?=$item["id"];?>);'>เพิ่ม</a>                  
                </td>
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
                        <td><input type='checkbox' value='<?=$x;?>' onclick='updates_privilege(<?=$item["id"];?>,"<?=$x_value?>","<?=$privileges["doc_id"];?>",this);' checked> <?=$x_value?>   </td>
                        <?php }else{ ?>
                        <td><input type='checkbox' value='<?=$x;?>' onclick='updates_privilege(<?=$item["id"];?>,"<?=$x_value?>","<?=$privileges["doc_id"];?>",this);'> <?=$x_value?>  </td>
                        <?php }                          
                        } ?>
                        <td><a onclick='delete_privileges(<?=$privileges["id"];?>);' style='color:red;'>ลบ</a></td>
                    </tr>  
                    <?php } ?>                           
                    </table>
                    <span id='error'></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' class='btn btn-info' value='กำหนดสิทธิ์'></td>
            </tr>
    </table>                     

        <br><b>แก้ไขรหัสผ่านใหม่</b>
        <hr>

        <div>

        <form method='post' id='frmuser' action='./index.php?controller=User&action=resetpassword'>
        <input type='hidden' id="hdnid" name="hdnid" value='<?=$item["id"];?>'>
        <table class="tbl_term table_border" style="width:100%;margin:0 auto;">
        <tr>
            <td style='width:20%;'> UserName </td>
            <td style='cursor:no-drop;'>
                    <div id="display_username"><b><?=(!empty($item["username"]) ? $item["username"] : ".")?></b></div>
            </td>
        </tr>
        <tr>
                <td> Password </td>
                <td class='showedit'>
                <input type='password' id="password" name="password" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>Confirm-Password </td>
                <td class='showedit'>
                <input type='password' id="txt_confirmpassword" name="txt_confirmpassword" class="form-control" required data-rule-password="true" data-rule-equalTo="#password">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type='submit' class='btn btn-info' value='Reset-Password'>
                </td>
        </tr>
        </table>
            </form>

            <br><b>Last-Login :</b> <?=$item["last_login"];?><br>
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