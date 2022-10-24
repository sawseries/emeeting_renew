
<?php
require_once './layouts/header_main.php';
?>
<!-- Page content-->
<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script type="text/javascript" src="./front/auth/register_control.js?key=<?php echo time(); ?>"></script>
<!-- Page content-->
<script>
	$(document).ready(function(){
        showmodal();
	});
</script>
<div class="container-fluid white" id="page-content-wrapper" style='min-height:1200px;'>                 
    <div class="row">   
    <div class="wrapper">
    <div class="row login_block" style="">
            <form method="post" id="registerform" style="width:100%;"  action="./index.php?controller=Auth&action=register">

                <table class="tbl_login" style="width:100%;">
                    <tr class="tbl_header">
                        <td colspan="2" style="text-align:center;">
                            <h4> <b>ลงทะเบียน</b> </h4>  
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;width:20%;">ชื่อ </td>
                        <td style=""><input type="text" class="fadeIn" id="firstname" name="firstname" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">นามสกุล </td>
                        <td style=""><input type="text" class="fadeIn" id="lastname" name="lastname" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">หน่วยงาน </td>
                        <td style=""><input type="text" class="fadeIn" id="department" name="department" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">Email </td>
                        <td style="">
                            <input type="text" class="fadeIn" id="email" name="email" onchange='email_check(this)' required>
                            <br><b><span id='email_error' style='color:red;margin-left:10px;'></span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">Line </td>
                        <td style=""><input type="text" class="fadeIn" id="line" name="line" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">เบอร์โทรศัพท์ </td>
                        <td style=""><input type="text" class="fadeIn" id="phone" name="phone" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">ตำแหน่ง </td>
                        <td style=""><input type="text" class="fadeIn" id="position" name="position" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:30px;">Username </td>
                        <td style="">
                            <input type="text" class="fadeIn" id="username" name="username" onchange='username_check(this)' required>
                            <br><b><span id='username_error' style='color:red;margin-left:10px;'></span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style='padding-left:30px;'>Password </td>
                        <td><input type="password" class="fadeIn" id="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td style='padding-left:30px;'>Confirm-Password </td>
                        <td><input type="password" class="fadeIn" id="confirm_password" name="confirm_password" required data-rule-password="true" data-rule-equalTo="#password"></td>
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

 
    </div>

   



        
</div> <!--end -->

<!-- The Modal -->
<div id="confirm" class="modal_register">
  <!-- Modal content -->
  <div class="modal-contents" style='height:auto;padding-botttom:50px;'>
    <div class="text" style="height:auto;overflow-y:scroll;padding-left:2em;padding-right:2em;"> 
    <br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน 
ได้แก่ ชื่อ-นามสกุล หน่วยงาน ตำแหน่ง เบอร์โทรศัพท์ อีเมล ไลน์ เพื่อนำไปใช้ในการติดต่อสื่อสาร 
อันเป็นกรณีฐานประโยชน์โดยชอบธรรมตามมาตรา 24(5) ของพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล

<br><br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะไม่เปิดเผยข้อมูลส่วนบุคคลนี้แก่บุคคลภายนอก 
และเก็บข้อมูลดังกล่าวเป็นระยะเวลาเท่าที่จำเป็นเพื่อการบรรลุวัตถุประสงค์ในการประมวลผลข้อมูล 
ทั้งนี้ อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะลบและทำลายข้อมูลส่วนบุคคลของท่าน
เมื่อสิ้นสุดเวลาตามวัตถุประสงค์นั้น

<br><br>ท่านในฐานะเจ้าของข้อมูลส่วนบุคคลมีสิทธิดำเนินการตามขอบเขตที่กฎหมายอนุญาตให้กระทำได้ 
ดังต่อไปนี้ สิทธิในการขอเพิกถอนความยินยอม สิทธิในการขอเข้าถึงข้อมูลส่วนบุคคล 
สิทธิในการขอแก้ไขข้อมูลส่วนบุคคลให้ถูกต้อง สิทธิในการขอลบหรือทำลายข้อมูลส่วนบุคคล 
สิทธิในการขอระงับการใช้ข้อมูลส่วนบุคคล สิทธิในการขอรับ ขอให้ส่ง หรือโอนข้อมูลส่วนบุคคลของท่าน 
และสิทธิในการคัดค้านการประมวลผลข้อมูลส่วนบุคคล

<br><br>กรณีท่านมีข้อสอบถามเกี่ยวกับการคุ้มครองข้อมูลส่วนบุคคล สามารถติดต่อได้ที่ 
อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ต.ทุ่งใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
</div>
<br><br>
<center><a class="btn btn-info" onclick='closemodal();' style="padding:1em;width:150px;">ยินยอม</a></center>
<br><br>
</div>
</div>
     <!--modal-->
        <div  class="modal"  id="confirm"  aria-hidden="true">
        <div class="modal-content">
        <div class="text" style="height:auto;overflow-y:scroll;padding-left:2em;padding-right:2em;"> 
<br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน 
ได้แก่ ชื่อ-นามสกุล หน่วยงาน ตำแหน่ง เบอร์โทรศัพท์ อีเมล ไลน์ เพื่อนำไปใช้ในการติดต่อสื่อสาร 
อันเป็นกรณีฐานประโยชน์โดยชอบธรรมตามมาตรา 24(5) ของพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล

<br><br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะไม่เปิดเผยข้อมูลส่วนบุคคลนี้แก่บุคคลภายนอก 
และเก็บข้อมูลดังกล่าวเป็นระยะเวลาเท่าที่จำเป็นเพื่อการบรรลุวัตถุประสงค์ในการประมวลผลข้อมูล 
ทั้งนี้ อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะลบและทำลายข้อมูลส่วนบุคคลของท่าน
เมื่อสิ้นสุดเวลาตามวัตถุประสงค์นั้น

<br><br>ท่านในฐานะเจ้าของข้อมูลส่วนบุคคลมีสิทธิดำเนินการตามขอบเขตที่กฎหมายอนุญาตให้กระทำได้ 
ดังต่อไปนี้ สิทธิในการขอเพิกถอนความยินยอม สิทธิในการขอเข้าถึงข้อมูลส่วนบุคคล 
สิทธิในการขอแก้ไขข้อมูลส่วนบุคคลให้ถูกต้อง สิทธิในการขอลบหรือทำลายข้อมูลส่วนบุคคล 
สิทธิในการขอระงับการใช้ข้อมูลส่วนบุคคล สิทธิในการขอรับ ขอให้ส่ง หรือโอนข้อมูลส่วนบุคคลของท่าน 
และสิทธิในการคัดค้านการประมวลผลข้อมูลส่วนบุคคล

<br><br>กรณีท่านมีข้อสอบถามเกี่ยวกับการคุ้มครองข้อมูลส่วนบุคคล สามารถติดต่อได้ที่ 
อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ต.ทุ่งใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
</div>    

</div>  
<br><br>
<center><a class="btn btn-info" onclick="document.getElementById('confirm').style.display='none'" style="padding:1em;width:150px;">ยินยอม</a></center>
<br><br>
</div>  
        <!--modal-->

      </div>
    </div>
  </div>
</div> 


</div> <!--end -->



<?php
require_once './layouts/footer_main.php';
?>