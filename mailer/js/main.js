$(document).ready(function () {
    $("#employee_email").hide();
    $("#employee_name").hide();
    $("#employee_radio").click(function () {
        $("#employee_email").fadeIn();
        $('#employee_name').fadeIn();
        $('#company_email').fadeOut();
    });
    $("#company_radio").click(function () {
        $("#employee_email").fadeOut();
        $('#employee_name').fadeOut();
        $('#company_email').fadeIn();
    });
});