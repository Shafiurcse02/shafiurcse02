<?php

@session_start();
unset($_SESSION['user_id']);
unset($_SESSION['type']);
unset($_SESSION);
header("Location: http://localhost/shafiurcse02/admin_login.php");
?>
