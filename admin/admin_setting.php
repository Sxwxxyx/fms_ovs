<?php 

    session_start();

    // $_SESSION['admin_std_id'] = "6010513052"; 

    if (!isset($_SESSION['admin_std_id'])) {
         header("Location: sign-in_admin.html");
    } 

    include_once '../php/dbconnect.php';
    include_once '../php/setting.php';

    //get connection
    $database = new Database();
    $db = $database->getConnection();

    //pass connection to table
    $setting = new Setting($db);

    //get vote_status
    $vote_status = $setting->read_vote_status();
    //get show_result
    $show_result = $setting->read_show_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ruchdee">
    <title>Status Setting | FMS Online Voting System</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet"> 
    <link href="../css/animate.min.css" rel="stylesheet"> 
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">

       <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400;700;900&display=swap" rel="stylesheet">  
    <style>
        h1, .text-desc, li, .btn ,h2 li, input, .title, .title-desc, label {font-family: 'Prompt';}
    </style>
</head><!--/head-->

<body>
	<header id="header">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="..index.php">
                        <h1><img src="../images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php">หน้าแรก</a></li>
                        <li><a href="../vote-result.php">ผลการเลือกตั้ง</a></li>
                        <li class="active"><a href="admin_setting.php">แก้ไขสถานะ</a></li>
                        <li class="dropdown"><a><?php echo $_SESSION['admin_std_id']; ?> <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="sign-out_admin.php">Sign Out</a></li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">แก้ไขสถานะ/Status Settings</h1>
                        </div>
                     </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="about-company" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3 text-center">
                    <form id="admin-setting" name="admin-setting" method="post" action="setting_op.php">
                        <div class="form-group">
                            <label>สถานะการลงคะแนน</label>
                            <select class="form-control custom-select" name="vote-status">
                                <option value="1" <?php if ($vote_status) echo 'selected' ?>>เปิดการลงคะแนน</option>
                                <option value="0" <?php if (!$vote_status) echo 'selected' ?>>ปิดการลงคะแนน</option>
                            </select>
                        </div>                       
                        <div class="form-group">
                            <input type="submit" name="submit-vote" class="btn btn-submit" value="บันทึก/Save">
                        </div>
                        <?php
                            if (isset($_GET['save-vote']) && $_GET['save-vote'] == 'ok') {
                                echo "<h5 class='title' style='color:#DA33FF'>บันทึกข้อมูลเรียบร้อยแล้ว</h5>";
                            } 
                        ?>
                    </form>
                </div>
                <div class="col-sm-3 text-center">
                    <form id="admin-setting" name="admin-setting" method="post" action="setting_op.php">
                        <div class="form-group">
                            <label>สถานะผลการเลือกตั้ง</label>
                            <select class="form-control custom-select" name="result-status">
                                <option value="1" <?php if ($show_result) echo 'selected' ?>>เปิดการแสดงผลการเลือกตั้ง</option>
                                <option value="0" <?php if (!$show_result) echo 'selected' ?>>ปิดการแสดงผลการเลือกตั้ง</option>
                            </select>
                        </div>                       
                        <div class="form-group">
                            <input type="submit" name="submit-result" class="btn btn-submit" value="บันทึก/Save">
                        </div>
                        <?php
                            if (isset($_GET['save-result']) && $_GET['save-result'] == 'ok') {
                                echo "<h5 class='title' style='color:#DA33FF'>บันทึกข้อมูลเรียบร้อยแล้ว</h5>";
                            } 
                        ?>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>
    <!--/#about-company-->

    <footer id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; <a href="https://www.fms.psu.ac.th/">FMS@PSU</a> 2020. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!--     <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/jquery.countTo.js"></script>
 -->    <script type="text/javascript" src="../js/main.js"></script>   
   
</body>
</html>
