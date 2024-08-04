<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <title>E-meeting | ระเบียบวาระการประชุม อุทยานวิทยาศาสตร์ ม.สงขลานครินทร์</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
        
        <link href="./assets/css/master.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />
        <link href="./assets/css/editor.css?key=<?php echo time(); ?>" rel="stylesheet" />
        <link href="./assets/css/login.css?key=<?php echo time(); ?>" rel="stylesheet" />  
        <!--<link href="./assets/theme/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="./assets/theme/css/master.css?key=<?php echo time(); ?>" rel="stylesheet">
        
        
        <script type="text/javascript" src="./assets/js/jquery3.0.0.js"></script>
        <script type="text/javascript" src="./assets/js/jquery.modal.min.js"></script>
        <script type="text/javascript" src="./assets/js/jquery1.8.3.min.js"></script>
        <script type="text/javascript" src="./assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="./assets/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="./assets/assets/js/scripts.js?key=<?php echo time(); ?>"></script>
        <script type="text/javascript" src="./app/control.js?key=<?php echo time(); ?>"></script>
        <style>
            .card{
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            }

            .nav-header{
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            }
            .body{
                background: #ECE9E6;
            }

            .ul-master{
                width:100%;
                margin-top:20px;
            }

            .ul-master li{
                padding:0.2em;
            }
            
            .background-1{
             background: #457fca;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #5691c8, #457fca);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #5691c8, #457fca); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            
            .block{
                padding-top:1em;
                padding-bottom:1em;
            }
            
            .link_master:hover{
                background:#3366ff;
                cursor: pointer;
                color:black;
            }
        </style>
    </head>
    <body>
        
   
     <div class="topnav nav-header" id="myTopnav" style='padding:0em;'>
            <a href="javascript:void(0);" style="font-size:15px;text-align:right;width:100%;" class="icon mobile_menu" onclick="navbarmobile()">&#9776;</a>
            <a class="navbrand" href="./index.php?controller=Master&action=index" style='padding:0.5em;'>
                <img src="https://www.dnaconsult.co.th/images/PSUSP(ThaiVersion).jpg" style="width:200px;">
            </a> 
            <a id='menu1' href="./index.php?controller=Master&action=index"><li class="fa fa-home"></li> หน้าแรก</a> 
            <?php if ((auth() == true)) { ?>
               <!-- <?php if (preview(userid(), 'read', 'Member')) { ?> <a id='menu2' href="./index.php?controller=Master&action=shwdoc&type=1">ระเบียบวาระการประชุม</a><?php } ?>
                <?php if (preview(userid(), 'read', 'Member')) { ?> <a id='menu3' href="./index.php?controller=Master&action=shwdoc&type=2"> รายงานการประชุม</a><?php } ?> -->
                <div id='menu6' class="dropdownx mobile_menu" style='float:right;'>
                    <button class="dropbtnx"><i class="fa fa-user-circle" style="font-size:14px;"></i> ยินดีต้อนรับ คุณ <?= fullname(); ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-contentx">  
                        <?php if (user_status() >= 2) { ?>
                            <?php if (preview(userid(), 'read', 'Agenda')) { ?>    
                                <a href="./index.php?controller=Admin&action=showdoc&doc=1">ระเบียบวาระการประชุม</a>
                            <?php } ?>
                            <?php if (preview(userid(), 'read', 'Report')) { ?>    
                                <a href="./index.php?controller=Admin&action=showdoc&doc=2">รายงานการประชุม</a>
                            <?php } ?>
                            <?php if (preview(userid(), 'read', 'Member')) { ?>    
                                <a href="./index.php?controller=Admin&action=showdoc&doc=3">การจัดการสมาชิก</a>
                            <?php } ?>
                        <?php } ?>
                        <a href="./index.php?controller=Auth&action=logout">Logout <span class="sr-only">(current)</span></a>       
                    </div>
                </div> 

            <?php } else { ?>
                <a id='menu4' class="mobile_menu"  style='float:right;'  href="./index.php?controller=Auth&action=registerpage">Register</a>   
                <a id='menu5' class="mobile_menu" style='float:right;' href="./index.php?controller=Auth&action=login">Login</a>     
            <?php } ?>

        </div>