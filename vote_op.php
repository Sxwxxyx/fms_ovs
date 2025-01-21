<?php
session_start();

// Set timezone
date_default_timezone_set("Asia/Bangkok");

include_once 'php/dbconnect.php';
include_once 'php/vote_data.php';
include_once 'php/voters.php';

// Get connection
$database = new Database();
$db = $database->getConnection();

// Pass connection to table
$vote_data = new Vote_data($db);
$voter = new Voters($db);

// Generate hcode
$vote_data->hcode = hash("sha256", $_SESSION['std_id'] . $_SESSION['std_name']);

// Check if user already voted
if ($vote_data->exists()) {
    echo "<script>
        alert('คุณได้ทำการลงคะแนนแล้ว ไม่สามารถลงคะแนนได้อีก');
        window.location.href = 'vote.php';
    </script>";
    exit();
}

// Process vote submission
if ((isset($_POST['submit']) && !empty($_POST['txt-vote'])) || (isset($_GET['vote']) && $_GET['vote'] == 'no')) {
    // Set vote data
    $vote_data->vcandidate = isset($_POST['txt-vote']) ? $_POST['txt-vote'] : '0';
    $vote_data->vdate = date("Y/m/d H:i:s");

    if ($vote_data->create()) {
        // Update vote status in voters table
        $voter->std_id = $_SESSION['std_id'];
        $voter->vstatus = 1;
        $voter->vdate = date("Y/m/d H:i:s");

        if ($voter->update_vstatus()) {
            header("Location: vote-done.php");
            exit();
        }
    } else {
        echo "<script>
            alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาลองใหม่');
            window.location.href = 'vote.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('กรุณาเลือกตัวเลือกการโหวตก่อนยืนยัน');
        window.location.href = 'vote.php';
    </script>";
    exit();
}
?>
