<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-meeting | ระเบียบวาระการประชุม อุทยานวิทยาศาสตร์ ม.สงขลานครินทร์</title>
            
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>


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

        <script type="text/javascript" src="./assets/assets/js/scripts.js?key=<?php echo time(); ?>"></script>
        <script type="text/javascript" src="./app/control.js?key=<?php echo time(); ?>"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
      

        <script>
$(document).ready(function () {
});

    $(window).scroll(function(){
    
            if($(this).scrollTop() > 100){
                $('.navbar').addClass('sticky')
            } else{
                $('.navbar').removeClass('sticky')
            }
        });
      
</script>

<style>
   
body{

    font-family: "PSU-Stidti-Regular","PSU-Stidti-Light","PSU-Stidti-Bold",sans-serif;
    width: 100vw;
    height: 100vh;
}

@font-face {
  font-family: PSU-Stidti-Regular;
  src: url('./assets/font/PSUStidti/PSU-Stidti-Regular.otf');
}

@font-face {
  font-family: PSU-Stidti-Light;
  src: url('./assets/font/PSUStidti/PSU-Stidti-Light.otf');
}

@font-face {
  font-family:PSU-Stidti-Bold;
  src: url('./assets/font/PSUStidti/PSU-Stidti-Bold.otf');
}


.navbartop{
    background-color:#00a8cf;
    box-shadow: 5px 0px 5px #ccc;
    width:100vm;  
    padding: 0px 40px;
    height: 40px;
    color:white;
}

.sticky{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    transition: max-height 0.2s ease-in;
    opacity:1;
}


*{
  padding: 0;
  margin: 0;
  font-family: "PSU-Stidti-Regular","PSU-Stidti-Light","PSU-Stidti-Bold",sans-serif;
}

/*navbar*/


.arrow{
  float:right;width:20px;text-align:right;font-size:12px;
}

.navbar {
    
    box-shadow: 5px 0px 5px #ccc;
    width:100vm;  
    padding: 0px 40px;
    border:1px solid #CCD1D1;
    background-color:white;
}


.navbar-toggle{
    list-style-type: none;
    display: flex;
    width:auto;  
    float:right; 
}

.navbar-toggle button{
    background-color:transparent;
    padding:0.2rem;
    font-size:18pt;
    color:black;
    border:0px solid;

}


.navbar-login{
  margin:10px;
  padding: 10px 10px;
  color: #e9eef4;
  background-color:#4EACF8;
}

.navbar-login li{
   text-decoration: none;
   display:block;

}

.navbar-login li a{
  color:#FFF;
  padding: 10px 10px;
  font-weight: 700;
  transition: 0.4s all;
}

.navbar-login li a:hover{
  color: #000;
}

.navbar-logo{
    list-style-type: none;
    display: flex;
    width:auto;
    margin:10px;
}

.navbar-logo li a{
  display: block;
  text-decoration: none;
  color: #444;
  padding: 20px 20px;
  font-weight: 700;
  transition: 0.5s all;
}


.navbar-links {
  list-style-type: none;
  display: flex;
  width:100vh;
}


.navbar-links{
  margin:10px;
}

.navbar-links li a {
  display: block;
  text-decoration: none;
  color:#000;
  padding: 4px 5px;
  transition: 0.4s all;
}

.navbar-links li.navbar-dropdown {
  position: relative;
}

.navbar-links .navbar-dropdown .dropdown a{
  display: block;
  text-decoration: none;
  color: #444;
  padding: 4px 5px;
  font-weight: 700;
  transition: 0.4s all;
}

.navbar-links li.navbar-dropdown:hover .dropdown {
  visibility: visible;
  opacity: 1;
  transform: translateY(0px);
  display:block;  
}

.navbar-links li.navbar-dropdown .dropdown {
  /*visibility: hidden;*/
  opacity: 0;
  position: absolute;
  padding:0;
  top:100%;
  left: 0;
  width:350px;
  background-color: #fff;
  box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.5);
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  z-index: 111;  
}

.dropdown{
    /*display:none;*/
    transition: transform .5s cubic-bezier(0.88,-0.72, 0, 1), opacity .3s ease-in-out;
	  transform: translateY(-4rem);
    opacity: 1;
    visibility: visible;
    transform: translateY(0px);
   display:none;  
}


.navbar-links li.navbar-dropdown .dropdown a {
  font-weight: 400;
  padding:15px; 
}
.navbar-dropdown .dropdown a:hover {
  padding-left: 30px;
}
.navbar-links li a:hover {
  color: #4EACF8;
  background-color:#e9eef4;
}

.navbar-toggle{
    display:none;
}

.navbar-collapse{
    width:auto;
}

.navbar-links li.navbar-dropdown .lbmenu span:hover{
color: #4EACF8;
background-color:#e9eef4;
}

    .navbar-links li.navbar-dropdown .lbmenu span{
      padding: 15px 20px;
      color :#B3B9B9;
      font-weight: normal !important;
      cursor : pointer;
      display: block;
    }

    .navbar-links .navbar-dropdown .dropdown li{
      list-style-type:none;
      display:block;
      padding:1.5rem;
      border-bottom:1px solid #ccc;
    }

    .navbar-links .navbar-dropdown .dropdown li:hover{
      color: #4EACF8;
  background-color:#e9eef4;
    }



   
