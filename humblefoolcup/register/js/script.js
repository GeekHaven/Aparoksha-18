$(document).ready(function()  {
    $('#submit').prop('disabled', true);
    $("#tid").change(function() {
        var username = $('#tid').val();
        $.ajax({
            url: 'https://api.topcoder.com/v3/users/validateHandle?handle='+ username,
            type: "GET",
            dataType: "json",
            success: function(data){
                if(data.result.content['reasonCode'] === "ALREADY_TAKEN"){
                    $('#submit').prop('disabled', false);
                    $('#topcoder-error').html('');
                    $("#topcoder").removeClass('has-error');
                }
                else{
                    $('#submit').prop('disabled', true);
                    $("#topcoder").addClass('has-error').removeClass('has-success');
                    $('#topcoder-error').html("Please Enter a valid Topcoder handle.");
                }
            }
        });
    })
});