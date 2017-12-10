<?php
    session_start();
?>
<html>
    <head>
        <title> Resend Email Verification </title>
    </head>
    <body>
        <b> Resend email verification to our email </b>
        <br><br>
        <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
        <br>
        <form class="form-horizontal contactform" action="resend-mail.php" method="post" name="f">
        <fieldset>

            <div class="form-group">
            <label class="col-lg-12 control-label" for="uemail">Email:
                <input type="text" placeholder="Your Email" id="uemail" class="form-control" name="uemail">
                </label>
            </div>

            <div class="form-group">
            <div class="col-lg-10">
            <button class="btn btn-primary" type="submit" name="sub3">Submit</button> 
            </div>
            </div>
        </fieldset>
        </form>
        
    </body>
</html>