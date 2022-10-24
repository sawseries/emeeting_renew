
<?php require_once './layouts/header_admin.php'; ?>
<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />

<div class="col-md-10 blog-main">
    <div class="blog-post" style="padding:1em;">
        <div class="wrapper fadeInDown">
            <div class='reset-box'>
                <h2 class="active" style='color:green;'> ยืนยันสำเร็จ </h2>
                <br>
                <input type='hidden' id='email' name='email' value='<?= $email; ?>'>
                <div style='width:100%;padding:1em;border:1px solid gray;text-align:center;'>
                    <b> เราได้ส่ง Email ยืนยันไปที่ <b><?= $email; ?></b> แล้ว
                        <br><a href='./index.php?controller=User&action=index'>กลับสู่หน้าหลัก</a>
                </div>

            </div>  
        </div>      
    </div>  
</div>   

<?php require_once './layouts/footer_admin.php'; ?>

