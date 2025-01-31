<?php
session_start();

if (!isset($_SESSION['std_id'])) {
    header("Location: index.php");
}
// $_SESSION['std_id'] = "6210513061";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thank You | FMS Online Voting System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <style>
        h1,
        .text-thank,
        .btn {
            font-family: 'Prompt';
        }
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

                    <a class="navbar-brand" href="index.php">
                        <h1><img src="images/logo_fms1.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">หน้าแรก</a></li>
                        <li class="active"><a href="vote.php">ลงคะแนนโหวต</a></li>
                        <li class="dropdown"><a><?php echo $_SESSION['std_id']; ?> <i class="fas fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="php/sign-out.php">Sign Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <!-- <div class="logo-image padding-top">
        <a href="index.php"><img class="img-responsive" src="images/logo_fms.png" alt=""> </a>
    </div> -->
    <section id="coming-soon">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="text-center coming-content">
                        <h1>ขอบคุณสำหรับการลงคะแนน<br>Thank You for Your Vote</h1>
                        <br><br>
                        <h3 class="text-thank">
                            กรุณาตอบแบบประเมินเพื่อการปรับปรุงรูปแบบกิจกรรมและโครงการต่อไปในอนาคต<h3>
                                <div class="qr-img">
                                    <!-- <h4>สแกน</h4> -->
                                    <img src="images/Samo48/qr.jpg" alt="Qr" style="width: 170px;">
                                </div>
                                <div class="separator-container">
                                    <hr class="separator-line">
                                    <span class="text-thank">หรือ</span>
                                </div>
                                <br>
                                <div>
                                    <!-- <h4>คลิก</h4> -->
                                    <!-- <button class="btn btn-common" onclick="window.location.href='https://docs.google.com/forms/d/1dlTD34nwO3Y4YcLfe-Yo_6WB8r7_7tn4iEDRuObrFPg/edit';" target="_blank">ทำแบบประเมินโครงการเลือกตั้งคณะกรรมการบริหารสโมสรนักศึกษา ประจำปีการศึกษา 2562</button></h3>  -->
                                    <!-- <button class="btn btn-common" onclick="window.location.href='https://docs.google.com/forms/d/e/1FAIpQLScjNeAXZQnvyiGktObXWZrScQBLj3LLPSWS-sVbd_2urZECCw/viewform;'" target="_blank">ทำแบบประเมินโครงการเลือกตั้งคณะกรรมการบริหารสโมสรนักศึกษา ประจำปีการศึกษา 2565</button></h3>  -->
                                    <!-- <button class="btn btn-common" onclick="window.location.href='https://docs.google.com/forms/d/e/1FAIpQLScIDGEbHyMFW-6RrAwaaBaKiDipa_905EWmn8WdUL2ka31Cig/viewform';" target="_blank">ทำแบบประเมินโครงการเลือกตั้งคณะกรรมการบริหารสโมสรนักศึกษา ประจำปีการศึกษา 2567</button></h3>  -->
                                    <button class="btn btn-common"
        onclick="window.open('https://docs.google.com/forms/d/e/1FAIpQLSdTGN8VnAQGkIH7RzAJDHADIGXbNH0Tuvdn2gJMLeY-V_NbKg/viewform?fbclid=IwY2xjawH67SlleHRuA2FlbQIxMAABHaqdEN61ylFKdsEpXv1BR3xCmvzlS9sxtJgSRL5808gBFUz60JhzpCsb-w_aem_QIs08W2RpKs53lDU08dO4g', '_blank');">
    ทำแบบประเมินโครงการเลือกตั้งคณะกรรมการบริหารสโมสรนักศึกษา ประจำปีการศึกษา 2568
</button>

                            </h3>
                            <!--<h3 class="text-thank"><a href="index.php" class="btn btn-common">หน้าแรก</a></h3> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; <a href="https://www.fms.psu.ac.th/">FMS@PSU</a> 2025. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
        //Countdown js
        $("#countdown").countdown({
            date: "10 march 2015 12:00:00",
            format: "on"
        },
            function () {
                // callback function
            });
    </script>

</body>

</html>