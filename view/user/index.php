<?php require_once './layouts/header_admin.php'; ?>

<div class="container white" id="page-content-wrapper" style='min-height:1200px;'>                 
  <div class="row">    
    <div class="blog-post" style="padding:1em;">
        <h2 class="blog-post-title">การจัดการสมาชิก</h2>
        <p class="blog-post-meta" style="color:#999;">อุทยานวิทยาศาสตร์ ม.สงขลานครินทร์</p>
        <?php
        if ((isset($_SESSION["Auth"]) == true)) {
            if (preview(userid(), 'write', 'Member')) {
                ?>  
                <div style="width:100%;margin-top:5px;"> 
                    <div class="btns">    
                        <a class='btn btn-default' href="./index.php?controller=User&action=create"><li class='fa fa-plus'></li> เพิ่มเอกสารใหม่</a>
                    </div>
                </div>   
            <?php }
        }
        ?> 
        <div style='margin-top:50px;'>
            <form method="GET" action="./index.php">
                <input type="hidden" class='form-control' id="controller" name="controller" value='Report'> 
                <input type="hidden" class='form-control' id="action" name="action" value='search'>
                <table style='width:100%;text-align:center;'>
                    <tr>
                        <td style='width:10%;'>ประเภท</td>
                        <td>
                            <b><input type='text' class='form-control' readonly value='รายงานการประชุม' style='text-align:center;'></b>
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
                <td style="text-align:center;width:5%;">ลำดับ</td>
                <td style="text-align:center;width:15%;">ชื่อ-สกุล</td>
                <td style="text-align:center;width:5%;">สถานะ</td>
                <td style="text-align:center;width:10%;">Email</td>
                <td style="text-align:center;width:20%;">สังกัด</td>
                <td style="text-align:center;width:20%;">ตำแหน่ง</td>
                <td style="text-align:center;width:10%;">สมาชิก</td>
                <td style="text-align:center;width:15%;">last-login</td>           
            <?php if (preview(userid(), 'delete', 'Member')) { ?><td style='width:5%;'></td><?php } ?>
            </tr>
            <?php
            $i = 1;
            $no = 0;
            $page = 1;
            if (isset($_GET["page"])) {
                $page = (($_GET["page"] - 1) * 10) + 1;
            }
            foreach ($lists as $list) {
                ?>
                <tr class='link_to' onclick="window.location = './index.php?controller=User&action=showdoc&id=<?= $list['id']; ?>'" >
                    <td style="text-align:center;width:5%;"><?= $page++; ?></td>
                    <td style="width:15%;"><?= $list["firstname"]; ?> <?= $list["lastname"]; ?></td>
                    <td style="text-align:center;width:5%;"><?= u_status($list["status"]); ?></td>
                    <td style="width:10%;"><?= $list["email"]; ?></td>
                    <td style="width:20%;"><?= $list["department"]; ?></td>
                    <td style="width:20%;"><?= $list["position"]; ?></td>
                    <td style="text-align:center;width:10%;"><?= approve($list["approve"]); ?></td>
                    <td style="width:15%;"><?= $list["last_login"]; ?></td>
                <?php if (preview(userid(), 'delete', 'Member')) { ?>
                        <td style="text-align:center;width:5%;" onclick="window.location = './index.php?controller=User&action=delete&id=<?= $list["id"]; ?>'">
                            <a class='btn btn-default' href="./index.php?controller=User&action=delete&id=<?= $list["id"]; ?>"><i style='color:red;' class="fa fa-trash"></i></a>
                        </td>
                    </tr>
            <?php }
        } ?>                            
        </table>
    </div>
    <div class="footer_index">
        <?= $link; ?>
    </div>
</div>



<?php require_once './layouts/footer_admin.php'; ?>
