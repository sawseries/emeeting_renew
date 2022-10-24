$(document).ready(function() {

    $("#frmuser").validate({});

});
     
function updates(fields,ids,parameter) {
    var values = parameter.value;               
            $.ajax({
                url: "./index.php?controller=User&action=update",
                type: "POST",
                data: {field: fields, value: values, id:ids},
                success: function (data)
                {
                    if (data) {
                        $("#control_"+fields).hide();
                        $("#display_"+fields).html("");
                        $("#display_"+fields).show();
                        $("#display_"+fields).append(data);
                    }else{
                        window.location.reload();
                    }
                },
                error: function (xhr, desc, err)
                {
                    alert(err);
                }
            });
} 


function updates_select(fields,ids,parameter) {
    var values = parameter.value;               
            $.ajax({
                url: "./index.php?controller=User&action=update",
                type: "POST",
                data: {field: fields, value: values, id:ids},
                success: function (data)
                {
                    window.location.reload();
                },
                error: function (xhr, desc, err)
                {
                    alert(err);
                }
            });
}  


function updates_privilege(user_ids,fields,doc_ids,para) {
    var values = 0; 
    if($(para).prop("checked") == true){
        values = 1;
    }else if($(para).prop("checked") == false){
        values = 0;
    }

    $.ajax({
        url: "./index.php?controller=User&action=update_privilege",
        type: "POST",
        data: {field: fields,value: values,user_id:user_ids,doc_id:doc_ids},
        success: function (data)
        {
            //$("#error").text(data);
             //window.location.reload();
        },
        error: function (xhr, desc, err)
        {
            alert(err);
        }
    });
}


function add_privileges(user_ids){
    var doc_ids = $("#sle_doc_name").val();
   // alert(user_ids);
    $.ajax({
        url: "./index.php?controller=User&action=add_privilege",
        type: "POST",
        data: {user_id:user_ids,doc_id:doc_ids},
        success: function (data)
        {
           window.location.reload();
        },
        error: function (xhr, desc, err)
        {
            alert(err);
        }
    });

    //alert(doc_id);
    //window.location.reload();
}


function delete_privileges(prv_id){

    $.ajax({
        url: "./index.php?controller=User&action=delete_privilege",
        type: "POST",
        data: {id:prv_id},
        success: function (data)
        {
            window.location.reload();
        },
        error: function (xhr, desc, err)
        {
            alert(err);
        }
    });

}
