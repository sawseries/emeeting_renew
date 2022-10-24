<?php require_once './layouts/header_admin.php'; ?>
<head>
<script type="text/javascript" src="./front/user/user_create.js?key=<?php echo time(); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>


<div class="col-md-10 blog-main">
    <div class="blog-post" style="padding:1em;">
        
  <div class="header_topic" style='margin-bottom:10px;margin-top:30px;'>
      <h4><a href='./index.php?controller=User&action=index' style='color:#157DEC;'><i class="fa fa-plus-circle"></i> เพิ่มสมาชิกใหม่ </a></h4>
    </div>
        
     <form method="post" id="registerform" style="width:100%;"  action="./index.php?controller=User&action=insert">
            <table class="tbl_login" style="width:100%;">                   
                <tr>
                        <td style="padding-left:30px;width:20%;">ชื่อ </td>
                        <td style=""><input type="text" class="form-control" id="firstname" name="firstname" required></td>
                </tr>
                <tr>
                        <td style="padding-left:30px;">นามสกุล </td>
                        <td style=""><input type="text" class="form-control" id="lastname" name="lastname" required></td>
                </tr>
                <tr>
                        <td style="padding-left:30px;">หน่วยงาน </td>
                        <td style=""><input type="text" class="form-control" id="department" name="department" required></td>
                </tr>
                <tr>
                        <td style="padding-left:30px;">ตำแหน่ง </td>
                        <td style=""><input type="text" class="form-control" id="position" name="position" required></td>
                </tr>
                <tr>
                        <td style="padding-left:30px;">Email </td>
                        <td style="">
                            <input type="text" class="form-control" id="email" name="email" onchange='email_check(this)' required>
                            <b><span id='email_error' style='color:red;margin-left:10px;'></span></b>
                        </td>
                </tr>
                <tr>
                        <td style="padding-left:30px;">Line </td>
                        <td style=""><input type="text" class="form-control" id="line" name="line" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">เบอร์โทรศัพท์ </td>
                        <td style=""><input type="text" class="form-control" id="phone" name="phone" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">สถานะ </td>
                        <td style="">
                        <select id="status" name="status" class="form-control" style='text-align:left;'> 
                        <?php $status = array(""=>"--สถานะ--","1"=>"User","2"=>"Admin","3"=>"Superadmin");
                            foreach($status as $x=>$x_value){ 
                            if(($_GET["txtstatus"])==$x){  ?>              
                            <option value='<?=$x;?>' selected><?=$x_value;?></option>
                            <?php }else{ ?>
                            <option value='<?=$x;?>'><?=$x_value;?></option>
                            <?php } } ?>
                        </select>
                        </td>
                    </tr>
                  
                    <tr>
                        <td style="padding-left:30px;">Username </td>
                        <td style="">
                            <input type="text" class="form-control" id="username" name="username" onchange='username_check(this)' required>
                            <b><span id='username_error' style='color:red;margin-left:10px;'></span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding-left:30px;'>Password </td>
                        <td><input type="password" class="form-control" id="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td style='padding-left:30px;'>Confirm-Password </td>
                        <td><input type="password" class="form-control" id="confirm_password" name="confirm_password" required data-rule-password="true" data-rule-equalTo="#password"></td>
                    </tr>
                    <tr>
                       
                        <td style='text-align:center;padding:2em;' colspan='2'>
                        <button id="btnregister" type='submit' class="btn btn-info" style='font-size:16pt;'>ลงทะเบียน</button>
                        </td>
                    </tr>
                </table>
                <br>
            </form>
    </div>
</div>
<?php require_once './layouts/footer_admin.php'; ?>
