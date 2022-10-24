function setitmfile(code,position){
                 
    $("#"+position).html("11");
    $("#hdn_report_code").val(code);
    $.ajax({
        url: "./index.php?controller=Master&action=getitmfile",
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