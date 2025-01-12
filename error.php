<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Error | FMS Online Voting System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        h1, .text-thank, li, .btn {font-family: 'Sarabun', sans-serif;}
        #error-msg {
            background-image: url("images/coming-soon-bg.png");
            background-position: center top;
            background-repeat: repeat-x;
            padding: 40px 0;
            overflow: hidden;
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
                        <h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">หน้าแรก</a></li>              
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="error-msg">        
        <div class="container">
            <div class="row">
                <div class="col-sm-12">                    
                    <div class="text-center">
                        <h1 style="color:red">Error <i class="fas fa-exclamation-circle"></i></h1>
                        <h3 class="text-thank">
                            <?php 
                                if (isset($_GET['err_no']) && $_GET['err_no'] <> '') {
                                    switch ($_GET['err_no']) {
                                        case '1':
                                            echo "รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
                                            break;
                                        case '2':
                                            echo "สำหรับนักศึกษาเท่านั้นที่สามารถใช้งานได้";
                                            break;
                                        case '3':
                                            echo "สำหรับนักศึกษาคณะวิทยาการจัดการเท่านั้นที่สามารถใช้งานได้";
                                            break;
                                        case '4':
                                            echo "ไม่สามารถลงคะแนนโหวตซ้ำได้";
                                            break;
                                    }
                                }
                            ?>
                        </h3>
                        <h3 class="text-thank"><a href="sign-in.html" class="btn btn-common">เข้าสู่ระบบ/Sign In</a></h3>
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
                        <p>&copy; <a href="https://www.fms.psu.ac.th/">FMS@PSU</a> 2020. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    
</body>
</html>