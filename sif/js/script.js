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
  }); 
  