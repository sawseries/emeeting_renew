var editor_id = '';
$(document).ready(function () {

    $("#frminsertroot").validate({});

    $("#frmeditroot").validate({});

    $("#frmeditsub").validate({});

    var obj = ["doctopic_text", "detail"];
    $.each(obj, function (index, value) {
        editor_control(value); //เป็น text control ที่ต้องเอาไปupdate ใน controller
    });
    
    var obj2 = ["doctopic_text1", "doctopic_text2", "title1", "title2", "topic1", "topic2", "topic3", "topic4"];
    $.each(obj2, function (index, value) {
        editor(value); //เป็น text control ที่ไม่ต้อง update ใน controller
    });
    
});




$(function () {
    $("#tblLocations").sortable({
        items: 'tr:not(tr:first-child)',
        cursor: 'pointer',
        axis: 'y',
        scroll: false,
        placeholder: "sortable-placeholder",
        dropOnEmpty: true,
        start: function (e, ui) {
            ui.item.addClass("selected");            
        },
        stop: function (e, ui) {
            ui.item.removeClass("selected");
        },
        update: function (event, ui) {
            $(this).find("tr").each(function (index) {
                var NewPosition = $("tr").index(this);
                var ids = $(this).closest('tr').find("td:eq(0) input").val();
                if (ids) {
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=update_row",
                        type: "POST",
                        data: { id: ids, no: NewPosition },
                        success: function (data) {

                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }
            });
        }
    });
});


$(function () {
    var subcnt = $("#hdnsubcnt").val();
    for (j = 0; j <= (subcnt - 1); j++) {
        $("#sortable_"+j).sortable({
            update: function (event, ui) {
                var str = this.id;
                var round = str.split('_')[1];
                $(this).children().each(function (i) {
                  var NewPosition = i;
                  var ids = $(this).closest("li").find("input:eq(0)").val();
                    if (ids) {
                        $.ajax({
                            url: "./index.php?controller=Agenda&action=update_row",
                            type: "POST",
                            data: { id: ids, no: NewPosition },
                            success: function (data) {

                            },
                            error: function (xhr, desc, err) {
                                alert(err);
                            }
                        });
                    }
                });
            }
        });
    }
});

function deletesub(codes) {
    $.ajax({
        type: "POST",
        url: "./index.php?controller=Agenda&action=delete_sub",
        data: { code: codes },
        success: function (data) {
           
            window.location.reload();
        }
    });
}


function delete_term(codes) {

    $.ajax({
        type: "POST",
        url: "./index.php?controller=Agenda&action=delete_term",
        data: { code: codes },
        success: function (data) {
            //alert(data);
            window.location.reload();
        }
    });
}

function updates_active(fields, codes, parameter) {

    var values = parameter.value;

    $.ajax({
        url: "./index.php?controller=Agenda&action=updates_active",
        type: "POST",
        data: { field: fields, value: values, code: codes },
        success: function (data) {

            if (data == true) {
                window.location.reload();
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}

function updates(fields, codes, parameter) {

    var values = parameter.value;
    $.ajax({
        url: "./index.php?controller=Agenda&action=update_meeting",
        type: "POST",
        data: { field: fields, value: values, code: codes },
        success: function (data) {
            //alert(data);
            if (data) {
                $("#control_"+fields).hide();
                $("#display_"+fields).html("");
                $("#display_"+fields).show();
                $("#display_"+fields).append(data);
            }else{
                window.location.reload();
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}


function update_meeting_type() {

    var types = $('input[name="rdo_type"]:checked').val();
    var paras = $('#txtlink').val();
    var codes = $('#hdncode').val();
    var errors = false;

    if ((types == '2') || (types == '3')) {

        if (paras == "") {
            errors = true;
            $("#slinkerror").text("กรุณาระบุ Link");
        }

    }

    if (errors == false) {
        $.ajax({
            url: "./index.php?controller=Agenda&action=update_meeting_type",
            type: "POST",
            data: { type: types, link: paras, code: codes },
            success: function (data) {
                if (data == true) {
                    window.location.reload();
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }

}

$(function () {
    $("#btninsertroot").on('click', function(e) {
        if ($('#frminsertroot').valid()) {
            $('#frminsertroot').submit(function (e) {
                var form = $('#frminsertroot')[0];
                var data = new FormData(form);
                $(this).find(':submit').attr('disabled','disabled');
                $("#loader_insert_root").fadeIn();  
                
                $.ajax({
                    url: "./index.php?controller=Agenda&action=insert_root",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data, status, xhr) {
                   alert(data);
                            if (data.trim()=="success") {
                                window.location.reload();   
                            } else {
                               alert(data);
                               window.location.reload();   
                            }
                    },
                    complete: function(data) {
                      return false;
                    }, //EINDE complete
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
                
            });
       
    }//endelse
    }); // Click effect   
  
});

$(function () {
    $("#btneditroot").on('click', function() {
        
        if ($('#frmeditroot').valid()) {
            $('#frmeditroot').submit(function (e) {
                var form = $('#frmeditroot')[0];
                var data = new FormData(form);
                $("#loader_edit_root").fadeIn(); 
                $.ajax({
                    url: "./index.php?controller=Agenda&action=edit_root",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                  
                        if (data.trim()=="success") {
                            $("#loader_edit_root").fadeIn();
                                window.location.reload();   
                        }else{
                            $("#loader_edit_root").hide();
                            $("#s_edit_root_error").text(data);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });            
        } else {
            return false;
        }
    }); // Click effect     
});


$(function () {
    $("#btninsertsub").on('click', function() {

        if ($('#frminsertsub').valid()) {
            $('#frminsertsub').submit(function (e) {
               e.preventDefault();
                var form = $('#frminsertsub')[0];
                var data = new FormData(form);
                   $(this).find(':submit').attr('disabled','disabled');
                $.ajax({
                    url: "./index.php?controller=Agenda&action=insert_sub",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                      
                          if (data.trim()=="success") {
                            $("#loader_insert_sub").fadeIn();
                            window.location.reload();   
                        }else{
                            $("#s_insert_sub_error").text(data);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        } else {
            return false;
        }
    }); // Click effect   
    /*----------------------------------------*/
});



$(function () {
    $("#btneditsub").on('click', function() {
     
        if ($('#frmeditsub').valid()) {
            $('#frmeditsub').submit(function (e) {
                  $(this).find(':submit').attr('disabled','disabled');
                var form = $('#frmeditsub')[0];
                var data = new FormData(form);

                $("#loader_edit_sub").fadeIn();
                $.ajax({
                    url: "./index.php?controller=Agenda&action=edit_sub",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                       
                        if (data.trim()=="success") {
                            $("#loader_edit_sub").fadeIn();
                                window.location.reload();   
                        } else {
                            $("#s_edit_sub_error").text(data);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        } else {
            return false;
        }
    }); // Click effect   
});


function update_output(id) {
    var para = $('#editor_' + id).html();
    var codes = $("#hdncode").val();
    //alert(id);
    $.ajax({
        url: "./index.php?controller=Agenda&action=update_meeting",
        type: "POST",
        data: { field: id, value: para, code: codes },
        async: true,
        success: function (data) {
            if (data) {
                $("#display_" + id).html(para);
                $("#txt_" + id).html(para);
                elechecks(false);
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}



function update_text(id) {
    var para = $('#editor_' + id).html();
    $("#txt" + id).html(para);

}


function seteditsub(ids){
  
    $.ajax({
        url: "./index.php?controller=Agenda&action=getroot_edit",
        type: "POST",
        data: { id: ids },
        success: function (data) {
           
            /*----cleartext-- */
            $("#rdo_text").prop("checked", false);
            $("#rdo_link").prop("checked", false);
            $("#rdo_file").prop("checked", false);
            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").hide();
            $("#s_edit_sub_error").text(""); 
            $("#txt_hdn_edit_sub_file").val("");
            $("#control_edit_file_sub").html("");
            $("#txteditsublink").val("");
            $("#hdn_edit_sub_file_present").val("");
            $("#text_edit_sub_file_present").text("");

            var result = jQuery.parseJSON(data);
            $("#txttopic4").text(result.topic);
            $("#editor_topic4").html(result.topic);
            $("#hdneditsubid").val(result.id);
            $("#hdn_edit_sub_id").val(result.id);
            $("#hdn_edit_sub_code").val(result.code);
            $("#hdn_edit_sub_doc_code").val(result.doc_code);
            $("#txtsub_number").val(result.number);

            //alert(result.file_present);

            if(result.file_present==""){
                $("#control_edit_sub_file_present").hide();
                $("#ele_edit_sub_file_present").show();
            }else{
                $("#control_edit_sub_file_present").show();
                $("#ele_edit_sub_file_present").hide();
                $("#text_edit_sub_file_present").text(result.file_present);
                $("#hdn_edit_sub_file_present").val(result.file_present);
            }

            if(result.type=='1'){
                $("#rdo_edit_sub_text").prop("checked", true);
                $("#tr_link_edit_sub").hide();
                $("#tr_file_edit_sub").hide();
            }else if(result.type=='2'){
                $("#rdo_edit_sub_link").prop("checked", true);
                $("#tr_link_edit_sub").show();
                $("#tr_file_edit_sub").hide();
                $("#txteditsublink").val(result.link);
            }else if(result.type=='3'){
               $("#tr_link_edit_sub").hide(); 
               $("#control_edit_file_sub").show();
               $("#ele_edit_file_sub").hide();
               $("#s_file_sub_nm").html("");
               $("#rdo_edit_sub_file").prop("checked", true);
               $("#tr_file_edit_sub").show();
               setitmfile(result.code,'control_edit_file_sub');
            }         
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });    
    }
    

                 function seteditroot(ids){
                  
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=getroot_edit",
                        type: "POST",
                        data: { id: ids },
                        success: function (data) {

                            /*----cleartext-- */
                            $("#rdo_edit_root_text").prop("checked", false);
                            $("#rdo_edit_root_link").prop("checked", false);
                            $("#rdo_edit_root_file").prop("checked", false);
                            $("#tr_link_edit_root").hide();
                            $("#tr_file_edit_root").hide();
                            $("#s_edit_root_error").text("");
                            $("#txt_hdn_edit_root_file").val("");
                            $("#s_file_root_nm").html("");
                            
                            
                            $("#control_edit_file_root").html("");
                            $("#txt_edit_root_link").val("");
                            $("#txt_edit_root_file_present").val("");
                            $("#hdn_edit_root_file_present").val("");
                            $("#text_edit_root_file_present").text("");

                            var result = jQuery.parseJSON(data);
                            $("#txttitle2").text(result.title);
                            $("#txttopic2").text(result.topic);                         
                            $("#editor_topic2").html(result.topic);
                            $("#editor_title2").html(result.title);                         
                            $("#hdn_edit_root_id").val(result.id);
                            $("#hdn_edit_root_code").val(result.code);
                            $("#hdn_edit_root_doc_code").val(result.doc_code);

                            if(result.file_present==""){
                                $("#control_edit_root_file_present").hide();
                                $("#ele_edit_root_file_present").show();
                            }else{
                                $("#control_edit_root_file_present").show();
                                $("#ele_edit_root_file_present").hide();
                                $("#text_edit_root_file_present").text(result.file_present);
                                $("#hdn_edit_root_file_present").val(result.file_present);

                            }


                            if(result.type=='1'){
                                $("#rdo_edit_root_text").prop("checked", true);
                                $("#txt_hdn_edit_root_file").val("");
                                
                            }else if(result.type=='2'){
                                $("#rdo_edit_root_link").prop("checked", true);
                                $("#tr_link_edit_root").show();
                                $("#tr_link_edit_root").show();
                                $("#txt_edit_root_link").val(result.link);
                                $("#txt_hdn_edit_root_file").val("");
                              
                            }else if(result.type=='3'){
                                $("#control_edit_file_root").show();
                                $("#ele_edit_file_root").hide();                                
                                $("#rdo_edit_root_file").prop("checked", true);
                                $("#tr_file_edit_root").show();
                                
                              //  $("#div_file_edit_root").hide();
                                setitmfile(result.code,'control_edit_file_root');
                                
                            }     




                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }


                function setitmfile(code,position){
                 
                    $("#hdn_report_code").val(code);
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=getitmfile",
                        type: "POST",
                        data: { code: code },
                        success: function (data) {
                       
                            $("#"+position).html(data);
                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });

                }

                function deleteitmfile(id){
                   
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=delete_one_file",
                        type: "POST",
                        data: { id: id },
                        success: function (data) {         
                          
                            $("#itm_file_"+id).fadeOut();
                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }


                function close_popup_report(){
                    var code = $("#hdn_report_code").val();
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=check_close_file",
                        type: "POST",
                        data: { code: code },
                        success: function (data) {
                            window.location.reload();
                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }


            



function delete_file_present(position){
    var ids = $("#hdn_edit_"+position+"_id").val();
    var file_names = $("#hdn_edit_"+position+"_file_present").val();
    
    $.ajax({
        url: "./index.php?controller=Agenda&action=delete_present_file",
        type: "POST",
        data: { id: ids, file_name: file_names },
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            
            if (data) {
            $("#control_edit_"+position+"_file_present").hide();
            $("#ele_edit_"+position+"_file_present").show();
            $("#hdn_edit_"+position+"_file_present").val("");
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });    

   
}

function edit_root_file_toggle(){
    $("#tr_edit_root_file").toggle();
}

