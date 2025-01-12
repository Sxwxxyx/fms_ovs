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
    <title>Vote | FMS Online Voting System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
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
    <link rel="stylesheet" href="css/vote-button.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <style>
        li, input, .title, .title-desc, .btn, .button-choice, .modal-title, .modal-body {font-family: 'Prompt';}
        .fa-circle-o {
            color: yellow; 
            top: 50%; 
            left: 50%; 
            position: absolute; 
            transform: translate(-50%, -50%);
            font-size: 165px;
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
                        <h1><img src="images/logo_fms.png" alt="logo"></h1>
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

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 style="color :white" class="title">ลงคะแนนโหวต/Cast Your Vote</h1>
                            <p  style="color :yellow" class="title-desc" style="color:Red;" >ขณะนี้เวลา 
                                <span id="clock"></span>
                                <!-- เหลือเวลาลงคะแนนโหวต 8.00 ชม. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <center><div class="textbox" ><br>
                    <h1 style="background-color : #cc99ff; color : white;" >The Journey of FMS</h1>
                </div></center>
                <div class="portfolio-items padding-top">
                    <div class="col-sm-12 portfolio-item branded logos">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-single">
                                <div class="portfolio-thumb logo-image">
                                    <img src="images\Samo47\Samo47_logo\The_Journey_of_FMS.png" width="700px" class="img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ข้อมูลพรรค -->
                    <div class="button-choice" align="center">
                        <button type="button" class="btn-1" data-toggle="modal" data-target="#exampleModalLong">
                        ข้อมูลพรรค
                        </button>
                        <button type="button" class="btn-1" data-toggle="modal" data-target="#exampleModal">
                        สมาชิกพรรค
                        </button>
                    </div>

                    <!-- Dailog ข้อมูลพรรค -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color : #cc99ff;" align="center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                        <h1 class="modal-title" id="exampleModalLongTitle" style="color : white;">นโยบายของพรรค</h1>
                                </div>
                                <div align="center">
                                    <img src="images\Samo47\Samo47_logo\The_Journey_of_FMS.png" width="250px" height="250px">
                                </div>
                                <div class="modal-body">
                                    <div align="left">
                                        <label style="font-size: 18px;">ความหมายสัญลักษณ์</label>
                                        <div style="font-size: 16px;">
                                            <p>The Journey of FMS</p>
                                            <p>Journey &nbsp;:&nbsp; การเดินทางที่จะมาพร้อมกับประสบการณ์ใหม่ๆ และมีจุดมุ่งหมายคือความสำเร็จที่เป็นจริงโดยทางพรรคได้ให้ความหมายย่อยของแต่ละตัวอักษร ดังต่อไปนี้</p>
                                            <p>J คือ Joy หมายถึง ความรู้สึกยินดีและมีความสุขที่จะเข้ามาพัฒนาคณะวิทยาการจัดการ</p>
                                            <p>O คือ Opportunity หมายถึง โอกาสที่ในการพัฒนาศักยภาพ</p>
                                            <p>U คือ Unique หมายถึง ความมีเอกลักษณ์เฉพาะตัว โดยการดึงเอกลักษณ์เฉพาะตัวของแต่ละบุคคลมาส่งเสริมและพัฒนา</p>
                                            <p>R คือ Relation หมายถึง การสร้างความสัมพันธ์ที่แข่งแกร่งของคนในพรรค รวมถึงการสร้างความสัมพันธ์ระหว่างนักศึกษาด้วยกันในคณะวิทยาการจัดการ</p>
                                            <p>N คือ New หมายถึง การเดินทางครั้งใหม่ที่มาพร้อมกับความมุ่งมั่นและตั้งใจ</p>
                                            <p>E คือ Equity หมายถึง การเสริมสร้างความเสมอภาคท่ามกลางความหลากหลาย</p>
                                            <p>Y คือ Yearning หมายถึง ความปรารถนา โดยมีจุดประสงค์และจุดมุ่งหมายที่แน่วแน่เพื่อจะทำให้เกิดความสำเร็จ</p>
                                            <p>FMS &nbsp;:&nbsp; เป็นตัวอักษรย่อของชื่อคณะวิทยาการจัดการในภาษาอังกฤษ โดยย่อมาจาก Faculty of Management Sciences</p>
                                            <p>๑. สิงห์สำเภาทอง : ความหลากหลายที่อยู่ภายใต้ความเสมอภาคเดียวกัน โดยแทนสัญลักษณ์ผ่านสีสันบนขนของสิงห์ที่ถึงแม้จะต่างสีกันแต่ก็เป็นความต่างที่มีความสวยงามและลงตัว</p> 
                                            <p>๒. แววตาของสิงห์ : ความมุ่งมั่นแน่วแน่ และตั้งใจที่จะนำพาลูกวิทยาการไปสู่ความสำเร็จ อีกทั้งยังสื่อถึงการมองการณ์ไกลเพื่อก้าวไปข้างหน้าอย่างมั่นคงและสง่างาม</p>
                                            <p>๓. ใบเรือ 3 ใบ : การรวมตัวของเหล่าลูกวิทยาการทั้งสามภาควิชาที่พร้อมจะกางใบล่องสู่โลกใบใหม่ที่เป็นจริงอย่างภาคภูม</p>
                                            <p>๔. เกลียวคลื่น : การเริ่มต้นของคลื่นลูกใหม่ที่เป็นตัวแทนของพวกเราพรรค The Journey of FMS ที่พร้อมจะผลักดันและนำพาทุกคนไปสู่เป้าหมายที่วางไว้ให้เป็นจริง</p>
                                            <p>๕. เมฆ : การมารวมตัวกันของสมาชิกในพรรค ดั่งการควบรวมของไอน้ำในอากาศก่อนที่จะกลายเป็นเมฆ โดยมีจุดมุ่งหมายจะพัฒนาคณะวิทยาการจัดการไปสู่ความสำเร็จ</p>
                                            <p>๖. ดวงอาทิตย์ : สัญลักษณ์แห่งแสงสว่างของรุ่งอรุณในการเดินทางครั้งใหม่ที่ใกล้สู่ความเป็นจริง</p>
                                            <p>๗. เพชรสีน้ำเงิน : ความแข็งเกร่ง สง่างาม กว้างขวางอย่างไม่มีที่สิ้นสุด ที่เปล่งแสงประกายนำพาทุกคนไปสู่ความสำเร็จ</p>
                                        </div>
                                        
                                        <label style="font-size: 18px;">วิสัยทัศน์ของพรรค</label>
                                        <div style="font-size: 16px;">
                                            <p>ก้าวสู่การเดินทางครั้งใหม่ เปิดรับประสบการณ์สู่ความสำเร็จที่เป็นจริง</p>
                                        </div>

                                        <label style="font-size: 18px;">พันธกิจของพรรค</label>
                                        <div style="font-size: 16px;">
                                            <p>1. สร้างสังคมแห่งความหลากหลาย สนับสนุนความเป็นเอกลักษณ์ผลักดันสู่ความเป็นหนึ่ง</p>
                                            <p>2. เปิดโอกาสให้นักศึกษาคณะวิทยาการจัดการให้สามารถมีส่วนร่วมในการสร้างสรรค์สังคมวิทยาการจัดการในอุดมคติให้เป็นรูปธรรม</p>
                                            <p>3. ส่งเสริมและพัฒนาศักยภาพ ทักษะความสามารถของนักศึกษาคณะวิทยาการจัดการ สู่ความเป็นเลิศในการด้านของวิชาการและกิจกรรม</p>
                                        </div>
                                        
                                        <label style="font-size: 18px;">นโยบายของพรรค</label>
                                        <div style="font-size: 16px;">
                                            <p>1. FMS News</p>
                                            <p>การกระจายข่าวสารและกิจกรรมที่น่าสนใจของคณะวิทยาการจัดการในรูปแบบที่เข้าถึงได้ง่ายขึ้น รวมถึงจะมีการเปิดให้ภาคส่วนต่างๆในคณะวิทยาการจัดการสามารถฝากประชาสัมพันธ์กิจกรรมต่างๆที่จะจัดขึ้นได้</p>
                                            <p>2. เปิดรับฟังความคิดเห็นและข้อเสนอแนะจากนักศึกษาในคณะวิทยาการจัดการ เพื่อนำมาพัฒนาและปรับปรุงการจัดกิจกรรมต่างๆให้ตอบโจทย์และเกิดประโยชน์กับนักศึกษาคณะวิทยาการจัดการให้ได้มากที่สุด</p>
                                            <p>3. สนับสนุนเรื่องความหลากหลายและความเสมอภาคที่เกิดขึ้นในคณะวิทยาการจัดการ</p>
                                            <p>4. สานต่อกิจกรรมและโครงการเดิม รวมถึงการพัฒนาและปรับเปลี่ยนรูปแบบให้มีความเหมาะสมกับยุคสมัยในปัจจุบันมากยิ่งขึ้น</p>
                                        </div>

 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color : #ff5757; color : white; font-size : 20px; width:100px; height:50px">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dailog สมาชิกพรรค -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content " >
                                <div class="modal-header" style="background-color : #cc99ff;" align="center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h1 class="modal-title" id="exampleModalLongTitle" style="color : white;">สมาชิกของพรรค</h1>
                                </div>
                                <div class="modal-body" align="center" style="font-size: 18px;">
                                    <div>
                                        <img src="images\Samo47\Samo47_member\KIRK.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>KIRK</p>
                                        <p>SARUNRAT THONGROEK</p>
                                        <p>ผู้ลงสมัครตำแหน่งนายกสโมสรนักศึกษา</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\FARIS.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>FARIS</p>
                                        <p>FARIS MIT-AREE</p>
                                        <p>ผู้ลงสมัครตำแหน่งอุปนายกกิจการภายใน</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\MDEE.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>MDEE</p>
                                        <p>BUNYARIT AUNRUANG</p>
                                        <p>ผู้ลงสมัครตำแหน่งอุปนายกกิจการภายนอก</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\FALAR.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>FALAR</p>
                                        <p>FADILAH BINTALEB</p>
                                        <p>ผู้ลงสมัครตำแหน่งเลขานุการ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\DONUT.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>DONUT</p>
                                        <p>NICHANAN NILSUWAN</p>
                                        <p>ผู้ลงสมัครตำแหน่งเหรัญญิก</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\AON.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>AON</p>
                                        <p>ARANRAT CHANKAEO</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายสวัสดิการ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\MILD.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>MILD</p>
                                        <p>SUTISA SAMUTJAIMANEE</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายประชาสัมพันธ์</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\KUK.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>KUK</p>
                                        <p>SATJAPORN INTHONG</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายประเมินผล</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\GUY.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>GUY</p>
                                        <p>KRIANGKAI PROMMA</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายวิชาการ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\CREAM.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>CREAM</p>
                                        <p>PANNICHA SRISAWANG</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายข้อมูลกิจกรรมนักศึกษา</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\KWANG.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>KWANG</p>
                                        <p>SUPHARAT KLANGNIAM</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายศิลปวัฒนธรรม</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\AU.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>AU</p>
                                        <p>ATTAPOL CHANGMAI</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายกีฬา</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\TOP.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>TOP</p>
                                        <p>YODSAWIT KHAOTHONG</p>
                                        <p>ผู้ลงสมัครตำแหน่งฝ่ายงานเทคโนโลยีสารสนเทศ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\TIWTER.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>TIWTER</p>
                                        <p>PAWIT SAEEIAK</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายพัสดุ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\USSAMAAN.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>USSAMAAN</p>
                                        <p>SIRAPHAT SALAE</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายสถานที่</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\CHELSEA.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>CHELSEA</p>
                                        <p>CHICHA PAIYASAT</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายสาธารณสุข</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\SYDIA.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>SYDIA</p>
                                        <p>LALITA PUTTIPAN</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายสันทนาการ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\SAI.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>SAI</p>
                                        <p>RAWIWAN SUWANCHATREE</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายจัดซื้อจัดจ้าง</p>
                                    </div>
                                    <br>
                                    <!-- <div>
                                        <img src="images/group/19.jpg" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>เอิง</p>
                                        <p>ปภาวรินทร์ ศรีทอง</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายกราฟิกและดีไซน์</p>
                                    </div>
                                    <br> -->
                                    <div>
                                        <img src="images\Samo47\Samo47_member\VIEW.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>VIEW</p>
                                        <p>SALINTIP CHOTCHOEY</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายพิธีการ</p>
                                    </div>
                                    <br>
                                    <div>
                                        <img src="images\Samo47\Samo47_member\WEE.png" class="img-fluid" style="max-width: 45%; max-height: 50%;" alt="">
                                        <p>WEE</p>
                                        <p>PARAWEE SOHWANG</p>
                                        <p>ผู้ลงสมัครตำแหน่งประธานฝ่ายกิจกรรม</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color : #ff5757; color : white; font-size : 20px; width:100px; height:50px">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 portfolio-item branded logos">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-single">
                                <div class="portfolio-thumb logo-image">
                                    <i class="fa fa-circle-o" id="check-candidate-1"></i>
                                    <img href="#"  id="btn-vote-1" src="images/candidate/1.png" class="img-responsive" alt="">
                                </div>
                            </div>
                            <div class="portfolio-info text-center">
           
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 portfolio-item mockup folio">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-single">
                                <div class="portfolio-thumb logo-image">
                                    <i class="fa fa-circle-o" id="check-candidate-2"></i>
                                    <img href="#" src="images/candidate/2.png" class="img-responsive"  id="btn-vote-2" alt="">
                                </div>
                            </div>
                            <div class="portfolio-info text-center">
               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 portfolio-item mockup folio">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-single">
                                <div class="portfolio-thumb logo-image">
                                    <i class="fa fa-circle-o" id="check-candidate-3"></i>
                                    <img href="#" src="images/candidate/3.png" class="img-responsive" id="select-none" alt="">
                                </div>
                            </div>
                            <div class="portfolio-info text-center">
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#portfolio-->

    <section id="submit-vote">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <form id="submit-vote-form" name="submit-vote-form" method="post" action="vote_op.php">
                        <input type="hidden" id="txt-vote" name="txt-vote">                   
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="ยืนยันการลงคะแนน">
                        </div>
                    </form>
                   
                </div>
                <div class="col-sm-4"></div>
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
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
        var myVar = setInterval(function() {
            myTimer();
        }, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("clock").innerHTML = d.toLocaleTimeString();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#check-candidate-1').hide();
            $('#check-candidate-2').hide();
            $('#check-candidate-3').hide();
            $('#txt-vote').val("");
            $('input[type="submit"]').prop("disabled", true);
        });
        $("#btn-vote-1").click(function(){
            $('#check-candidate-1').show();
            $('#check-candidate-2').hide();
            $('#check-candidate-3').hide();
            $('#txt-vote').val("1");
            $('input[type="submit"]').prop("disabled", false);
        });
        $("#btn-vote-2").click(function(){
            $('#check-candidate-2').show();
            $('#check-candidate-1').hide();
            $('#check-candidate-3').hide();
            $('#txt-vote').val("2");
            $('input[type="submit"]').prop("disabled", false);
        });
        $('#select-none').click(function(){
            $('#check-candidate-3').show();
            $('#check-candidate-1').hide();
            $('#check-candidate-2').hide();
            $('#txt-vote').val("0");
            $('input[type="submit"]').prop("disabled", false);
        });
    </script>
</body>
</html>
