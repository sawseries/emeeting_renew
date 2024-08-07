<?php require_once './layouts/header_admin.php'; ?>


<div class="container white" id="page-content-wrapper" style='min-height:1200px;'>                 
  <div class="row">    
    <div class="blog-post" style="padding:1em;">
        <h2 class="blog-post-title">ระเบียบวาระการประชุม</h2>
        <p class="blog-post-meta" style="color:#999;">อุทยานวิทยาศาสตร์ ม.สงขลานครินทร์</p>
        <?php if ((isset($_SESSION["Auth"]) == true)) {
            if (preview(userid(), 'write', 'Agenda')) {
                ?>  
                <div style="width:100%;margin-top:5px;"> 
                    <div class="btns">    
                        <a class='btn btn-default' href="./index.php?controller=Agenda&action=create_agenda"><li class='fa fa-plus'></li> เพิ่มเอกสารใหม่</a>
                    </div>
                </div>   
    <?php }
    } ?> 
        <div class='search-panel' style='margin-top:50px;'>
            <form method="GET" action="./index.php">
                <input type="hidden" class='form-control' id="controller" name="controller" value='Agenda'> 
                <input type="hidden" class='form-control' id="action" name="action" value='search'>
                <table style='width:100%;text-align:center;'>
                    <tr>
                        <td style='width:10%;'>ประเภท</td>
                        <td style='text-align:center;'>
                            <b><input type='text' class='form-control' readonly value='ระเบียบวาระการประชุม' style='text-align:center;'></b>
                        </td>
                        <td>หัวข้อ</td>
                        <td><input type="text" class='form-control' style='text-align:center;' id="txttopic" name="txttopic" value='<?php echo (!empty($_GET["txttopic"]) ? $_GET["txttopic"] : ""); ?>' placeholder='หัวข้อ'></td>
                        <td> วันที่เริ่มต้น </td>
                        <td><input type="date" class='form-control' id="txtstartdate" name="txtstartdate" value='<?php echo (!empty($_GET["txtstartdate"]) ? $_GET["txtstartdate"] : ""); ?>'  placeholder='วันที่เริ่มต้น'></td>
                        <td> วันที่สิ้นสุด </td>
                        <td><input type="date" class='form-control' id="txtenddate" name="txtenddate" value='<?php echo (!empty($_GET["txtenddate"]) ? $_GET["txtenddate"] : ""); ?>' placeholder='วันที่สิ้นสุด'></td>
                        <td><input type="submit" class='btn btn-info' value='Search'></td>
                    </tr>
                </table>
            </form>
        </div>

        <table class="table_main" border="1">
            <tr class="header_blue">
                <th style="text-align:center;width:10%;">รหัสเอกสาร</th>
                <th style='width:40%;'>หัวข้อ</th>
                <th style='width:15%;'>ประเภท</th>
                <th style="text-align:center;width:10%;">ค่าเริ่มต้น</th>
                <th style='width:10%;'>วันที่</th>
                <th style='width:10%;'>เวลา</th>
                <th style='width:5%;'></th>
            </tr>
                <?php foreach ($lists as $list) { ?>
                    <?php if ($list["doc_type"] == '1') { ?>
                    <tr class='link_to' onclick="window.location = './index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>'">
                    <?php } else if ($list["doc_type"] == '2') { ?>
                    <tr class='link_to' onclick="window.location = './index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>'">  
                        <?php } ?>
                    <td style="width:10%;text-align:center;"><?= $list["code"]; ?></td>
                    <td style="width:30%;">
                            <?php if ($list["doc_type"] == '1') { ?>
                            <a href="./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>">
                                <?php } else if ($list["doc_type"] == '2') { ?>
                                <a href="./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>">
    <?php } ?>
    <?php echo (!empty($list["topic"]) ? $list["topic"] : "--"); ?>
                            </a>
                    </td>
                    <td style="width:15%;">
                        <?= report($list["doc_type"]); ?>
                    </td>
                    <td style="width:10%;text-align:center;">
                        <?php
                        if ($list["active"] == '1') {
                            echo "<span style='color:green;'><b>open</b></span>";
                        } else {
                            echo "<span style='color:red;'><b>close</b></span>";
                        }
                        ?>
                    </td>
                    <td class="text_fit" style="width:15%;">
                        <?php
                        if ($list["start_date"] != $list["end_date"]) {
                            echo shortDateThai($list["start_date"]) . " - " . shortDateThai($list["end_date"]);
                        } else {
                            echo shortDateThai($list["start_date"]);
                        }
                        ?>
                    </td>
                    <td class="text_fit" style="width:10%;padding:0;"><?= substr($list["time_start"], 0, 5); ?> - <?= substr($list["time_end"], 0, 5); ?></td>
                    <td style="width:5%;text-align:center;">
                        <a class='btn btn-default' href="./index.php?controller=Agenda&action=delete_doc&code=<?= $list["code"]; ?>"><i style='color:red;' class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
<?php } ?>                            
        </table>

    </div>
    <div class="footer_index">
<?= $link; ?>
    </div>
</div>


<?php require_once './layouts/footer_admin.php'; ?>
