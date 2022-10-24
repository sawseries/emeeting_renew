/*!
* Start Bootstrap - Simple Sidebar v6.0.5 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 
$(document).ready(function() {
    checkScreenSize();  
    let searchParams = new URLSearchParams(window.location.search);
    let control = searchParams.get('controller');
    let action = searchParams.get('action');
    let type = searchParams.get('type');
  
    if((control=='Master')&&(action=='index')&&(!(type))){
      $("#menu1").addClass("active");
    }else if((control=='Admin')&&(action=='index')){
      $("#menu6").addClass("active");
    }else if(action=='registerpage'){
      $("#menu4").addClass("active");
    }else if(action=='login'){
      $("#menu5").addClass("active");
    }
  
    if(type==1){
      $("#menu2").addClass("active");
    }else if(type==2){
      $("#menu3").addClass("active");
    }
  
  });

  function navbarmobile() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  
  function checkScreenSize(){
    var newWindowWidth = $(window).width();
    if (newWindowWidth <= 767) {
      document.body.classList.toggle('sb-sidenav-toggled');
      localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    }  
  }

  
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
