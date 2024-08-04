<?php require_once './layouts/header_admin.php'; ?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="./assets/css/edit_agenda.css?key=<?php echo time(); ?>" rel="stylesheet" />
    <script type="text/javascript" src="./front/agenda/agenda_element.js?key=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="./front/agenda/agenda_control.js?key=<?php echo time(); ?>"></script>
</head>
<div class="col-md-12 blog-main">
    <div class="blog-post" style="padding:1em;padding-bottom:200px;">

        <div>
            <div class="header_topic"><h4><i class="fa fa-plus-circle"></i> ระเบียบวาระการประชุม</h4></div>
            <br>
            <?php if ((isset($_SESSION["Auth"]) == true)) { ?>        
                <div style="width:100%;padding:0;text-align:right;" >
                    <a href="./index.php?controller=Agenda&action=index" class="btn btn-primary" style="color:white;"> 
                        <i class="fa fa-reply-all" style="font-size:14px;"></i> ย้อนกลับ
                    </a>
                    <a target="_blank" href="./index.php?controller=Master&action=detail&code=<?= $item["code"]; ?>" class="btn btn-primary" style="width:100px;color:white;"> 
                        <i class="fa fa-search" style="font-size:14px;"></i> preview
                    </a>
                </div>
            <?php } ?>            
            <br>
            <input type="hidden" id="hdncode" name="hdncode" value="<?= $item["code"]; ?>">
            <table class="tbl_term table_border" style="width:100%;">
                <tr>
                    <td style="width:20%;"> หัวข้อการประชุม </td>
                    <td class='showedit'>
                        <div id="display_topic"  ondblclick="showedit('topic');">
                            <?= (!empty($item["topic"]) ? $item["topic"] : "."); ?>
                        </div>
                        <div id="control_topic" class="displaynone" style="width:100%;">
                            <input id="txt_edit_topic" name="txt_edit_topic"   onchange="updates('topic', '<?= $item["code"]; ?>', this);" class="form-control" value="<?= $item["topic"]; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> ประเภทการประชุม </td>
                    <td >
                        <div style='cursor:no-drop;'><b><?= report($item["doc_type"]); ?></b></div>
                    </td>
                </tr>
                <tr>
                    <td> ห้องประชุม </td>
                    <td class='showedit'>
                        <div id="display_room" ondblclick="showedit('room');">
                            <?= (!empty($item["room"]) ? $item["room"] : "."); ?>
                        </div>
                        <div id="control_room" class="displaynone">
                            <input type="text" id="txt_edit_room" name="txt_edit_room" class="form-control" value="<?= $item["room"]; ?>" onchange="updates('room', '<?= $item["code"]; ?>', this);">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> วันที่เริ่มต้น </td>
                    <td class='showedit'>
                        <div id="display_start_date" ondblclick="showedit('start_date');"><?= (!empty($item["start_date"]) ? $item["start_date"] : "."); ?></div>
                        <div id="control_start_date" class="displaynone">
                            <input type="date" id="txt_edit_start_date" name="txt_edit_start_date" style="width:30%;" class="form-control" value="<?= $item["start_date"]; ?>"  onchange="updates('start_date', '<?= $item["code"]; ?>', this);" />
                        </div>

                    </td>
                </tr>

                <tr>
                    <td> วันที่สิ้นสุด </td>
                    <td class='showedit'>
                        <div id="display_end_date" ondblclick="showedit('end_date');"><?= (!empty($item["end_date"]) ? $item["end_date"] : "."); ?></div>
                        <div id="control_end_date" class="displaynone">
                            <input type="date" id="txt_edit_end_date" name="txt_edit_end_date" style="width:30%;" class="form-control" value="<?= $item["end_date"]; ?>" onchange="updates('end_date', '<?= $item["code"]; ?>', this);" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>เวลาเริ่มต้น</td>
                    <td class='showedit'>
                        <div id="display_time_start" ondblclick="showedit('time_start');"><?= (!empty($item["time_start"]) ? $item["time_start"] : "."); ?></div>
                        <div id="control_time_start" class="displaynone">
                            <input type="time" id="txt_edit_time_start" name="txt_edit_time_start" class="form-control" style="width:30%;" value="<?= $item["time_start"]; ?>" onchange="updates('time_start', '<?= $item["code"]; ?>', this);" >
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>เวลาสิ้นสุด</td>
                    <td class='showedit'>
                        <div id="display_time_end" ondblclick="showedit('time_end');"><?= (!empty($item["time_end"]) ? $item["time_end"] : "."); ?></div>
                        <div id="control_time_end" class="displaynone">
                            <input type="time" id="txt_edit_time_end" name="txt_edit_time_end" class="form-control" style="width:30%;" value="<?= $item["time_end"]; ?>" onchange="updates('time_end', '<?= $item["code"]; ?>', this);" >
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>ค่าเริ่มต้น</td>
                    <td class='showedit'>
                        <div id="display_active" ondblclick="showedit('active');">
                            <?php
                            if ($item["active"] == '1') {
                                echo "<span style='color:green;'><b>open</b></span>";
                            } else {
                                echo "<span style='color:red;'><b>close</b></span>";
                            }
                            ?>
                        </div>
                        <div id="control_active" class="displaynone">
                            <select id="txt_edit_active" name="txt_edit_active" style="width:30%;" class="form-control" onchange="updates_active('active', '<?= $item["code"]; ?>', this);">
                                <?php if ($item["active"] == '0') { ?>
                                    <option value="0" selected><span style='color:red;'><b>close</b></span></option>
                                    <option value="1"><span style='color:green;'><b>open</b></span></option>
                                <?php } else if ($item["active"] == '1') { ?>
                                    <option value="0"><span style='color:red;font-size:bold;'><b>close</b></span></option>
                                    <option value="1" selected><span style='color:green;font-size:bold;'><b>open</b></span></option>
                                <?php } ?>
                            </select>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>link / zoom </td>
                    <td >
                        <table style="width:40%;">
                            <tr>
                                <td>
                                    <?php if ($item["type"] == '1') { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('1');" value="1"  required checked>
                                    <?php } else { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('1');" value="1"  required>
                                    <?php } ?>     
                                </td>
                                <td>text</td>
                                <td>
                                    <?php if ($item["type"] == '2') { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('2');" value="2"  required checked>
                                    <?php } else { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('2');" value="2"  required>
                                    <?php } ?>  
                                </td>
                                <td>link</td> 
                                <td>
                                    <?php if ($item["type"] == '3') { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('3');" value="3"  required checked>
                                    <?php } else { ?>
                                        <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('3');" value="3"  required>
                                    <?php } ?>  
                                </td>
                                <td>conference</td>
                            </tr>
                        </table>
                    </td>
                </tr>  



                <?php if ($item["type"] != '1') { ?>
                    <tr id="tr_type_ele">
                        <td style="verticel-align:top;">
                            <span id='stopic'>
                                <b>ระบุ Link:</b>
                            </span>       
                        </td>                   
                        <td><input type="text" class="form-control"  onclick="selects_type('3');" value="<?= $item["link"]; ?>" readonly></td>                   
                    </tr>

                <?php } ?>


                <tr id="tr_type_display" class="displaynone">
                    <td style="verticel-align:top;">
                        <span id='stopic'>
                            <b>ระบุ Link:</b>
                        </span>       
                    </td>                   
                    <td><input type="text" class="form-control" id="txtlink" name="txtlink" onclick="selects_type('3');" value="<?= $item["link"]; ?>" readonly></td>                   
                </tr>

                <tr id="tr_save" class="displaynone">
                    <td></td>
                    <td>
                        <a onclick="update_meeting_type();" class="btn btn-info">save</a>
                        <a onclick="cancel_meeting_type();" class="btn btn-default">cancel</a>
                    </td>
                </tr>


            </table>
            <hr>
            <h4>หัวเอกสาร</h4>
            <div id="display_doctopic_text" class="panel_blue" ondblclick="showedit('doctopic_text');"><?= $item["doctopic_text"]; ?></div>
            <div id="control_doctopic_text" class="displaynone panel_blue">
                <div id='tool_doctopic_text' class="editor-controls">
                    <?php require('./app/editor.php'); ?>     
                </div>
                <div id='editor_doctopic_text' class='editor-text-box' style='height:250px;overflow:auto;' contenteditable>
                    <?= $item["doctopic_text"]; ?>                      
                </div>  
            </div>
            <hr>
            <h4>รายละเอียดการประชุม</h4>

            <div id="display_detail" class="panel_blue" ondblclick="showedit('detail');"><?= $item["detail"]; ?></div>
            <div id="control_detail" class="displaynone panel_blue">
                <div id='tool_detail' class="editor-controls">
                    <?php require('./app/editor.php'); ?>
                </div>
                <div id='editor_detail' class='editor-text-box' style='height:250px;overflow:auto;' contenteditable>
                    <?= $item["detail"]; ?>                      
                </div>  
            </div>
            <hr>
        </div>

        <div>
            <p><a href="#root_modal" class="btn btn-primary" onclick="settop("<?= $item["code"]; ?>");" rel="modal:open" style='color:white;'>เพิ่มหัวข้อ</a></p>
            <br>
            <input type="hidden" id='hdnsubcnt' name='hdnsubcnt' value='<?= $subcnt; ?>'>
            <table class="tbl_term table_border" id='tblLocations' style=''  cellpadding="0" cellspacing="0" border="1">
                <tr style='background-color:#A0CFEC;'>
                    <td colspan="4" ></td><td></td>
                </tr>
                <?php
                echo $terms;
                ?>                            
            </table>                    
        </div>

        <!--popup-->
<?php require_once './view/Agenda/popup.php'; ?>
<!--popup-->

    </div>
</div>
<?php require_once './layouts/footer_admin.php'; ?>
