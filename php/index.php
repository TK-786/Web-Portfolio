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
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/mobile.css" media="screen and (max-width:768px)">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300&family=Quicksand&family=Shantell+Sans&family=Tilt+Neon&family=Urbanist&display=swap"
      rel="stylesheet"
    />

    <title>Homepage</title>
  </head>
  <body>
    <?php
      include_once("../php/header.php");
    ?>
    <article>
      <hgroup>
        <h1>Welcome To My Portfolio!</h1>
        <img src="../images/TK logo2.png" alt="Tafsir Kamali logo" />
      </hgroup>
      <?php
        if(!isset($_SESSION["username"])){
          echo '
          <h2>Please login to continue</h2>
          <div id="buttons">
        <a href="../html/login.html">
          <button>Log in</button>
        </a>
        <a href="../html/register.html">
          <button>Register</button>
        </a>
      </div>';
        }
        else {
          require_once "./dbh.php";
          $sql = "SELECT firstName, lastName FROM users WHERE userID=?";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "s", $_SESSION["userID"]);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $row = mysqli_fetch_assoc($result);
          $usrnm = $row["firstName"];
          $_SESSION["firstname"] = $usrnm;
          $_SESSION["lastname"] = $row["lastName"];
          
          echo "<div class='welcome'>";
          echo "<h2>Welcome $usrnm</h2>";
          echo "</div>";
        }
      ?>

    </article>

    <footer>
      <section id="footSection">
        <a href="https://www.instagram.com/_tkamali/">
          <img src="../images/instagram.png" alt="" />
        </a>
        <a href="https://www.linkedin.com/in/tafsirkamali/">
          <img src="../images/linkedin-logo.png" alt="" />
        </a>

        <div id="email">
          <img src="../images/email.png" alt="" id="email" />
          <div class="sub">
            <p id="em1" >tafsirkamali@gmail.com</p>
          </div>
        </div>

        <a href="https://github.qmul.ac.uk/ec22621">
          <img src="../images/github-logo.png" alt="" />
        </a>
      </section>

      <script src="../javsScript/main.js" defer>
      </script>
    </footer>

    <noscript>
      <p>This page requires JavaScript to function properly. Please enable JavaScript in your browser.</p>
    </noscript>
  </body>
</html>
