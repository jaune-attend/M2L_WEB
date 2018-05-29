$( document ).ready(function () {
    $("#adr_exi_button").on("click",function(e) {
        e.preventDefault();
        $("#adr_exi").css({
            'display' : 'inline-block'
        })
    });
});