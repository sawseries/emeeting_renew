var lastcontrol = '';
var control = '';
var windows=0;
var elecheck = false;
$(document).ready(function() {
  elechecks(false);
});

$(function () {   
    $(window).click(function (e) {

      $(".form-control").click(function (e) {  
        elechecks(true);
        //return false;
      });
    
      $(".editor-controls").click(function (e) {  
        elechecks(true);
        return false;
      });

      $(".editor-text-box").click(function (e) {  
        elechecks(true);
        return false;
      });

        var target = e.target.id.toString();       
        if(elecheck==false){              
                if(target!==''){
                    if(lastcontrol!==''){                   
                       if(lastcontrol==control){
                        hidelastcontrol(control);  
                       }else{
                        hidelastcontrol(lastcontrol);  
                       }
                      }else if((lastcontrol=='')){
                        hideedit(control);
                      }
                 }
                if(target==''){ 
                  hideedit(control);                    
                }
        }else{
          if(target==''){ 
            hideedit(control);                    
          }
        }      
    }); 
}); 


function elechecks(chk){ //กำหนดเพื่อให้ไม่ update เมื่อ click
    elecheck = chk;
}



function showedit(ele) {
  if(control != ''){lastcontrol = control;}
  if(lastcontrol != ''){hidelastcontrol(lastcontrol);}
  $("#display_" + ele).hide();
  $("#control_" + ele).show();
 
  control = ele;
}

function hideedit(control) {
  $("#display_" + control).show();
  $("#control_" + control).hide();

  lastcontrol = control;
  control = '';
}

function hidelastcontrol(control) {
  $("#display_" + control).show();
  $("#control_" + control).hide();
  lastcontrol = '';
  control = '';

}

          
function editor_control(value){
  $('#tool_' + value + ' #fontFamily').change(function () {
      var fontFamily = this.value;
      $(this).css('font-family', fontFamily);

      document.execCommand('fontName', false, fontFamily);
      update_output(value);
  });

  $('#tool_' + value + ' #parStyle').change(function () {
      document.execCommand('formatBlock', false, this.value);
      update_output(value);
  });

  $('#tool_' + value + ' #fontSize').change(function () {
      document.execCommand('fontSize', false, this.value);
      update_output(value);
  });


  $('#tool_' + value + ' #textColor').change(function () {
      var colorValue = this.value;
      var textColor = $(this).css('color');
      console.log("TextColor: ", textColor);
      if (colorValue == "CUSTOM") {
          // Prompt for Custom Color
          colorValue = prompt("Enter the HEX value or RGBA value: ", "");
      }
      // Match dropdown box style to selected color
      $(this).css('background-color', colorValue);

      // Set selected color
      document.execCommand('foreColor', false, colorValue);
      update_output(value);
  });

  $('#tool_' + value + ' a').click(function (e) {

      switch ($(this).data('role')) {
          case 'h1':
          case 'h2':
          case 'p':
              document.execCommand('formatBlock', false, $(this).data('role'));
              break;
          default:
              document.execCommand($(this).data('role'), false, null);
              break;
      }
      update_output(value);

  });

  $('#editor_' + value).bind('blur keyup paste copy cut mouseup', function (e) {
      update_output(value);
      elechecks(false);

  });
}

function editor(value){ 
  $('#tool_' + value + ' #fontFamily').change(function () {
      var fontFamily = this.value;
      $(this).css('font-family', fontFamily);

      document.execCommand('fontName', false, fontFamily);
      update_text(value);
  });

  $('#tool_' + value + ' #parStyle').change(function () {
      document.execCommand('formatBlock', false, this.value);
      update_text(value);
  });

  $('#tool_' + value + ' #fontSize').change(function () {
      document.execCommand('fontSize', false, this.value);
      update_text(value);
  });


  $('#tool_' + value + ' #textColor').change(function () {
      var colorValue = this.value;
      var textColor = $(this).css('color');
      if (colorValue == "CUSTOM") {
         colorValue = prompt("Enter the HEX value or RGBA value: ", "");
      }
      
      $(this).css('background-color', colorValue);

      document.execCommand('foreColor', false, colorValue);
      update_text(value);
  });

  $('#tool_' + value + ' a').click(function (e) {
      switch ($(this).data('role')) {
          case 'h1':
          case 'h2':
          case 'p':
              document.execCommand('formatBlock', false, $(this).data('role'));
              break;
          default:
              document.execCommand($(this).data('role'), false, null);
              break;
      }
      update_text(value);

  });

  $('#editor_' + value).bind('blur keyup paste copy cut mouseup', function (e) {
      update_text(value);
  });
}


