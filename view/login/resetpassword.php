
<?php require_once './layouts/header_main.php';?>

<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script>
    $(document).ready(function () {
        $("#resetform").validate();
    });
</script>
<div class="container-fluid" id="page-content-wrapper" style='padding:0;'>    
    <div class="card white one" style="min-height:1200px;">   
        <a style='cursor:pointer;' id="sidebarToggle"><i class="fa fa-bars"></i></a>
        <div class="wrapper fadeInDown">
            <div class='reset-box'>
                <?php if (isset($success)) { ?>
                    <div class='success'><?= $success; ?></div>
                <?php } else if (isset($fail)) { ?>
                    <div class='fail'><?= $fail; ?></div>
                <?php } ?>
                <h2 class="active"> reset-password </h2>
                <form method="post" id="resetform" action="./index.php?controller=Auth&action=resetpassword">
                    <input type='hidden' id='email' name='email' value='<?= $email; ?>'>
                    <input type="password" id="password" name="password" class="fadeIn" style='width:100%;' placeholder="Enter-Password" required>
                    <input type="password" id="confirm-password" name="confirm-password" style='width:100%;' class="fadeIn"  placeholder="confirm-password" required data-rule-password="true" data-rule-equalTo="#password">
                    <input type="submit" class="fadeIn" value="Reset">
                </form> 
            </div>  
        </div>        
    </div>
</div>
<?php require_once './layouts/footer_main.php';?>