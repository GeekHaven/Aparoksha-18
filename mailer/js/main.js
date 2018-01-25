$(document).ready(function () {
    $("#employee_email").hide();
    $("#employee_name").hide();
    $("#employee_radio").click(function () {
        $('#inputText10').required = true;
        $('#inputText11').required = true;
        $('#inputText3').required = false;
        $("#employee_email").fadeIn();
        $('#employee_name').fadeIn();
        $('#company_email').fadeOut();
    });
    $("#company_radio").click(function () {
        $('#inputText10').required = false;
        $('#inputText11').required = false;
        $('#inputText3').required = true;
        $("#employee_email").fadeOut();
        $('#employee_name').fadeOut();
        $('#company_email').fadeIn();
    });
});