<?php require_once './layouts/header_admin.php'; ?>
<head>
<script src="./front/report/report_create.js?key=<?php echo time(); ?>"></script>
</head>


<div class="col-md-10 blog-main">
    <div class="blog-post" style="padding:1em;">
   <form id='frm_report' action="./index.php?controller=Report&action=insert_report" method="post" enctype="multipart/form-data" />
        
        <div class="header_topic" style='margin-top:20px;margin-bottom:10px;'>
    <a href='./index.php?controller=Report&action=index'><h4><i class="fa fa-plus-circle"></i> รายงานการประชุม </h4></a>
    </div>
          <div style='overflow:hidden;'>
            <table class="tbl_create" border="0">
                <tr>
                    <td> หัวข้อ </td>
                    <td><input type="text" id="txttopic" name="txttopic" class="form-control" required></td>
                </tr>
                 
                <tr>
                    <td> ห้องประชุม </td>
                    <td>
                        <input type="text" id="txtroom" name="txtroom" class="form-control" required>
                            
                    </td>
                </tr>
                <tr>
                    <td> วันที่เริ่มต้น </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="date" id="txtstartdate" name="txtstartdate" required></td>
                                <td>เวลา</td>
                                <td><input type="time" id="txttimestart" name="txttimestart" required></td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td> วันที่สิ้นสุด </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="date" id="txtenddate" name="txtenddate" required></td>
                                <td>เวลา</td>
                                <td><input type="time" id="txttimeend" name="txttimeend" required></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            
                
                <tr>
                    <td> File </td>
                    <td>
                        <input type="file" id="txtfile" name="txtfile" class="form-control" required>
                    </td>
                </tr>
            </table>
            </div>
            <center> <input type="submit" value="บันทึก" class="btn btn-primary" style="width:100px;height:50px;"> </center>
        </div>  
    </form>
    </div>
</div>
<?php require_once './layouts/footer_admin.php'; ?>
