$(document).ready(function()  {
    $('#frontendcheck').change(function () {
        if (!this.checked) {
            $('#frontend').prop('disabled', true);
        }
        else {
            $('#frontend').prop('disabled', false);
        }        
    });
    $('#backendcheck').change(function () {
        if (!this.checked) {
            $('#backend').prop('disabled', true);
        }
        else {
            $('#backend').prop('disabled', false);
        }        
    });
    $('#fullstackcheck').change(function () {
        if (!this.checked) {
            $('#fullstack').prop('disabled', true);
        }
        else {
            $('#fullstack').prop('disabled', false);
        }        
    });
    $('#contentcheck').change(function () {
        if (!this.checked) {
            $('#content').prop('disabled', true);
        }
        else {
            $('#content').prop('disabled', false);
        }        
    });
    $('#businesscheck').change(function () {
        if (!this.checked) {
            $('#business').prop('disabled', true);
        }
        else {
            $('#business').prop('disabled', false);
        }        
    });
    $('#graphicscheck').change(function () {
        if (!this.checked) {
            $('#graphics').prop('disabled', true);
        }
        else {
            $('#graphics').prop('disabled', false);
        }        
    });
    $('#marketingcheck').change(function () {
        if (!this.checked) {
            $('#marketing').prop('disabled', true);
        }
        else {
            $('#marketing').prop('disabled', false);
        }        
    });
    $('#datasciencecheck').change(function () {
        if (!this.checked) {
            $('#datascience').prop('disabled', true);
        }
        else {
            $('#datascience').prop('disabled', false);
        }        
    });
    if(!$("#terms").checked) {
        $('#submit').prop('disabled', true);
    }
    if(!$("#frontendcheck").checked) {
        $('#frontend').prop('disabled', true);
    }
    if(!$("#backendcheck").checked) {
        $('#backend').prop('disabled', true);
    }
    if(!$("#contentcheck").checked) {
        $('#content').prop('disabled', true);
    }
    if(!$("#businesscheck").checked) {
        $('#business').prop('disabled', true);
    }
    if(!$("#graphicscheck").checked) {
        $('#graphics').prop('disabled', true);
    }
    if(!$("#fullstackcheck").checked) {
        $('#fullstack').prop('disabled', true);
    }
    if(!$("#marketingcheck").checked) {
        $('#marketing').prop('disabled', true);
    }
    if(!$("#datasciencecheck").checked) {
        $('#datascience').prop('disabled', true);
    }
  }); 
  