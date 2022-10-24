
<?php
require_once './layouts/header_main.php';
?>
<!-- Page content-->

<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />

<script>
    $(document).ready(function() {
        $("#resetform").validate();
    });
</script>


<div class="container-fluid" id="page-content-wrapper" style='padding:0;'>
                  
             
  <div class="card white one" style="min-height:1200px;">   
  <a style='cursor:pointer;' id="sidebarToggle"><i class="fa fa-bars"></i></a>

  <div class="wrapper fadeInDown">




    <div class='reset-box'>

    <?php if(isset($success)){ ?>
      <div class='success'><?=$success;?></div>
    <?php }else if(isset($fail)){ ?>
      <div class='fail'><?=$fail;?></div>
    <?php } ?>

    <h2 class="active"> Reset-password </h2>
    <form method="post" id="resetform" action="./index.php?controller=Auth&action=sendotp">
      <input type="text" id="email" name="email" class="fadeIn" name="login"  style='text-align:center;width:100%;' placeholder="Enter-Email" required>
      <input type="submit" class="fadeIn fourth" value="Send">
    </form> 
    </div>  
  </div>        
</div>
</div>



<?php
require_once './layouts/footer_main.php';
?>