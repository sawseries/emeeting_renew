<!--modal-->
<div class="modal"  id="root_modal" tabindex="-1" role="dialog"    tabindex="-1">
                    <div class="modal-content">
                    <div class='loader' id='loader_insert_root' style='display:none;'></div>
                    <div style='padding:1em;'>
                    <h4 class="modal-title" id="label"><b>เพิ่มหัวข้อ</b></h4>
                    </div>
                    <form id="frminsertroot" name="frminsertroot" method="post" onsubmit="this.disabled=true;" enctype="multipart/form-data">
                    <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $item["code"]; ?>" class="form-control">    
                   
                    <table class="tbl_term table_border" style="width:100%;" >
                           
                           
                            <tr>
                                <td>affter column: </td>
                                <td>
                                    <select id="hdntop" name="hdntop" class="form-control">
                                    <?php 
                                    if($topic->num_rows>0){
                                        foreach($topic as $topics){ ?>
                                        <option value="<?=$topics["no"];?>"> <?=$topics["title"];?> : <?=$topics["topic"];?> </option>
                                    <?php }
                                    
                                    }else{ ?>
                                        <option value="0">---</option>
                                    <?php }   ?>
                                
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%;">หัวเรื่อง</td>
                                <td>
                                <div id='tool_title1' class="editor-controls">
                                <?php require('./app/editor.php');?>       
                                </div>
                                <div id='editor_title1' class='editor-text-box' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttitle1" name="txttitle"></textarea>   
        
                                </div>  
                                                    
                                </td>
                            </tr>
                            <tr>
                                <td>หัวข้อ</td>
                                <td>
                                <div id='tool_topic1' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic1' class='editor-text-box' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttopic1" name="txttopic" maxlength="50"></textarea>
                                </div> 
                                </td>
                            </tr>
                            <tr>
                                <td><img src='./assets/image/powerpoint.png' style='width:15%;height:15px;'>ไฟล์นำเสนอ <span style='font-size:7pt;color:red;'>(*.pptx,pdf)</span></td>
                                <td>
                                <input type='file' id='txt_root_file_present' name='txt_root_file_present' onchange='file_present(this,"root");' class="form-control">
                                <b><span id='error_root_file_present' style='color:red;'></span></b>
                                </td>
                            </tr>
                            <tr>
                                <td>ประเภท </td>
                                <td>
                                    <table style="width:80%;">
                                        <tr>
                                            <td style='width:5%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('1');" value="1" required></td>
                                            <td style='width:6%;text-align:center;'>ข้อความ</td>
                                            <td style='width:5%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('2');" value="2" required></td>
                                            <td style='width:6%;text-align:center;'>ลิ้งค์</td> 
                                            <td style='width:5%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('3');" value="3" required></td>
                                            <td style='width:30%;text-align:left;'><img src='./assets/image/pdf.png' style='width:10%;height:20px;'>  เอกสารประกอบ</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_insert_root" style="display:none;">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txtlink" name="txtlink" style="width:100%;"></td>
                            </tr>    
                            <tr id="tr_file_insert_root" style="display:none;">
                                <td>
                                    <a class='btn btn-info' onclick="Addfile('root');" title='เพิ่มไฟล์'>
                                    <i class="fa fa-plus"  style="font-size:14px;"></i>
                                </a> 
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" id="hdn_root_file" name="hdn_root_file" value='0'>
                                    
                                    <div id='div_file_root' style='width:100%;'></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><span id='s_insert_root_error' style='color:red;'></span></td>
                            </tr>  
                          
                        </table>

                        <div class="modal-footer">
                        <button type="submit" id="btninsertroot" name="btninsertroot" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" href="#" rel="modal:close">Close</a>
                        </div>
                                  
                    </form>
                    </div>
