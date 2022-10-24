var check_email=0;
var check_username=0;

$(document).ready(function() {
  $("#registerform").validate();
  //agree();
    $("#btnregister").click(function() {
      register_validate();
    });

    
});

function register_validate(){
  if($('#registerform').valid()){
    if((check_email=='0')&&(check_username=='0')){
      $('#registerform').submit(function(e){
        e.currentTarget.submit();
      });
    }else{
      $("#registerform").submit(function(e){
        e.preventDefault();
      }); 
    }
  }else{
    return false;
  }
}  

function agree(){
document.getElementById('confirm').style.display='block';
}

function confirm(){
if($('#rdo_confirm').is(':checked')){
$('#registerform').submit();
}else{
$("#s_error_confirm").text("กรุณาเลือกยินยอม");
}
}

function email_check(obj){
  var values = obj.value;
  var valid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(values) && obj.value.length;
  if(!valid){
    $('#email_error').html('this email is not valid');
    check_email=1;
  }else{    
  $.ajax({
    type: "POST",
    url: "./index.php?controller=Auth&action=email_check",
    data: { email: values },
    success: function (data) {
      if(data==1){
        $('#email_error').html('Email นี้มีผู้ใช้แล้ว');
        check_email=1;
      }else{
        $('#email_error').html('');
        check_email=0;
      }      
    }
  });
}
}

function username_check(obj){
  var values = obj.value;
  $.ajax({
    type: "POST",
    url: "./index.php?controller=Auth&action=username_check",
    data: { username: values },
    success: function (data) {
      if(data==1){
        $('#username_error').html('Username นี้มีผู้ใช้แล้ว');
        check_username=1;
      }else{
        $('#username_error').html('');
        check_username=0;
      }         
    }
  });

}

function showmodal(){
  var modal = document.getElementById("confirm");
  modal.style.display = "block";
}

function closemodal(){
  var modal = document.getElementById("confirm");
  modal.style.display = "none";
}