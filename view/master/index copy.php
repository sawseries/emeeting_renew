<?php 


if($_SESSION["status"]>1){
require_once './layouts/header_admin.php'; 
}else{
    require_once './layouts/header_main.php';     
}

?>




<div class="jumbotron"  style="background-color:#2565AE;color:white;margin:20px;">
    <div class="container">
    <div class="row display" style="">
        <table style="width:100%;table-layout: fixed;border-top:2px solid #007dcc;">
            <?php if (isset($meeting)) { ?>
                <tr>
                    <td style="width:10%;"><img src="./assets/image/stsp1.jpg?key=<?php echo time(); ?>" style="width:200px;"></td>
                    <td style="width:10%;text-align:center;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                    <td style="width:75%;padding-left:20px;padding-right:20px;font-size:14pt;overflow-wrap: break-word;">
                        <a style="color:white;" href="./index.php?controller=Master&action=detail&code=<?= $meeting["code"]; ?>">
                            <h3><b><?= $meeting["topic"]; ?></b></h3>
                        </a>ณ <?= $meeting["room"]; ?>  
                        <br>
                        วันที่ : <?php
                        if ($meeting["start_date"] != $meeting["end_date"]) {
                            echo shortDateThai($meeting["start_date"]) . " - " . shortDateThai($meeting["end_date"]);
                        } else {
                            echo shortDateThai($meeting["start_date"]);
                        }
                        ?>
                        เวลา : <?= substr($meeting["time_start"], 0, 5); ?> - <?= substr($meeting["time_end"], 0, 5); ?> น.
                    </td>
                </tr>
                <tr > 
                    <td colspan="3" style="padding:0em;">
                        <?php if ($meeting["type"] == '2') { ?>
                            <table style="width:50%;">
                                <tr class="background-1 link_master" onclick="window.location='<?= $meeting["link"]; ?>'">
                                    <th style="width:20%;">Link : <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a></th>
                                </tr>
                            </table>
                        <?php } else if ($meeting["type"] == '3') { ?>
                            <table style="width:100%;">
                                <tr class="background-1 link_master" onclick="window.location='<?= $meeting["link"]; ?>'">
                                    <th style="width:22%;">conference : <a href="<?= $meeting["link"]; ?>"  target="_blank" style="width:100px;"> <img src="./assets/image/zoom.jpg" width="150"> </a></th>

                                    <th style="color:white;">
                                        <?php if (!empty($meeting["detail"])) { ?>
                                            <?= $meeting["detail"]; ?>
                                        <?php } ?>    
                                    </th>

                                </tr>
                            </table>
                        <?php } ?>
                    </td>
                </tr> 
            <?php } else { ?>
                <tr><td style="padding:2em;color:white;text-align:center;"><b> -- ไม่มีระเบียบวาระการประชุม -- </b></td></tr>
            <?php } ?>
        </table>
        </div>
    </div>
    
        <div class="mobile">
        <table style="width:100%;table-layout: fixed;border:1px solid white;">
            <?php if (isset($meeting)) { ?>
           
                <tr>
                    <!--<td style="width:10%;"><img src="./assets/image/stsp1.jpg?key=<?php echo time(); ?>" style="width:200px;"></td>-->
                    <td style="width:10%;text-align:center;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                    <td style="width:75%;padding-left:20px;padding-right:20px;font-size:14pt;overflow-wrap: break-word;">
                        <a style="color:white;" href="./index.php?controller=Master&action=detail&code=<?= $meeting["code"]; ?>">
                            <h3><b><?= $meeting["topic"]; ?></b></h3>
                        </a>ณ <?= $meeting["room"]; ?>  
                        <br>
                        วันที่ : <?php
                        if ($meeting["start_date"] != $meeting["end_date"]) {
                            echo shortDateThai($meeting["start_date"]) . " - " . shortDateThai($meeting["end_date"]);
                        } else {
                            echo shortDateThai($meeting["start_date"]);
                        }
                        ?>
                        เวลา : <?= substr($meeting["time_start"], 0, 5); ?> - <?= substr($meeting["time_end"], 0, 5); ?> น.
                    </td>
                </tr>
                <tr > 
                    <td colspan="2" style="padding:0em;">
                        <?php if ($meeting["type"] == '2') { ?>
                            <table style="width:50%;">
                                <tr class="background-1">
                                    <th style="width:20%;">Link : <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a></th>
                                </tr>
                            </table>
                        <?php } else if ($meeting["type"] == '3') { ?>
                            <table style="width:100%;">
                                <tr class="background-1">
                                    <th style="width:22%;">conference : <a href="<?= $meeting["link"]; ?>"  target="_blank" style="width:100px;"> <img src="./assets/image/zoom.jpg" width="150"> </a></th>

                                    <th style="color:white;">
                                        <?php if (!empty($meeting["detail"])) { ?>
                                            <?= $meeting["detail"]; ?>
                                        <?php } ?>    
                                    </th>

                                </tr>
                            </table>
                        <?php } ?>
                    </td>
                </tr> 
            <?php } else { ?>
                <tr><td style="padding:2em;color:white;text-align:center;"><b> -- ไม่มีระเบียบวาระการประชุม -- </b></td></tr>
            <?php } ?>
        </table>
        </div>
    
</div>
<div class="container"  style="background-color:white;">
    <div class="row mb-2 lg-2">
        <div class="col-md-12 col-lg-12 ">
            <div class="card flex-md-row mb-4 box-shadow h-md-250 block">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-3 text-primary">E-meeting</strong>           
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">ระเบียบวาระการประชุม</a>
                    </h3>


                    <ul class="ul-master">
                        <?php foreach ($agenda as $agenda) { ?>
                            <li><table style="width:100%;">
                                    <tr>
                                        <td style="width:80%;"> <a  href="./index.php?controller=Master&action=detail&code=<?= $agenda["code"]; ?>"><?= $agenda["topic"]; ?></a></td>
                                        <td style="text-align:left;width:20%;">
                                            <?php
                                            if ($agenda["start_date"] != $agenda["end_date"]) {
                                                echo shortDateThai($agenda["start_date"]) . " - " . shortDateThai($agenda["end_date"]);
                                            } else {
                                                echo shortDateThai($agenda["start_date"]);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                        <?php } ?>
                    </ul>

                    <br><a href="#">Continue reading</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 ">
            <div class="card flex-md-row mb-4 box-shadow h-md-250 block">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-3 text-primary">E-meeting</strong>       
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">รายงานการประชุม</a>
                    </h3>

                    <ul class="ul-master">
                        <?php foreach ($report as $report) { ?>
                            <li><table style="width:100%;">
                                    <tr>
                                        <td style="width:80%;"> 
                                            <a href="./storage/report/<?= $report["link"]; ?>" targer='_blank'><?php echo (!empty($report["topic"]) ? $report["topic"] : "--"); ?></a>
                                        </td>
                                        <td style="text-align:left;width:20%;">
                                            <?php
                                            if ($report["start_date"] != $report["end_date"]) {
                                                echo shortDateThai($report["start_date"]) . " - " . shortDateThai($report["end_date"]);
                                            } else {
                                                echo shortDateThai($report["start_date"]);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </li>
<?php } ?>
                    </ul>
                    <br>
                    <a href="./index.php?controller=Master&action=shwdoc&type=2">Continue reading</a>
                </div>
            </div>
        </div>


    </div>
</div>
                                       
<?php require_once './layouts/footer_main.php'; ?>