</div>
<!--modal-->
<!--modal-->
<div  class="modal"  id="edit_root_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <div class='loader' id='loader_edit_root' style='display:none;'></div>
                    <form id="frmeditroot" name="frmeditroot" onsubmit="this.disabled=true;" action="./index.php?controller=Agenda&action=edit_root" method="post" enctype="multipart/form-data">
                    <div style='padding:1em;'>
                    <h4 class="modal-title" id="label"><b>แก้ไขหัวข้อ</b></h4>
                        <input type="hidden" id="hdneditdoc_code" name="hdneditdoc_code" value="<?= $item["code"]; ?>" class="form-control">
                        <input type="hidden" id="hdn_edit_root_id" name="hdn_edit_root_id">    
                        <input type="hidden" id="hdn_edit_root_code" name="hdn_edit_root_code"> <!--ajax-->
                        <input type="hidden" id="hdn_edit_root_doc_code" name="hdn_edit_root_doc_code"> <!--ajax-->                 
                    </div>
                        <table class="tbl_term border" style="width:100%;" >
                 
                        <tr>
                                <td style="width:20%;">หัวเรื่อง</td>
                                <td>
                                <div id='tool_title2' class="editor-controls">
                                <?php require('./app/editor.php');?>       
                                </div>
                                <div id='editor_title2' class='editor-text-box' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttitle2" name="txttitle"></textarea>   
        
                                </div>  
                                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="">หัวข้อ</td>
                                <td>
                                <div id='tool_topic2' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic2' class='editor-text-box' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttopic2" name="txttopic" maxlength="50"></textarea>
                                </div> 
                                </td>
                            </tr>  
                            <tr id="tr_edit_root_file_present">
                                <td><img src='./assets/image/powerpoint.png' style='width:15%;height:15px;'>ไฟล์นำเสนอ <span style='font-size:7pt;color:red;'>(*.pptx,pdf)</span></td>
                                <td>
                                    
                                    <div id='control_edit_root_file_present' style='display:none;'>
                                    <input type="hidden" id="hdn_edit_root_file_present" name="hdn_edit_root_file_present" class="form-control">
                                    <span id='text_edit_root_file_present'></span> <a onclick='file_present_toggle("root");' style='color:blue;'><b>แก้ไข</b></a> <a style='color:red;cursor:pointer;' onclick='delete_file_present("root");'><b>ลบ</b></a>
                                    </div>
                                    <div id='ele_edit_root_file_present' style='display:none;'>
                                    <input type="file" id='txt_edit_root_file_present' name='txt_edit_root_file_present' onchange='file_present(this,"edit_root");' class="form-control">
                                    
                                    </div>
                                    <b><span id='error_edit_root_file_present' style='color:red;'></span></b> 
                                </td>
                            </tr>               
                            <tr>
                                <td>ประเภท</td>
                                <td>
                                    <table style="width:80%;">
                                    <tr>
                                        <td style='width:3%;text-align:center;'><input type="radio" id="rdo_edit_root_text" name="rdo_edit_root_type" onclick="selects_edit_root('1');" value="1" required></td>
                                        <td style='width:5%;text-align:center;'>ข้อความ</td>
                                        <td style='width:3%;text-align:center;'><input type="radio" id="rdo_edit_root_link" name="rdo_edit_root_type" onclick="selects_edit_root('2');" value="2" required></td>
                                        <td style='width:5%;text-align:center;'>ลิ้งค์</td> 
                                        <td style='width:3%;text-align:center;'><input type="radio" id="rdo_edit_root_file" name="rdo_edit_root_type" onclick="selects_edit_root('3');" value="3" required></td>
                                        <td style='width:20%;text-align:left;'>เอกสารประกอบ</td>
                                    </tr>    
                                    
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_edit_root" class="displaynone">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txt_edit_root_link" name="txt_edit_root_link" style="width:100%;"></td>
                            </tr>    
                            <tr id="tr_file_edit_root" class="displaynone">
                                <td>
                                    <a class='btn btn-info' onclick="Addfile('edit_root');" title='เพิ่มไฟล์'><i class="fa fa-plus"  style="font-size:14px;"></i></a>
                                </td>
                                <td>
                                    <div id='control_edit_file_root'></div>
                                    <div id='div_file_edit_root' style='width:100%;'>
                                    <input type="hidden" class="form-control" id="hdn_edit_root_file" name="hdn_edit_root_file" value='0'></div>
                                </td>
                            </tr>    
                            <tr id='tr_edit_root_error'>
                                <td></td>
                                <td><span id='s_edit_root_error' style='color:red;'></span></td>
                            </tr>  
                        </table>
                        <div class="modal-footer">
                        <button type="submit" id="btneditroot" name="btneditroot" class="btn btn-primary">แก้ไข</button>
                        <a class="btn btn-default" href="#" rel="modal:close">Close</a>                        
                        </div>
                        </form>
                    </div>
</div>
<!--modal-->

