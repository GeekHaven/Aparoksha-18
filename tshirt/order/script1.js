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

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    //var img1 = document.getElementById('myImg1');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        modalImg.alt = this.alt;
        captionText.innerHTML = this.alt;
    }
    // img1.onclick = function(){
    //     modal.style.display = "block";
    //     modalImg.src = this.src;
    //     modalImg.alt = this.alt;
    //     captionText.innerHTML = this.alt;
    // }

    // When the user clicks on <span> (x), close the modal
    modal.onclick = function() {
        img01.className += " out";
        setTimeout(function() {
        modal.style.display = "none";
        img01.className = "modal-content";
        }, 400);
        
    }
    
});