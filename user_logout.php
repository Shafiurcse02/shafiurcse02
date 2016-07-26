<?php
session_start(); //to ensure you are using same session
session_destroy();
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
     unset($_SESSION['type']);
     unset($_SESSION);
    
    header("Location: http://localhost/shafiurcse02/user_login.php");
}
?>
