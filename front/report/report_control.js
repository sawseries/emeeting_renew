$(document).ready(function() {
});
     
function updates(fields,codes,parameter) {
    var values = parameter.value;               
            $.ajax({
                url: "./index.php?controller=Report&action=update_meeting",
                type: "POST",
                data: {field: fields, value: values, code:codes},
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
