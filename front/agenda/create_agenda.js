
var editor_id='';
$(document).ready(function() {
  var obj = ["doctopic_text","detail"];


  $("#frm_agenda").validate();


  $.each( obj, function(index,value) {
      $('#tool_'+value+' #fontFamily').change(function() {
          var fontFamily = this.value;
          $(this).css('font-family',fontFamily);
  
          document.execCommand('fontName',false,fontFamily);
          update_output(value);
      });
  
      $('#tool_'+value+' #parStyle').change(function() {
          document.execCommand('formatBlock',false,this.value); 
          update_output(value);
      });
  
      $('#tool_'+value+' #fontSize').change(function() {
          document.execCommand('fontSize',false,this.value); 
          update_output(value);
      });
  
  
      $('#tool_'+value+' #textColor').change(function() {
          var colorValue = this.value;
          var textColor = $(this).css('color');
          console.log("TextColor: ",textColor);
          if (colorValue == "CUSTOM") {
              // Prompt for Custom Color
              colorValue = prompt("Enter the HEX value or RGBA value: ","");
          }
          // Match dropdown box style to selected color
          $(this).css('background-color',colorValue);
          
          // Set selected color
          document.execCommand('foreColor',false,colorValue); 
          update_output(value);
      });
  
      $('#tool_'+value+' a').click(function(e) { 
    
             switch($(this).data('role')) {
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
     
     $('#editor_'+value).bind('blur keyup paste copy cut mouseup', function(e) {
       update_output(value);
     });
  });
});

   function update_output(id) {
    $('#txt'+id).val($('#editor_'+id).html());
    var para = $('#editor_'+id).html();
   }


   function selects(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_link").hide();
        $("#tr_file").hide();

    } else if (id == '2') {

        $("#tr_text").hide();
        $("#tr_link").fadeIn();
        $("#tr_file").hide();

    } else if (id == '3') {
        $("#tr_text").hide();
        $("#tr_link").hide();
        $("#tr_file").fadeIn();
    }
}

function save_file() {
    var para = $("#para").val();
}


function selects_insert_root(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_link_insert_root").hide();
        $("#tr_file_insert_root").hide();

    } else if (id == '2') {

        $("#tr_text_insert_root").hide();
        $("#tr_link_insert_root").fadeIn();
        $("#tr_file_insert_root").hide();

    } else if (id == '3') {
        $("#tr_text_insert_root").hide();
        $("#tr_link_insert_root").hide();
        $("#tr_file_insert_root").fadeIn();
    }
}


function selectsub(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_sub_link").hide();
        $("#tr_sub_file").hide();
    } else if (id == '2') {
        $("#tr_sub_text").hide();
        $("#tr_sub_link").fadeIn();
        $("#tr_sub_file").hide();
    } else if (id == '3') {
        $("#tr_sub_text").hide();
        $("#tr_sub_link").hide();
        $("#tr_sub_file").fadeIn();
    }
}


function selecteditsub(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_editsub_link").hide();
        $("#tr_editsub_file").hide();
    } else if (id == '2') {
        $("#tr_editsub_text").hide();
        $("#tr_editsub_link").fadeIn();
        $("#tr_editsub_file").hide();
    } else if (id == '3') {
        $("#tr_editsub_text").hide();
        $("#tr_editsub_link").hide();
        $("#tr_editsub_file").fadeIn();
    }
}

function selects_edit_root(id) { 
    
    if (id == '1') {
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").hide();
     } else if (id == '2') {
         $("#tr_link_edit_root").fadeIn();
         $("#tr_file_edit_root").hide(); 
     } else if (id == '3') {
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").fadeIn();
     }
}





   
