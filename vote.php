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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <style>
        li,
        input,
        .title,
        .title-desc,
        .btn,
        .button-choice,
        .modal-title,
        .modal-body {
            font-family: 'Prompt';
        }

        .fa-circle-o {
            color: yellow;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            font-size: 165px;
        }

        .scrollable-box {
            width: 100%;
            /* ปรับขนาดความกว้างตามต้องการ */
            max-height: 400px;
            /* กำหนดความสูงสูงสุด */
            overflow-y: auto;
            /* เพิ่ม Scrollbar ในแนวตั้งเมื่อข้อความเกิน */
            padding: 10px;
            /* เพิ่มระยะห่างภายในกล่อง */
            border: 1px solid #ccc;
            /* เส้นขอบกล่อง */
            border-radius: 8px;
            /* มุมกล่องโค้งมน */
            background-color: #f9f9f9;
            /* พื้นหลังกล่อง */
        }

        .scrollable-box::-webkit-scrollbar {
            width: 8px;
            /* ความกว้างของ Scrollbar */
        }

        .scrollable-box::-webkit-scrollbar-thumb {
            background: #888;
            /* สีของ Scrollbar */
            border-radius: 4px;
            /* มุมของ Scrollbar */
        }

        .scrollable-box::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* สีของ Scrollbar เมื่อ Hover */
        }

        .slider-container {
            margin-top: 20px;
            position: relative;
            width: 100%;
            /* max-width: 1000px; */
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slider img {
            width: 250px;
            height: auto;
            margin: 5px;
            border-radius: 5px;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 15px;
            /* เพิ่ม padding เพื่อให้ปุ่มใหญ่ขึ้น */
            cursor: pointer;
            z-index: 10;
        }

        .arrow.left {
            left: 0 px;
            /* ปรับให้ปุ่มไม่ซ้อนกับรูปภาพ */
        }

        .arrow.right {
            right: 0px;
            /* ปรับให้ปุ่มไม่ซ้อนกับรูปภาพ */
        }
    </style>
</head>

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

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 style="color :white" class="title">ลงคะแนนโหวต</h1>
                            <p style="color :yellow" class="title-desc" style="color:Red;">ขณะนี้เวลา <span
                                    id="clock"></span>
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
            <div class="row" style="padding=20px">
                <!-- name Samo -->
<<<<<<< HEAD
                <h1
                    style="background-color: #89287f; color: white; text-align: center; line-height: 1.5; padding: 10px; font-weight: bold; font-family: 'Roboto Slab', serif;">
=======
                <h1 style="background-color: #89287f; color: white; text-align: center; line-height: 1.5; padding: 10px; font-weight: bold; font-family: 'Roboto Slab', serif;">
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                    The Unity of Concord
                </h1>
                <div class="container">
                    <div class="row">
                        <!-- First Column: Logo -->
                        <div class="col-12 col-md-6">
<<<<<<< HEAD
                            <img src="images/Samo48/logo.png" style="width: 450px; height: 450px;" class="img-fluid"
                                alt="logo">
=======
                            <img src="images/Samo48/logo.png" style="width: 450px; height: 450px;" class="img-fluid" alt="logo">
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                        </div>

                        <!-- Second Column: Text Content -->
                        <div class="col-12 col-md-6">
                            <div class="text-box">
                                <!-- Dailog ข้อมูลพรรค -->
                                <div class="modal-body" style="padding-left: 10px;">
                                    <div align="left">
                                        <label style="font-size: 18px;">ความหมายสัญลักษณ์</label>
                                        <div class="scrollable-box">
<<<<<<< HEAD
                                            <p style="font-weight: bold;">The Unity Concord of FMS</p>
                                            <p>The Unity Concord of FMS &nbsp;:&nbsp;
=======
                                            <p style="font-weight: bold;">The Unity of Concord</p>
                                            <p>The Unity of Concord &nbsp;:&nbsp;
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                                                สะท้อนถึงความสำคัญของการรวมตัวเป็นหนึ่งเดียวกันในหมู่คณะเพื่อสร้างความร่วมมือที่มีประสิทธิภาพในการดำเนินกิจกรรมหรือโครงการต่างๆ
                                                เพื่อประโยชน์ส่วนรวม</p>
                                            Unity คือความสามัคคี
                                            ซึ่งหมายถึงความสัมพันธ์ที่ทุกคนในหมู่คณะมีเป้าหมายร่วมกันเพื่อประโยชน์ส่วนรวมและเป็นการรวมตัวของบุคคลที่มีความหลากหลาย
                                            แต่สามารถทำงานร่วมกันเพื่อบรรลุเป้าหมายที่วางไว้
                                            ซึ่งความสามัคคีเป็นรากฐานสำคัญของการสร้างความสำเร็จในงานต่างๆ</p>
<<<<<<< HEAD

                                            <p>Concord คือความปรองดอง
                                                ซึ่งเน้นไปที่การสร้างความสัมพันธ์ที่สงบสุขในหมู่คณะที่ทุกคนสามารถทำงานร่วมกันด้วยความเคารพให้เกียรติ
                                                และประณีประนอมซึ่งกันและกัน</p>

                                            <p>The Unity of Concord แสดงให้เห็นถึงความเป็นเอกภาพ ความร่วมมือ
                                                และความสัมพันธ์อันดีในหมู่คณะโดยส่งเสริมบรรยากาศการทำงาน
                                                สร้างสังคมแห่งการเรียนรู้ และพัฒนาเพื่อบรรลุเป้าหมายร่วมกัน ดังนั้น The
                                                Unity of
=======
                                            <p>The Unity of Concord แสดงให้เห็นถึงความเป็นเอกภาพ ความร่วมมือ
                                                และความสัมพันธ์อันดีในหมู่คณะโดยส่งเสริมบรรยากาศการทำงาน
                                                สร้างสังคมแห่งการเรียนรู้ และพัฒนาเพื่อบรรลุเป้าหมายร่วมกัน ดังนั้น The Unity of
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                                                Concord
                                                จึงเป็นหลักการพื้นฐานที่จะช่วยสร้างความสัมพันธ์อันดีและความสำเร็จในทุกด้านตัวเรือนั้นเกิดจากการผสมผสานระหว่างตัวอักษร
                                                F M และ S โดย </p>
                                            <p>F&nbsp;:&nbsp;ส่วนใบเรือจรดท้องเรือ ซึ่งใบเรือมีหน้าที่
<<<<<<< HEAD
                                                โอบอุ้มลมเพื่อขับเคลื่อนและนำพาเรือไปข้างหน้า
                                                เปรียบเสมือนพลังที่จะนำพาคณะวิทยาการจัดการไปข้างหน้าจนกระทั่งถึงจุดหมาย
                                            </p>
                                            <p>M&nbsp;:&nbsp;โครงสร้างกลางเรือ ซึ่งเป็นหัวใจสำคัญที่จะช่วยค้ำจุนเรือไว้
                                                เปรียบเสมือนความตั้งใจและมุ่งมั่นที่จะช่วยให้สมาชิกทุกคนยืนหยัดและก้าวไกลไปพร้อมกันด้วยความสามัคคี
                                            </p>
                                            <p>S&nbsp;:&nbsp;หัวสิงห์ สิงห์มักถูกใช้เป็นสัญลักษณ์ ของความเป็นผู้นำ
                                                ความกล้าหาญ
                                                และความแข็งแกร่ง
                                                โดยหัวสิงห์นั้นได้ชี้ไปยังทิศทางที่เรือกำลังมุ่งไปข้างหน้า
=======
                                                โดยอุ้มลมเพื่อขับเคลื่อนและนำพาเรือไปข้างหน้า
                                                เปรียบเสมือนพลังที่จะนำพาคณะวิทยาการจัดการไปข้างหน้าจนกระทั่งถึงจุดหมาย </p>
                                            <p>M&nbsp;:&nbsp;โครงสร้างกลางเรือ ซึ่งเป็นหัวใจสำคัญที่จะช่วยค้ำจุนเรือไว้
                                                เปรียบเสมือนความตั้งใจและมุ่งมั่นที่จะช่วยให้สมาชิกทุกคนยืนหยัดและก้าวไกลไปพร้อมกันด้วยความสามัคคี
                                            </p>
                                            <p>S&nbsp;:&nbsp;หัวสิงห์ สิงห์มักถูกใช้เป็นสัญลักษณ์ ของความเป็นผู้นำ ความกล้าหาญ
                                                และความแข็งแกร่ง โดยหัวสิงห์นั้นได้ชี้ไปยังทิศทางที่เรือกำลังมุ่งไปข้างหน้า
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                                                แสดงถึงวิสัยทัศน์และความเด็ดเดี่ยวที่พร้อมฟ่าฟันอุปสรรค ซึ่งดาว 9
                                                ดวงเปรียบเสมือน 9
                                                สาขาของคณะวิทยาการจัดการที่ลอยทำหน้าที่ส่องแสงชี้นำทางให้แก่สิงห์สำเภา
                                                และเรือสีม่วงแสดงให้เห็นถึงจิตวิญญาณของคณะวิทยาการจัดการที่มีความมั่นคง
                                                แข็งแกร่ง พร้อมเผชิญกับสถานการณ์ทุกรูปแบบ</p>

                                            <label style="font-size: 18px;">วิสัยทัศน์ของพรรค</label>
                                            <div style="font-size: 16px;">
                                                <p>สร้างสรรค์สิ่งใหม่บนรากฐานความหลากหลายที่มีเอกลักษณ์แตกต่างกันเพื่อก้าวสู่ความสำเร็จอย่างยั่งยืน
                                                </p>
                                            </div>

                                            <label style="font-size: 18px;">พันธกิจของพรรค</label>
                                            <div style="font-size: 16px;">
                                                <p>1.
                                                    บูรณาการเสริมสร้างองค์ความรู้และพัฒนาเพื่อยกระดับทักษะด้านวิชาชีพรวมถึงกิจกรรมต่างๆ
                                                </p>
                                                <p>2.
                                                    มุ่งเน้นการสร้างสังคมที่มีความเป็นหนึ่งเดียวจากความหลากหลายและการเคารพสิทธิเพื่อการอยู่ร่วมกันอย่างสันติ
                                                </p>
                                                <p>3.
                                                    เปิดโอกาสในการแสดงศักยภาพและความสามารถในทุกด้านเพื่อพัฒนาทรัพยากรบุคคลให้เกิดประโยชน์สูงสุด
                                                </p>
                                            </div>

                                            <label style="font-size: 18px;">นโยบายของพรรค</label>
                                            <div style="font-size: 16px;">
                                                <p>1.
                                                    ยกระดับโครงการเดิมและพัฒนาโครงการใหม่เพื่อปรับเปลี่ยนรูปแบบและแนวคิดให้ทีความเหมาะสมกับยุคสมัยมากยิ่งขึ้น
                                                </p>
                                                <p>2.
                                                    สร้างเครือข่ายชุมชนและองค์กรที่มุ่งเน้นความหลากหลายและการอยู่ร่วมกันอย่างสันติจัดกิจกรรมเสริมสร้างความเข้าใจในวัฒนธรรมที่หลากหลาย
                                                </p>
<<<<<<< HEAD
                                                <p>3.
                                                    ส่งเสริมกิจกรรมด้านกีฬาเพื่อเสริมสร้างสุขภาพและสร้างความสัมพันธ์ภายในคณะ
=======
                                                <p>3. ส่งเสริมกิจกรรมด้านกีฬาเพื่อเสริมสร้างสุขภาพและสร้างความสัมพันธ์ภายในคณะ
>>>>>>> 6494091dcd0e21dad11b3d2b0e39d3a52dfac0ff
                                                </p>
                                                <p>4.
                                                    สร้างพื้นที่ในการแสดงความคิดเห็นและข้อเสนอแนะเพื่อนำมาพัฒนาโครงการให้เกิดประโยชน์สูงสุดแก่นักศึกษา
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slider-container">
                <button class="arrow left" onclick="moveSlide(-1)">&#8249;</button>
                <div class="slider" id="slider">
                    <img src="images/Samo48/member/1.png" alt="member 1">
                    <img src="images/Samo48/member/2.png" alt="member 2">
                    <img src="images/Samo48/member/3.png" alt="member 3">
                    <img src="images/Samo48/member/4.png" alt="member 4">
                    <img src="images/Samo48/member/5.png" alt="member 5">
                    <img src="images/Samo48/member/6.png" alt="member 6">
                    <img src="images/Samo48/member/7.png" alt="member 7">
                    <img src="images/Samo48/member/8.jpg" alt="member 8">
                    <img src="images/Samo48/member/9.png" alt="member 9">
                    <img src="images/Samo48/member/10.png" alt="member 10">
                    <img src="images/Samo48/member/11.png" alt="member 11">
                    <img src="images/Samo48/member/12.png" alt="member 12">
                    <img src="images/Samo48/member/13.jpg" alt="member 13">
                    <img src="images/Samo48/member/14.jpg" alt="member 14">
                    <img src="images/Samo48/member/15.png" alt="member 15">
                    <img src="images/Samo48/member/16.png" alt="member 16">
                    <img src="images/Samo48/member/17.png" alt="member 17">
                    <img src="images/Samo48/member/18.png" alt="member 18">
                    <img src="images/Samo48/member/19.png" alt="member 19">
                    <img src="images/Samo48/member/20.png" alt="member 20">
                </div>
                <button class="arrow right" onclick="moveSlide(1)">&#8250;</button>
            </div>
        </div>
        <div class="vote">
            <!-- รูปที่ 1 -->
            <div class="col-sm-4 portfolio-item branded logos">
                <div class="portfolio-wrapper">
                    <div class="portfolio-single">
                        <div class="portfolio-thumb logo-image">
                            <img id="btn-vote-1-new" src="images/Samo48/vote/1.png" class="img-responsive" alt=""
                                onclick="toggleImage(this, 'images/Samo48/vote/1.png', 'images/Samo48/vote/1.2.png', '1')">
                        </div>
                    </div>
                </div>
            </div>

            <!-- รูปที่ 2 -->
            <div class="col-sm-4 portfolio-item mockup folio">
                <div class="portfolio-wrapper">
                    <div class="portfolio-single">
                        <div class="portfolio-thumb logo-image">
                            <img id="btn-vote-2-new" src="images/Samo48/vote/2.png" class="img-responsive" alt=""
                                onclick="toggleImage(this, 'images/Samo48/vote/2.png', 'images/Samo48/vote/2.2.png', '2')">
                        </div>
                    </div>
                </div>
            </div>


            <!-- รูปที่ 3 -->
            <div class="col-sm-4 portfolio-item mockup folio">
                <div class="portfolio-wrapper">
                    <div class="portfolio-single">
                        <div class="portfolio-thumb logo-image">
                            <img id="btn-vote-3-new" src="images/Samo48/vote/3.png" class="img-responsive" alt=""
                                onclick="toggleImage(this, 'images/Samo48/vote/3.png', 'images/Samo48/vote/3.2.png', '3')">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let selectedImage = null; // ตัวแปรสำหรับภาพที่เลือก
            let selectedVote = ""; // ID ของภาพที่เลือก

            // ฟังก์ชันสำหรับการเปลี่ยนแปลงรูปภาพ
            function toggleImage(element, defaultSrc, selectedSrc, voteId) {
                const submitButton = document.querySelector(".btn-submit");
                const txtVoteInput = document.getElementById("txt-vote");

                // หากคลิกซ้ำที่รูปภาพเดิม -> ยกเลิกการเลือก
                if (element.src.indexOf(selectedSrc) > -1) {
                    element.src = defaultSrc; // กลับไปยังรูปเดิม
                    selectedImage = null; // รีเซ็ตการเลือก
                    selectedVote = ""; // รีเซ็ตค่าโหวต
                    txtVoteInput.value = ""; // ลบค่าที่จะส่ง
                    submitButton.disabled = true; // ปิดปุ่ม
                    return;
                }

                // รีเซ็ตภาพก่อนหน้าถ้ามี
                if (selectedImage !== null) {
                    selectedImage.src = selectedImage.src.replace(".2.png", ".png");
                }

                // ตั้งค่ารูปใหม่ที่เลือก
                element.src = selectedSrc;
                selectedImage = element;
                selectedVote = voteId;
                txtVoteInput.value = selectedVote;


                // เปิดใช้งานปุ่มเมื่อมีการเลือกภาพที่ไม่ใช่ค่าเริ่มต้น
                if (selectedVote !== "") {
                    submitButton.disabled = false;
                }
            }
        </script>

        <style>
            .portfolio-thumb img {
                cursor: pointer;
                transition: opacity 0.3s ease;
            }
        </style>

        <section id="submit-vote">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-center">
                        <form id="submit-vote-form" name="submit-vote-form" method="post" action="vote_op.php"
                            onSubmit="return confirm('ยืนยันการลงคะแนนใช่หรือไม่')">
                            <input type="hidden" id="txt-vote" name="txt-vote">
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="ยืนยันการลงคะแนน"
                                    disabled>
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
            $("#btn-vote-1").click(function() {
                $('#check-candidate-1').show();
                $('#check-candidate-2').hide();
                $('#check-candidate-3').hide();
                $('#txt-vote').val("1");
                $('input[type="submit"]').prop("disabled", false);
            });
            $("#btn-vote-2").click(function() {
                $('#check-candidate-2').show();
                $('#check-candidate-1').hide();
                $('#check-candidate-3').hide();
                $('#txt-vote').val("2");
                $('input[type="submit"]').prop("disabled", false);
            });
            $('#select-none').click(function() {
                $('#check-candidate-3').show();
                $('#check-candidate-1').hide();
                $('#check-candidate-2').hide();
                $('#txt-vote').val("0");
                $('input[type="submit"]').prop("disabled", false);
            });
        </script>
        <script>
            let currentIndex = 0; // ตำแหน่งเริ่มต้น
            const slider = document.getElementById("slider");
            const images = slider.querySelectorAll("img");
            const totalImages = images.length;
            const imageWidth = 210; // ความกว้างรูปภาพรวม margin (200px + 10px)

            function moveSlide(direction) {
                // คำนวณตำแหน่งใหม่
                currentIndex += direction;

                // ตรวจสอบขอบเขต (loop ถ้าต้องการ)
                if (currentIndex < 0) {
                    currentIndex = 0; // หยุดที่รูปแรก
                } else if (currentIndex >= totalImages) {
                    currentIndex = totalImages - 1; // หยุดที่รูปสุดท้าย
                }

                // อัปเดตการเลื่อน
                slider.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
            }
        </script>
</body>

</html>