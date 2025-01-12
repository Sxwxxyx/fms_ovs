<?php
    session_start();

    // delete all sessions
    session_destroy();
    unset($_SESSION['std_id']);
    unset($_SESSION['std_name']);

    header("Location: ../index.php");
    exit;
?>