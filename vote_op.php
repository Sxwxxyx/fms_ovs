<?php 
    session_start();

    //set current timezone
    date_default_timezone_set("Asia/Bangkok");
    
    include_once 'php/dbconnect.php';
    include_once 'php/vote_data.php';
    include_once 'php/voters.php';

    //get connection
    $database = new Database();
    $db = $database->getConnection();

    //pass connection to table
    $vote_data = new Vote_data($db);
    $voter = new Voters($db);

    //insert
    if (isset($_POST['submit']) && $_POST['txt-vote'] <> "") {
        $vote_data->hcode = hash("sha256", $_SESSION['std_id'] . $_SESSION['std_name']);
        $vote_data->vcandidate = $_POST['txt-vote'];
        $vote_data->vdate = date("Y/m/d H:i:s");

        if ($vote_data->create()) {
            //update vote status in voters table
            $voter->std_id = $_SESSION['std_id'];
            $voter->vstatus = 1;
            $voter->vdate = date("Y/m/d H:i:s");

            if ($voter->update_vstatus()) {
                //clear session
                unset($_SESSION['std_id']);
                unset($_SESSION['std_name']);
                session_destroy();
                //redirect to vote-done.html
                header("Location: vote-done.html");
            }

        } else {
            header("Location: vote.php?msg=error");
        }
    }

    //insert vote no
    if (isset($_GET['vote']) && $_GET['vote'] == 'no') {
        $vote_data->hcode = hash("sha256", $_SESSION['std_id'] . $_SESSION['std_name']);
        $vote_data->vcandidate = '0';
        $vote_data->vdate = date("Y/m/d H:i:s");

        if ($vote_data->create()) {
            //update vote status in voters table
            $voter->std_id = $_SESSION['std_id'];
            $voter->vstatus = 1;
            $voter->vdate = date("Y/m/d H:i:s");

            if ($voter->update_vstatus()) {
                //clear session
                unset($_SESSION['std_id']);
                unset($_SESSION['std_name']);
                session_destroy();
                //redirect to vote-done.html
                header("Location: vote-done.html");
            }

        } else {
            header("Location: vote.php?msg=error");
        }
    }

?>