@media (max-width: 920px) {
    .navbar-login{
        display:none;
    }

    .navbar-toggle{
      display:block;
    }

    .navbar {
    padding: 0px;
    }

   
    .navbar {
    padding: 0px;
    margin:0;
    left:0;
    }

  .navbar-links{
        width: 100%;
        transition: all 0.3s ease-in;
        top:0;
        display:block;
        position:relative;
        padding: 0px;
    margin:0;
    left:0;
    }

    .navbar-links li.navbar-dropdown .lbmenu span:hover{
    color: #4EACF8;
    background-color:#e9eef4;
  }


    .navbar-links .navbar-dropdown .dropdown li:hover{
      color: #4EACF8;
      background-color:#e9eef4;
      position:relative;
    }

    .navbar-links li.navbar-dropdown:hover .dropdown {
      visibility: hidden;
      opacity: 1;
      transform: translateY(0px);
      display:none;  
    }

   .navbar-links li.navbar-dropdown .lbmenu span{
    padding:2em;
    color : #000;
    font-variant : small-caps;
    cursor : pointer;
    width:95vw;
     display: block;
    }

    .navbar-links li.navbar-dropdown .dropdown {
    visibility: hidden;
    opacity: 0;
    padding: 20px 0;
    transform: translateY(50px);
    left: 0;
    background-color: #fff;
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.5);
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    z-index: 111;
    transition: 0.4s all;
    width:100%;
   }

  .dropdown{
    display:none;
    transition: transform .6s cubic-bezier(1,-0.72, 0, 1), opacity .6s ease-in-out;
	  transform: translateY(-10rem);
  }

    #menu1:checked +ul{
      visibility: visible;
    opacity: 1;
    transform: translateY(0px);
    display:block;
    position:relative;  
    }

    #menu2:checked +ul{
      visibility: visible;
    opacity: 1;
    transform: translateY(0px);
    display:block;
    position:relative;  
    }

    #menu3:checked +ul{
      visibility: visible;
    opacity: 1;
    transform: translateY(0px);
    display:block;
    position:relative;  
    }

    #menu4:checked +ul{
      visibility: visible;
    opacity: 1;
    transform: translateY(0px);
    display:block;
    position:relative;  
    }

    #menu5:checked +ul{
      visibility: visible;
    opacity: 1;
    transform: translateY(0px);
    display:block;
    position:relative;  
    }

   
}

/*-----------*/



@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

.fade-in-text {
  font-family: Arial;
  font-size: 150px;
  animation: fadeIn 5s;
}

</style>

</head>
<body>
    <div class="navbartop">
    <ul class="navbar-logo" style="float:left;color:white;">Emeeting | อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</ul>
    </div>
   
   <div class="navbar">
      <ul class="navbar-logo" style="float:left;">
      <li class="navlogo"><img src="./assets/image/PSUSP_logo.jpg" width="200px"  height="40px" /></li>     
      </ul>

      <ul class="navbar-toggle" style="float:right;">
        <li>
            <a><button  type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="fa fa-bars"></span>
                </button>
            </a>
        </li>
      </ul>

      <?php if ((auth() == true)) { ?>



      <div class="collapse navbar-collapse"  id="collapsibleNavbar">
      <ul class="navbar-links" style="float:left;">  

        <li class="navbar-dropdown active">
          <label for="menu1" class="lbmenu" style="color:white;"><span><a href="./index.php?controller=Master&action=index">หน้าแรก</a></span></label> 
        </li>

        <li class="navbar-dropdown">
          <label for="menu2" class="lbmenu"><span><a href="./index.php?controller=Master&action=shwdoc&type=1">ระเบียบวาระการประชุม</a></span>  </label>          
          <input id="menu2" type="checkbox" name="menu" hidden> 
        </li>
        <li class="navbar-dropdown">
          <label for="menu3" class="lbmenu"><span><a href="./index.php?controller=Master&action=shwdoc&type=2">รายงานการประชุม</a></span></label> 
          <input id="menu3" type="checkbox" name="menu" hidden>
        </li>
      
      </ul>

      <ul class="navbar-login" style="float:right;">
        <li><a href="./index.php?controller=Auth&action=logout">Logout</a></li>
      </ul>

      <?php }else{ ?>
    
      <ul class="navbar-login" style="float:right;">
        <li><a href="./index.php?controller=Auth&action=login">Login</a></li>
      </ul>
   
    <?php } ?>

    </div>
</div>

   
<div class="container-fluid white" id="page-content-wrapper" style='min-height:1200px;'>                 
  
           
  
<div class="container">
<div class="row">      


  <br><br>
  <span><a href="./index.php?controller=Admin&action=index">หน้าแรก</a></span> <span style="margin-left:10px;margin-right:10px;">|</span>  
  <span><a href="./index.php?controller=Agenda&action=index">ระเบียบวาระการประชุม</a></span> <span style="margin-left:10px;margin-right:10px;">|</span>  
  <span><a href="./index.php?controller=Report&action=index">รายงานการประชุม</a></span> <span style="margin-left:10px;margin-right:10px;">|</span>  
  <span><a href="./index.php?controller=User&action=index">การจัดการสมาชิก</a> </span>
  <br><br>
    </div>
    </div>  