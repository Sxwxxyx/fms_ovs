<?php
		session_start();
?>
<?php 

    include_once 'php/dbconnect.php';
    include_once 'php/setting.php';
    include_once 'php/voters.php';
    include_once 'php/vote_data.php';
    include_once 'php/major.php';

    //get connection
    $database = new Database();
    $db = $database->getConnection();

    //pass connection to table
    $setting = new Setting($db);
    $voter = new Voters($db);
    $vote_data = new Vote_data($db);
    $major = new Major($db);

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
    <meta name="author" content="">
    <title>Home | FMS Online Voting System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
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

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400;700;900&display=swap" rel="stylesheet">  
    <style>
        h1, .text-desc, li, .btn ,h2,h3 {font-family: 'Prompt';}
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
                    	<h1><img src="images/logo_fms.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">หน้าแรก</a></li>
                        <!--<?php 
                            if ($vote_status) { ?>
                                <li><a href='sign-in.html'>เข้าสู่ระบบ</a></li>
                            <?php } else { ?> 
                                <li><a href='admin/sign-in_admin.html'>Admin</a></li>
                            <?php } 
                        ?>-->
                        <!--<?php 
                            if ($show_result) {
                                echo "<li><a href='vote-result.php'>ผลการเลือกตั้ง</a></li>";
                            }
                        ?>-->
                        <?php 
                            if (isset($_SESSION['std_id'])) { ?>
                                <li><a href="vote.php">ลงคะแนนโหวต</a></li>
                                <li class="dropdown"><a><?php echo $_SESSION['std_id']; ?> <i class="fas fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="php/sign-out.php">Sign Out</a></li>
                                </ul></li>
                        <?php } elseif (isset($_SESSION['admin_std_id'])) { ?>
                            <li><a href="vote-result.php">ผลการเลือกตั้ง</a></li>
                            <li><a href="admin/admin_setting.php">แก้ไขสถานะ</a></li>
                            <li class="dropdown"><a><?php echo $_SESSION['admin_std_id']; ?> <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                            <li><a href="admin/sign-out_admin.php">Sign Out</a></li>
                            </ul>
                        </li>
                        <?php } elseif ($vote_status&$show_result) { ?>
                            <li><a href='sign-in.html'>เข้าสู่ระบบ</a></li>
                            <li><a href='vote-result.php'>ผลการเลือกตั้ง</a></li>
                        <?php } elseif ($show_result) { ?>
                            <li><a href='vote-result.php'>ผลการเลือกตั้ง</a></li>
                            <li><a href='admin/sign-in_admin.html'>Admin</a></li>  
                        <?php } elseif ($vote_status) { ?>
                                <li><a href='sign-in.html'>เข้าสู่ระบบ</a></li>
                            <?php } else { ?> 
                                <li><a href='admin/sign-in_admin.html'>Admin</a></li>    
                            <?php } 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <img src="./images/home/slider/Samo47.PNG" width="40%;" class="slider-sun" alt="slider image">
                    <div class="slide-text">
                        <h1>โครงการเลือกตั้ง<br>คณะกรรมการบริหารสโมสรนักศึกษาคณะวิทยาการจัดการ</h1>
                        <p class="text-desc">ประจำปีการศึกษา 2567<br>
                            <i class="fas fa-grip-vertical"></i> โครงการด้านส่งเสริมระบอบประชาธิปไตย และสร้างความเป็นผู้นำ</p>
                        <h3 class="title-desc" style="color:Red;" >ขณะนี้เวลา 
                                <span id="clock"></span>
                                <!-- เหลือเวลาลงคะแนนโหวต 8.00 ชม. -->
                        </h3>
                        <!--<?php 
                            if ($vote_status) {
                                echo "<a href='sign-in.html' class='btn btn-common2'>เข้าสู่ระบบ/Sign In</a>";
                            } else {
                                echo "<a href='sign-in.html' class='btn btn-common2' disabled>เข้าสู่ระบบ/Sign In</a>";
                            }
                        ?>-->
                        <?php 
                            if (isset($_SESSION['std_id'])) { ?>

                        <?php } elseif (isset($_SESSION['admin_std_id'])) { ?> 

                        <?php } elseif ($vote_status) { ?>
                            <a href='sign-in.html' class='btn btn-common2'>เข้าสู่ระบบ/Sign In</a>
                            <?php } else { ?> 
                                <a href='sign-in.html' class='btn btn-common2' disabled>เข้าสู่ระบบ/Sign In</a>
                            <?php } 
                        ?>
                    </div>

                    <!-- <img src="images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="images/home/slider/house.png" class="slider-house" alt="slider image">
                    
                    <img src="images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image"> -->
                    <img src="images/home/slider/voteindex.png" class="slider-hill" alt="slider image">
                    <!-- <img src="images/home/slider/samo.png" class="slider-house" alt="slider image"> -->
                    
                    <!-- <img src="images/home/slider/samo3.png" width=500px; class="slider-sun" alt="slider image"> -->
                    <!-- <img src="images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="images/home/slider/43.png" class="slider-birds2" alt="slider image"> -->
                    <!-- <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image"> -->
                   
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section><br>
    <!--/#home-slider-->
    <center>                        
    <section id="">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">สถิติผู้เข้าร่วมลงคะแนนโหวต</h1>
                            <p class="title-desc">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
                        </center>       
    <!--/#action-->

    <section id="portfolio ">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h2 class="title"><i class="fas fa-user-friends"></i> จำนวนผู้มีสิทธิ <?php echo number_format($voter->votercount()); ?> คน</h2>
                </div>
                <div class="col-sm-4 text-center">
                    <h2 class="title"><i class="fas fa-user-check"></i> จำนวนผู้มาใช้สิทธิ <?php echo number_format($vote_data->votecount()); ?> คน</h2>
                </div>
                <div class="col-sm-4 text-center">
                    <h2 class="title"><i class="fas fa-percentage"></i> ร้อยละผู้มาใช้สิทธิ <?php echo number_format(($vote_data->votecount()/$voter->votercount())*100, 2);  ?></h2>
                </div>
            </div>

 
        </div>
    </section>
    <!--/#portfolio-->

    <section id="chart-vote-result">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title">ผู้มาใช้สิทธิแยกตามหลักสูตร</h2>
                    <canvas id="chart-vote-major" height="300" width="auto"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 text-center">
                    <h2 class="title">ผู้มาใช้สิทธิแยกตามชั้นปี</h2>
                    <canvas id="chart-vote-year" width="300" height="200"></canvas>
                </div>
                <div class="col-sm-6 text-center">
                    <h2 class="title">ผู้มาใช้สิทธิแยกตามเพศ</h2>
                    <canvas id="chart-vote-gender" width="300" height="200"></canvas>
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
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
    <script type="text/javascript" src="js/Chart.js"></script>
    <script>
        // get major_name
        var major_data = <?php echo $major->readall(); ?>;
        console.log(major_data);
        var major_id = [];
        var major_name = [];
        for (var i in major_data) {
            major_id.push(major_data[i].major_id);
            major_name.push(major_data[i].major_name);
        }
        
        // get number of voters by major
        var major_count = <?php echo $voter->votercountbymajor(); ?>;
        var mcount = [];
        var major_name_n = [];          // display major(s) having data only
        var pos = 0
        for (var i in major_count) {
            pos = major_id.indexOf(major_count[i].major_id);
            major_name_n.push(major_name[pos]);
            mcount.push(major_count[i].mcount);
        }
		console.log(major_count);

        var ctx = document.getElementById('chart-vote-major');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: major_name_n,
                datasets: [{
                    label: '# of Votes',
                    data: mcount,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(200, 14, 40, 0.2)',
                        'rgba(80, 250, 162, 0.2)',
                        'rgba(100, 199, 204, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(200, 14, 40, 1)',
                        'rgba(80, 250, 162, 1)',
                        'rgba(100, 199, 204, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        // get number of voters by year
        var year_count = <?php echo $voter->votercountbyyear(); ?>;
        var cyear = []
        var ycount = [];
        for (var i in year_count) {
            cyear.push('ชั้นปี ' + year_count[i].cyear);
            ycount.push(year_count[i].ycount);
        }
        var ctx = document.getElementById('chart-vote-year');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cyear,
                datasets: [{
                    label: '# of Votes',
                    data: ycount,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        // get number of voters by gender
        var gender_count = <?php echo $voter->votercountbygender(); ?>;
        var cgender = []
        var gcount = [];
        for (var i in gender_count) {
            if (gender_count[i].gender == 'M') {
                cgender.push('ชาย');
            } else {
                cgender.push('หญิง');
            }
            gcount.push(gender_count[i].gcount);
        }
        var ctx = document.getElementById('chart-vote-gender');
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: cgender,
                datasets: [{
                    label: "",
                    backgroundColor: ['pink', 'rgba(54, 162, 235, 1)'],
                    data: gcount
                }]
            },
            options: {}
        });
    </script>
        <script>
        var myVar = setInterval(function() {
            myTimer();
        }, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("clock").innerHTML = d.toLocaleTimeString();
        }
    </script>
</body>
</html>
