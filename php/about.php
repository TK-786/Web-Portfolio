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
    <link rel="stylesheet" href="../css/about.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300&family=Quicksand&family=Shantell+Sans&family=Tilt+Neon&family=Urbanist&display=swap"
      rel="stylesheet"
    />
    <title>About me</title>
  </head>
  <body>
    <?php 
      include_once("./header.php");
    ?>
    <div class="wrapper">
      <article class="aboutMe" id="about">
        <div>
          <h1>ABOUT</h1>
          <!-- <hr /> -->
        </div>
      </article>
      <section id="about1">
        <figure>
          <img src="../images/tafsir.png.jpg" alt="" />
          <figcaption>
            <i>
              Student at Queen Mary University of London studying Computer
              Science
            </i>
          </figcaption>
        </figure>

        <br />
        <div id="aboutText">
          <p>
            I aspire to become an expert in the software engineering field. My
            passion for technology and problem-solving led me to pursue a career
            in software engineering, and to achieve this, I plan to complete my
            BSc Computer Science degree. I also plan to complete many different
            programming projects. Outside of work, I enjoy travelling, hiking,
            playing video games and football.
          </p>
          <br />
        </div>
      </section>

      <br />
      <br />
      <br />
      <br />
      <br />
      <div class="experience">
        <div>
          <h1>EXPERIENCE</h1>
        </div>
      </div>
      <br />
      <div id="exp1">
        <ul>
          <li>Vodafone Work Placement</li>
          <li>Vodafone Hackathon</li>
        </ul>
      </div>
    </div>
  </body>
</html>
