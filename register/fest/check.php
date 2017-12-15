<?php
session_start();
?>

<html>
    <head>
        <title> Registration Status </title>
    </head>
    <body>
        <b> Check your registration status here </b>
        <br><br>
        <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
        <br>
        <form class="form-horizontal contactform" action="check-status.php" method="post" name="f">
        <fieldset>

            <div class="form-group">
            <label class="col-lg-12 control-label" for="uemail">Email:
                <input type="text" placeholder="Your Email" id="uemail" class="form-control" name="uemail">
                </label>
            </div>

            <div class="form-group">
                <label class="col-lg-12 control-label" for="pass1">Mobile:
                <input type="text" placeholder="Mobile" id="mobile" class="form-control" name="mobile">
                </label>
            </div>

            <div class="form-group">
            <div class="col-lg-10">
            <button class="btn btn-primary" type="submit" name="sub1">Submit</button> 
            </div>
            </div>
        </fieldset>
        </form>
        <br>
        <br>
        <a href="index.php">Go back home</a><br>

        <span> name: </span> <?php if(isset($_SESSION['name'])){echo("{$_SESSION['name']}"); unset($_SESSION['name']);} ?> <span> <br>
        <span> email: </span> <?php if(isset($_SESSION['email'])){echo("{$_SESSION['email']} "); unset($_SESSION['email']);}
         if(isset($_SESSION['verify'])){if($_SESSION['verify'] == "pending"){echo "(Unverified) <a href='resend.php'>resend mail </a>";}
         else{echo "Verified";} unset($_SESSION['verify']);}?> <span><br>
        <span> mobile: </span> <?php if(isset($_SESSION['mobile'])){echo("{$_SESSION['mobile']}"); unset($_SESSION['mobile']);} ?> <span><br>

    </body>
</html>