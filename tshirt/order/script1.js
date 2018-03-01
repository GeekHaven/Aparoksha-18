$(document).ready(function()  {

    $(function () {
        $('#datetimepicker1').datetimepicker({
            minDate: new Date('2018-03-01'),
            maxDate: moment(),
            format: 'L', 
        });
    });
    
});