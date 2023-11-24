<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/reset.css" />
    <!-- <link rel="stylesheet" href="../css/blog.css" /> -->
    <link rel="stylesheet" href="../css/skills.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300&family=Quicksand&family=Shantell+Sans&family=Tilt+Neon&family=Urbanist&display=swap"
      rel="stylesheet"
    />
    <title>Skills</title>
  </head>
  <body>
    <?php 
      include_once("./header.php");
    ?>
    <div class="wrapper">
      <div class="box">
        <div>
          <h1 id="skills">Skills</h1>
        </div>
      </div>
      <div class="skills">
        <ul>
          <li id="programming">
            Programming
            <ul class="sub">
              <li>Python</li>
              <li>Java</li>
              <li>HTML, CSS, and JavaScript</li>
              <li>SQL</li>
              <li>Assembly Language (MiPS)</li>
            </ul>
          </li>
          <li>Problem Solving and Critical Thinking</li>
          <li>Teamwork and Communication</li>
          <li>Project Management</li>
        </ul>
      </div>
      <div class="box">
        <div>
          <h1 id="education">Education</h1>
        </div>
      </div>

      <div class="education">
        <div id="UCGS">
          <div class="box">
            <h2>Upton Court Grammar School&emsp;&emsp;2020-2022</h2>
          </div>

          <h3>Subjects:</h3>
          <ul>
            <li>Maths ~ B</li>
            <li>History ~ B</li>
            <li>Computer Science ~ A*</li>
          </ul>
          <div class="logo">
            <img
              src="../images/UCGS_logo.png"
              alt="Upton Court Grammar School Logo"
            />
          </div>
        </div>
        <div id="QMUL">
          <div class="box">
            <h2>Queen Mary University of London&emsp;&emsp;2022-Present</h2>
          </div>
          <h3>School of Electronic Engineering and Computer Science</h3>
          <h4>BSc Computer Science</h4>
          <div class="box" id="schoolBox">
            <ul>
              <li>Procedural Programming</li>
              <li>Logic and Discrete Structures</li>
              <li>Computer Systems and Networks</li>
              <li>Professional Research and Practice</li>
            </ul>
            <ul>
              <li>Object Oriented Programming</li>
              <li>Automata and Formal Languages</li>
              <li>Fundamentals of Web Technology</li>
              <li>Information System Analysis</li>
            </ul>
          </div>
          <div class="logo">
            <img
              src="../images/qmulLogo.png"
              alt="Queen Mary University of London Logo"
            />
          </div>
        </div>
      </div>
    </div>

    <script>
      const programElem = document.querySelector("#programming");
      const sub = document.querySelector(".sub");

      programElem.addEventListener("mouseover", () => {
        sub.style.opacity = "1";
      });

      programElem.addEventListener("mouseout", () => {
        sub.style.opacity = "0";
      });

      // add transition to sub class
      sub.style.transition = "opacity 0.3s ease-in-out";
    </script>
  </body>
</html>
