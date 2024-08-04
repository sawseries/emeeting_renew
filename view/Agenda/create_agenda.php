<?php require_once './layouts/header_admin.php'; ?>
<head>
<script src="./front/agenda/create_agenda.js?key=<?php echo time(); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<div class="col-md-12 blog-main">
    <div class="blog-post" style="padding:1em;">
    <form id='frm_agenda' action="./index.php?controller=Agenda&action=insert_agenda" method="post" enctype="multipart/form-data" />
    <div class="header_topic" style='margin-top:20px;margin-bottom:10px;'>
    <a href='./index.php?controller=Agenda&action=index'>      
        <div class="header_topic"><h4><i class="fa fa-plus-circle"></i> ระเบียบวาระการประชุม</h4></div>
    </a>
    </div>
            <div style='overflow:hidden;'>
               <table class="tbl_create" border="0">
                <tr>
                    <td> หัวข้อการประชุม </td>
                    <td><input type="text" id="txttopic" name="txttopic" class="form-control" required></td>
                </tr>
                  <tr>
                    <td> ชนิดเอกสาร </td>
                    <td>
                    <select id="txtreportype" name="txtreporttype" class="form-control" required>
                        <option value="1" selected>ระเบียบวาระการประชุม</option>
                    </select>
                    </td>
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
                    <td>link / zoom </td>
                    <td>
                        <table style="width:40%;">
                            <tr>
                                <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects('1');" value="1" style='width:50px;' required checked></td>
                                <td>text</td>
                                <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects('2');" value="2" style='width:50px;' required></td>
                                <td>link</td> 
                                <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects('3');" value="3" style='width:50px;' required></td>
                                <td>conference</td>
                            </tr>
                        </table>
                    </td>
                </tr>   
                <tr id="tr_text" class="displaynone">
                    <td>text </td>
                    <td><input type="text" id="txttext" name="txttext"></td>
                </tr>    
                <tr id="tr_link" class="displaynone">
                    <td>link </td>
                    <td><input type="text" id="txtlink" name="txtlink"></td>
                </tr>    
                <tr id="tr_file" class="displaynone">
                    <td>conference </td>
                    <td><input type="text" id="txtzoom" name="txtzoom"></td>
                </tr>    
            </table>
        </div>
    <h4><b>หัวเอกสาร</b></h4>
	    <!-- Editor Control Box -->
<div id='tool_doctopic_text' class="editor-controls">
    <?php require('./app/editor.php');?>
  </div>
         
    <div id='editor_doctopic_text' class='form-control' style='height:250px;' contenteditable></div>                    
    <textarea class="form-control displaynone" id="txtdoctopic_text" name="txtdoctopic_text" style="height:200px;width:100%;"></textarea>
    (ไม่มีไม่ต้องใส่)
 
    <h4><b>รายละเอียดเอกสาร</b></h4>

    <div id='tool_detail' class="editor-controls">
    <?php require('./app/editor.php');?>
    </div>
    <div id='editor_detail' class='form-control' style='height:250px;' contenteditable></div>  
    <textarea class="form-control displaynone" id="txtdetail" name="txtdetail" style="height:200px;width:100%;"></textarea>
    (ไม่มีไม่ต้องใส่)
    <center> <input type="submit" value="บันทึก" class="btn btn-primary" style="width:100px;height:50px;"> </center>
</form>
    </div>
</div>
<?php require_once './layouts/footer_admin.php'; ?>
