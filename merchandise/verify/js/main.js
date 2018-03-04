$(document).ready(function () {
    $("#employee_email").hide();
    $("#employee_name").hide();
    $('#inputText3').prop('required',true);
    $("#employee_radio").click(function () {
        $('#inputText10').prop('required',true);
        $('#inputText11').prop('required',true);
        $('#inputText3').prop('required',false);
        $("#employee_email").fadeIn();
        $('#employee_name').fadeIn();
        $('#company_email').fadeOut();
    });
    $("#company_radio").click(function () {
        $('#inputText10').prop('required',false);
        $('#inputText11').prop('required',false);
        $('#inputText3').prop('required',true);
        $("#employee_email").fadeOut();
        $('#employee_name').fadeOut();
        $('#company_email').fadeIn();
    });
});