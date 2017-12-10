<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['mobile']);
unset($_SESSION['verify']);
?>

<html>
    <head>
        <title> Registration Page </title>
    </head>
    <body>

        <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
        <br><br>

        <form class="form-horizontal contactform" action="submit.php" method="post" name="f">
        <fieldset>
        <div class="form-group">
            <label>Name:
            <input type="text" placeholder="Your Name" id="uname" class="form-control" name="uname">
            </label>
            </div>

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
            <button class="btn btn-primary" type="submit" name="sub">Submit</button> 
            </div>
            </div>
        </fieldset>
        </form>
        <br>
        <br>
        <a href="check.php">Check your registration status</a>
    </body>
</html>