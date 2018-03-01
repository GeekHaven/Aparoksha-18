$(document).ready(function()  {

    $('#amount').val(300);

    $(function () {
        $('#datetimepicker1').datetimepicker({
            minDate: new Date('2018-03-01'),
            maxDate: moment(),
            format: 'L', 
        });
    });

    $('#ttype').change(function () {
        var quantity = $('#quantity').val();
        var type = $('#ttype').val();

        quantity = parseInt(quantity);

        if(type === 'Combo') {
            $('#amount').val(550*quantity);
        }
        else if(type === 'A' || type === 'B') {
            $('#amount').val(300*quantity);
        }
    });

    $('#quantity').change(function () {
        var quantity = $('#quantity').val();
        var type = $('#ttype').val();

        quantity = parseInt(quantity);

        if(type === 'Combo') {
            $('#amount').val(550*quantity);
        }
        else if(type === 'A' || type === 'B') {
            $('#amount').val(300*quantity);
        }
    });
    
});