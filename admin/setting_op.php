<?php 

    //set current timezone
    date_default_timezone_set("Asia/Bangkok");
    
    include_once '../php/dbconnect.php';
    include_once '../php/setting.php';

    //get connection
    $database = new Database();
    $db = $database->getConnection();

    //pass connection to table
    $setting = new Setting($db);

    //update vote_status
    if (isset($_POST['submit-vote'])) {
        $setting->vote_status = $_POST['vote-status'];
        $setting->updated_date = date("Y/m/d H:i:s");
        if ($setting->update_vote_status()) {
            //redirect to admin_setting.php
            header("Location: admin_setting.php?save-vote=ok");
        }
    }

    //update show_result
    if (isset($_POST['submit-result'])) {
        $setting->show_result = $_POST['result-status'];
        $setting->updated_date = date("Y/m/d H:i:s");
        if ($setting->update_show_result()) {
            //redirect to admin_setting.php
            header("Location: admin_setting.php?save-result=ok");
        }
    }

?>