<!--modal-->
<div  class="modal"  id="sub_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <form id="frminsertsub" action="./index.php?controller=Agenda&action=insert_sub" onsubmit="this.disabled=true;" method="post" enctype="multipart/form-data">
                <div>
                    <div style='padding:1em;'>
                    <h4 class="modal-title" id="label"><b>เพิ่มหัวข้อย่อย</b></h4>
                    <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $item["code"]; ?>" class="form-control">
                    <input type="hidden" id="hdnsubtop" name="hdnsubtop" value="" class="form-control">
                    </div>
                    <div class="modal-body">
                    <div class='loader' id='loader_insert_sub' style='display:none;'></div>
                        <table class="tbl_term border" style="width:100%;">
                            <tr>
                            <td style="width:20%;">หมายเลข</td>
                            <td><input type='text' id='number' name='number' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" class='form-control' style='width:15%;text-align:center;'></td>
                            </tr>
                            <tr>
                                
                                <td>หัวข้อ</td>
                                <td>
                                <div id='tool_topic3' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic3' class='editor-text-box' style='height:150px;overflow:auto;' contenteditable></div>                    
                              
                                </div>
                                <textarea class="form-control displaynone" id="txttopic3" name="txttopic" maxlength="50"></textarea> 
                                </td>
                            </tr>
                            <tr>
                            <td><img src='./assets/image/powerpoint.png' style='width:15%;height:15px;'>ไฟล์นำเสนอ <span style='font-size:7pt;color:red;'>(*.pptx,pdf)</span></td>
                                <td>
                                <input type='file' id='txt_sub_file_present' name='txt_sub_file_present' onchange='file_present(this,"sub");' class="form-control">
                                <b><span id='error_sub_file_present' style='color:red;'></span></b>
                                </td>
                            </tr>        

                            <tr>
                                <td>แนบไฟล์ </td>
                                <td>
                                    <table style="width:80%;">
                                        <tr>
                                            <td style='width:3%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('1');" value="1" required></td>
                                            <td style='width:6%;'>ข้อความ</td>
                                            <td style='width:3%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('2');" value="2" required></td>
                                            <td style='width:6%;'>ลิ้งค์</td> 
                                            <td style='width:3%;'><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('3');" value="3" required></td>
                                            <td style='width:20%;text-align:left;'>เอกสารประกอบ</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            
                            <tr id="tr_sub_link" class="displaynone">
                                <td>link </td>
                                <td><input type="text" id="txtlink" name="txtlink" class="form-control"></td>
                            </tr>    
                            <tr id="tr_sub_file" class="displaynone">
                                <td><a class='btn btn-info' onclick="Addfile('sub');" title='เพิ่มไฟล์'><i class="fa fa-plus"  style="font-size:14px;"></i></a></td>
                                <td>
                                <input type="hidden" class="form-control" id="hdn_sub_file" name="hdn_sub_file" value='0'>
                                <div id='div_file_sub' style='width:100%;'></div>
                               
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <span id='s_insert_sub_error' style='color:red;'></span></td>
                            </tr>    

                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" id="btninsertsub" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" rel="modal:close">close</a>
                    </div>
                </div>
            </form>
                    </div>
</div>
<!--modal-->


