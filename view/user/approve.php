<?php require_once './layouts/header_admin.php'; ?>
<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />

 <div class="col-md-10 blog-main">
    <div class="blog-post" style="padding:1em;">
  <div class="wrapper fadeInDown">
    <div class='reset-box' style='height:200px;padding-top:50px;'>
    <b>ท่านต้องการอนุมัติการเป็นสมาชิก สำหรับ <?=$email;?> หรือไม่ ?</b>
     <br><br>
     <form method='post' action='./index.php?controller=User&action=Approve'>
     <input type='hidden' id='userid' name='userid' value='<?=$userid;?>'>
     <table style='border:0px;width:30%;margin:0 auto;'>
      <tr> 
        <td><button type='submit'  class='btn btn-success' id='approve' name='approve' value='1'>อนุมัติ</button> </td>
        <td><button type='submit'  class='btn btn-danger'  id='approve' name='approve' value='2'>ไม่อนุมัติ</button> </td>
        <td><a href='./index.php?controller=User&action=edit_user&id=<?=$userid;?>' class='btn btn-default'>ยกเลิก</a></td>
      </tr> 
     </table>

     </form>
    </div>  
  </div>        
  </div>  
  </div>   

<?php require_once './layouts/footer_admin.php'; ?>