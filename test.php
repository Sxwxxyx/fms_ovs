<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Journey of FMS</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      text-align: center;
      background-color: #f9f9f9;
    }

    .header {
      background-color: #2e2e2e;
      color: white;
      padding: 10px 0;
      font-size: 18px;
    }

    .content {
      margin: 20px auto;
      width: 80%;
      max-width: 1200px;
    }

    .text-box {
      width: 100%;
      max-width: 600px;
      height: 200px;
      margin: 20px auto;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      overflow-y: scroll;
      text-align: left;
      background-color: #fff;
    }

    .slider-container {
      margin-top: 20px;
      position: relative;
      width: 100%;
      max-width: 800px;
      overflow: hidden;
    }

    .slider {
      display: flex;
      flex-direction: row-reverse; /* จัดเรียงไปด้านขวา */
      transition: transform 0.5s ease-in-out;
    }

    .slider img {
      width: 200px;
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
      padding: 10px;
      cursor: pointer;
    }

    .arrow.left {
      left: 10px;
    }

    .arrow.right {
      right: 10px;
    }
  </style>
</head>
<body>
  <div class="header">
    หน้าแรก | <a href="#" style="color: white;">login</a>
  </div>

  <div class="content">
    <h1>The Journey of FMS</h1>
    <div class="text-box">
      <p>ความหมายของสัญลักษณ์ The Journey of FMS</p>
      <p>Journey: การเดินทางที่จะมาพร้อมกับประสบการณ์ใหม่ๆ...</p>
      <p>J คือ Joy: หมายถึง...</p>
      <!-- ใส่ข้อความเพิ่มได้ตามต้องการ -->
    </div>

    <div class="slider-container">
      <button class="arrow left" onclick="moveSlide(-1)">&#8249;</button>
      <div class="slider" id="slider">
        <img src="image1.jpg" alt="Image 1">
        <img src="image2.jpg" alt="Image 2">
        <img src="image3.jpg" alt="Image 3">
        <img src="image4.jpg" alt="Image 4">
      </div>
      <button class="arrow right" onclick="moveSlide(1)">&#8250;</button>
    </div>
  </div>

  <script>
    let currentIndex = 0;

    function moveSlide(direction) {
      const slider = document.getElementById("slider");
      const images = slider.querySelectorAll("img");
      const totalImages = images.length;

      currentIndex -= direction; // เปลี่ยนทิศทางให้เลื่อนขวา
      if (currentIndex < 0) {
        currentIndex = totalImages - 1;
      } else if (currentIndex >= totalImages) {
        currentIndex = 0;
      }

      slider.style.transform = `translateX(${currentIndex * 210}px)`; // ปรับการเลื่อนไปทางขวา
    }
  </script>
</body>
</html>
