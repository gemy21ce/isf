function sendAjax(url,div,show){
    $.ajax({
        //cache: false,
        type: "GET",
        url: url,
        success: function(html){
            $('#'+div).html(html);
            if(show!=null && show!=undefined){
                $("#"+show).show();
            }
        }
    });
}
function show(className){
    $('.'+className).show();
}
function hide(className){
    $('.'+className).hide();
}
