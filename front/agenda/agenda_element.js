
$(document).ready(function() {

});

var cnt_add_file=0;

function settop(code){
    $("#hdntop").val(code);
}
                          
function setsubtop(code){
    $("#hdnsubtop").val(code);
}
                   
function selecteditsub(id) {

    $("#s_edit_sub_error").text("");
    if (id == '1') {
        $("#tr_link_edit_sub").hide();
        $("#tr_file_edit_sub").hide();

    } else if (id == '2') {

        $("#tr_link_edit_sub").fadeIn();
        $("#tr_file_edit_sub").hide();

    } else if (id == '3') {

        var hdnfile = $("#txt_hdn_edit_sub_file").val();
     
        if(hdnfile==""){

           $("#tr_link_edit_sub").hide();
           $("#tr_file_edit_sub").fadeIn();
           $("#txt_subfile").toggle();
           $("#control_edit_file_sub").hide();
           $("#ele_edit_file_sub").show();
           $("#txt_subfile").show();
       }else{
           $("#tr_link_edit_sub").hide();
           $("#tr_file_edit_sub").fadeIn();
           $("#txt_subfile").toggle();
           $("#control_edit_file_sub").show();
           $("#ele_edit_file_sub").hide();
       }
    }
}

function selects_type(id) {
 
    if (id == '1') {
        $("#tr_type_display").hide();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",true);

    } else if (id == '2') {

        $("#tr_type_display").show();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);

    } else if (id == '3') {
        $("#tr_type_display").show();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);
    }
}

function cancel_meeting_type(){
    window.location.reload();
}


function selects(id) {
    if (id == '1') {
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



function selects_edit_root(id) { 
 
    $("#s_edit_root_error").html("");
    if (id == '1') {
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '2') {
         $("#tr_link_edit_root").fadeIn();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '3') {

         var hdnfile = $("#hdn_edit_root_file").val();
    
         if(hdnfile==""){

            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").fadeIn();
            $("#txt_rootfile").toggle();
            $("#control_edit_file_root").hide();
            $("#ele_edit_file_root").show();
            $("#txt_rootfile").show();

        }else{

            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").fadeIn();
            $("#txt_rootfile").toggle();
            $("#control_edit_file_root").show();
            $("#ele_edit_file_root").hide();

        }

     }
}


function file_present_toggle(position){

    $("#ele_edit_"+position+"_file_present").toggle();
    $("#control_edit_"+position+"_file_present").show();

}

function rootfile_toggle(){
    $("#ele_edit_file_present").toggle();
    $("#control_edit_file_present").show();
}

function subfile_toggle(){
    $("#ele_edit_file_present_sub").toggle();
    $("#control_edit_file_present_sub").show();
}








function toggle() {
    $("#navbar_center").toggle();
}

function Addfile(position){
   
    var hdnaddfile = $("#hdn_"+position+"_file").val();
    cnt_add_file++;
    hdnaddfile++;

    $("#div_file_"+position+"").append("<input type='file' id='txt_"+position+"_file_"+cnt_add_file+"' style='display:none;'  onchange='filename(this,\""+position+ "\","+cnt_add_file+");' name='txtfile_"+hdnaddfile+"[]' multiple>");
    $("#txt_"+position+"_file_"+cnt_add_file).click();
    $("#hdn_"+position+"_file").val(hdnaddfile);
}

function filename(e,position,itm_file){
//var names = [];

for (var i = 0; i < e.files.length; ++i) {
   // names.push(e.files[i].name);
    $("#div_file_"+position).append("<div id='itm_"+position+"_"+itm_file+"_"+i+"' style='width:60%;margin:0.5em;'>"
    + "<table style='width:100%;'><tr><td><span id='txt_add_"+position+"_file_"+i+"'>"+e.files[i].name+"</span></td>"
    + "<td style='width:5%;'><li class='fa fa-remove' style='cursor:pointer;color:red;' onclick='remove_file_itm("+i+",\""+position+ "\","+itm_file+");'></li></td></tr></table></div>");
}

}


function filename2(e,position,itm_file){
    var names = [];
    var fileExtension = ['pdf'];

    for (var i = 0; i < (e.files.length);i++) {
       
        if ($.inArray(e.files[i].name.split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert(i);
           // remove_file(i,position,itm_file);
            names.push(i);
           
        }else{
        $("#div_file_"+position).append("<div id='itm_"+position+"_"+itm_file+"_"+i+"' style='width:60%;margin:0.5em;'>"
        + "<table style='width:100%;'><tr><td><span id='txt_add_"+position+"_file_"+i+"'>"+e.files[i].name+"</span></td>"
        + "<td style='width:5%;'><li class='fa fa-remove' style='cursor:pointer;color:red;' onclick='remove_file_itm("+i+",\""+position+ "\","+itm_file+");'></li></td></tr></table></div>");
        }
    }

    //remove worng file in multiple file
    for (var i = 0; i < (names.length);i++) {
       
        //alert(names[i]);
       remove_file(names[i],position,itm_file);
       //alert(names[i]);
    }
    
}


    function remove_file(index,position,itm_file){
  
        var attachments = document.getElementById("txt_"+position+"_file_"+itm_file).files; // <-- reference your file input here
        var fileBuffer = new DataTransfer();
    
        for (let i = 0; i < attachments.length; i++) {
            if (index !== i){
                fileBuffer.items.add(attachments[i]);
            }
        }    

        document.getElementById("txt_"+position+"_file_"+itm_file).files = fileBuffer.files; 
        $("#itm_"+position+"_"+itm_file+"_"+index).fadeOut(200, function(){ });
    }



function remove_file_itm(index,position,itm_file){
    var attachments = document.getElementById("txt_"+position+"_file_"+itm_file).files; // <-- reference your file input here
    var fileBuffer = new DataTransfer();

    for (var i = 0; i < attachments.length; i++) {
        //alert(i);
        if (i!==index){
           // alert(i);
           // alert(attachments[i]);
            fileBuffer.items.add(attachments[i]);
        }
    }

    document.getElementById("txt_"+position+"_file_"+itm_file).files = fileBuffer.files; 
    $("#itm_"+position+"_"+itm_file+"_"+index).fadeOut(200, function(){ });

    }



function file_present(e,position){
 
    var fileExtension = ['pptx','pdf'];
    if ($.inArray($(e).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#error_"+position+"_file_present").text("only formats are allowed : "+fileExtension.join(', '));
        $(e).val(null); 
    }else{
        $("#error_"+position+"_file_present").text("");
    }

}