<!--modal-->
<div  class="modal"  id="edit_sub_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <form id="frmeditsub" onsubmit="this.disabled=true;" action="./index.php?controller=Agenda&action=edit_sub" method="post" enctype="multipart/form-data">
                    <div>
                    <div style='padding:1em;'>
                    <h4 class="modal-title" id="label"><b>แก้ไขหัวข้อย่อย</b></h4>
                        <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $item["code"]; ?>" class="form-control">
                        <input type="hidden" id="hdn_edit_sub_id" name="hdn_edit_sub_id" value="" class="form-control">

                        <input type="hidden" id="hdn_edit_sub_code" name="hdn_edit_sub_code"> <!--ajax-->
                        <input type="hidden" id="hdn_edit_sub_doc_code" name="hdn_edit_sub_doc_code"> <!--ajax-->                   
                    </div>
                    <div class="modal-body">
                    <div class='loader' id='loader_edit_sub' style='display:none;'></div>
                        <table class="tbl_term border" style="width:100%;">
                        <tr>
                            <td style="width:20%;">หมายเลข</td>
                            <td><input type='text' id='txtsub_number' name='number' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" class='form-control' style='width:15%;text-align:center;'></td>
                            </tr>
                            <tr>
                                <td style="width:20%;">หัวข้อ</td>
                                <td>
                                <div id='tool_topic4' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic4' class='editor-text-box' style='height:250px;overflow:auto;' contenteditable></div>                    
                                
                                </div> 
                                <textarea class="form-control  displaynone" id="txttopic4" name="txttopic4" maxlength="50"></textarea>
                                </td>
                            </tr>
                                
                            <tr id="tr_edit_sub_file_present">
                                <td><img src='./assets/image/powerpoint.png' style='width:15%;height:15px;'>ไฟล์นำเสนอ <span style='font-size:7pt;color:red;'>(*.pptx,pdf)</span></td>
                                <td>
                                    
                                    <div id='control_edit_sub_file_present' style='display:none;'>
                                    <input type="hidden" id="hdn_edit_sub_file_present" name="hdn_edit_sub_file_present" class="form-control">
                                    <span id='text_edit_sub_file_present'></span> <a onclick='file_present_toggle("sub");' style='color:blue;'><b>แก้ไข</b></a> <a style='color:red;cursor:pointer;' onclick='delete_file_present("sub");'><b>ลบ</b></a>
                                    </div>
                                    <div id='ele_edit_sub_file_present' style='display:none;'>
                                    <input type="file" id='txt_edit_sub_file_present' name='txt_edit_sub_file_present' onchange='file_present(this,"edit_sub");' class="form-control">
                                    
                                    </div>
                                    <b><span id='error_edit_sub_file_present' style='color:red;'></span></b> 
                                </td>
                            </tr>            

                            <tr>
                                <td>แนบไฟล์ </td>
                                <td>
                                    <table style="width:80%;">
                                    <tr>
                                            <td style='width:5%;'><input type="radio"  id="rdo_edit_sub_text" name="rdo_edit_sub_type" onclick="selecteditsub('1');" value="1" required></td>
                                            <td style='width:6%;text-align:center;'>ข้อความ</td>
                                            <td style='width:5%;'><input type="radio"  id="rdo_edit_sub_link" name="rdo_edit_sub_type" onclick="selecteditsub('2');" value="2" required></td>
                                            <td style='width:6%;text-align:center;'>ลิ้งค์</td> 
                                            <td style='width:5%;'><input type="radio" id="rdo_edit_sub_file" name="rdo_edit_sub_type" onclick="selecteditsub('3');" value="3" required></td>
                                            <td style='width:30%;text-align:left;'><img src='./assets/image/pdf.png' style='width:10%;height:20px;'>  เอกสารประกอบ <span style='font-size:9pt;color:red;'>(*.pdf)</span></td>
                                    </tr>    
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_edit_sub" class="displaynone">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txteditsublink" name="txteditsublink" style="width:100%;"></td>
                            </tr>    
                           
                            
                            <tr id="tr_file_edit_sub" class="displaynone">
                                <td>
                                    <a class='btn btn-info' onclick="Addfile('edit_sub');" title='เพิ่มไฟล์'><i class="fa fa-plus"  style="font-size:14px;"></i></a>
                                </td>
                                <td>
                                    <div id='control_edit_file_sub'></div>
                                    <div id='div_file_edit_sub' style='width:100%;'><input type="hidden" class="form-control" id="hdn_edit_sub_file" name="hdn_edit_sub_file" value='0'></div>
                                </td>
                            </tr>    
                            <tr id='tr_edit_sub_error'>
                                <td></td>
                                <td><span id='s_edit_sub_error' style='color:red;'></span></td>
                            </tr>  

                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" id="btneditsub" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" rel="modal:close">close</a>
                    </div>
                </div>
            </form>
                    </div>
</div>
<!--modal-->



<!--modal-->
<div  class="modal"  id="report_modal" tabindex="-1" role="dialog">
    <div class="modal-content" style=''>
       
        <div style='width:100%;text-align:right;'>
         <!--   <a class="btn btn-default" onclick='close_popup_report();'>close</a> -->
         <a class="btn btn-default" rel="modal:close">close</a>
            <input type='hidden' id='hdn_report_code' name='hdn_report_code'>
        </div> 

        <div id='show_report_modal' style='padding:1em;margin:auto;width:40%;'></div>       

      
    </div>    
</div>
<!--modal-->