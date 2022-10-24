<?php require_once './layouts/header_main.php'; ?>
<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script>
    $(document).ready(function() {
        $("#otpform").validate();
    });
</script>
  <div class="card white one" style="min-height:1200px;">   
  <a style='cursor:pointer;' id="sidebarToggle"><i class="fa fa-bars"></i></a>
  <div class="wrapper fadeInDown">
    <div class='reset-box'>
    <?php if(isset($success)){ ?>
      <div class='success'><?=$success;?></div>
    <?php }else if(isset($fail)){ ?>
      <div class='fail'><?=$fail;?></div>
    <?php } ?>
    <h2 class="active"> Enter-OTP</h2>
    <br>
    <form method="post" id="otpform" action="./index.php?controller=Auth&action=checkotp">
      <input type='hidden' id='email' name='email' value='<?=$email;?>'>
      <div style='width:100%;padding:1em;border:1px solid gray;text-align:center;'>
       เราได้ทำการส่งรหัสยืนยันไปยัง <b><?=$email;?></b> 
      <br>(กรณีไม่พบเมล์ใน Inbox ให้ดูที่ junkmail)
      </div>
      <input type="text" id="otp" name="otp" class="fadeIn" style='width:100%;text-align:center;' placeholder="Enter-Otp" required>
      <input type="submit" class="fadeIn fourth" value="Send">
    </form> 
    </div>  
  </div>        
</div>
<?php require_once './layouts/footer_main.php'; ?>