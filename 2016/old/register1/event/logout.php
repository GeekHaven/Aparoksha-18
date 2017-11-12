<?php
    ob_start();
?>
<?php
    session_start();
    
    
    if (isset($_SESSION['uid']) || isset($_SESSION['type'])) {
        setcookie('uid', $_SESSION['uid'], time()-645326);
        setcookie('type', $_SESSION['type'], time()-678687);
        setcookie('crypted', $_SESSION['crypted'], time()-476786);
    }
    
    session_destroy();
    header("Location: login.php?logout=1");
?>

<?php
    ob_end_flush();
?>