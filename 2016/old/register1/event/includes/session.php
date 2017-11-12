<?php
    ob_start();
?>
<?php
    require_once("functions.php");
?>
<?php
    $ref_time = "300";

    date_default_timezone_set('Asia/Calcutta');
    
    session_start();

    function logged_in($type) {
        return isset($_SESSION['uid']) && isset($_SESSION['type']) && isset($_SESSION['crypted']) && $_SESSION['type'] == $type && crypt($_SESSION['uid'], $_SESSION['crypted']) == $_SESSION['crypted'];
    }
    
    function confirm_user() {
        if (!logged_in("part")) {
            header("Location: login.php");
        }
    }
    
    function confirm_admin() {
        if (!logged_in("admin")) {
            header("Location: ../login.php");
        }
    }
    
    function confirm_both() {
	if (logged_in("admin") == 0 && logged_in("part") == 0) {
            header("Location: ../login.php");
        }
    }
    
    $_SESSION['uid'] = 'ABC';
    $_SESSION['type'] = 'part';
    $_SESSION['crypted'] = "crypt";
?>

<?php
    ob_end_flush();
?>
