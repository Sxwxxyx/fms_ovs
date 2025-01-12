<?php 
    session_start();

    // delete all sessions
    session_destroy();
    unset($_SESSION['admin_std_id']);

    header("Location: sign-in_admin.html");
    exit;
?>