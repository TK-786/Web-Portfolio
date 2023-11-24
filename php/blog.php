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
    <link rel="stylesheet" href="../css/blog.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text&family=IBM+Plex+Mono:wght@300&family=Poiret+One&family=Quicksand&family=Shantell+Sans&family=Silkscreen&family=Tilt+Neon&family=Urbanist&display=swap" rel="stylesheet">
    <title>Blog</title>
    <script src="../javsScript/blog.js" defer></script>
  </head>
  <body id="blgBody">
    <?php 
      include_once("./header.php");
    ?>
    <?php
      if(isset($_SESSION["username"])){
        echo '<div class="addPost">
      <form action="../php/addPost.php" id="blogForm" method="post">
        <legend>Add Blog</legend>
        <div class="inputBox">
          <input name="Title" type="text" required />
          <span>Title:</span>
          <div class="required"></div>
        </div>
        <br />
        <div class="inputBox">
          <textarea
            name="post"
            id="post"
            cols="30"
            rows="10"
            placeholder="Enter your text here:"
          ></textarea>
          <div class="required"></div>
        </div>
                
        <div class="btns">
          <input type="submit" name="submit" value="Post" />
          <input type="reset" name="" id="" value="Clear" />
        </div>
      </form>
    </div>';
      }
    ?>

    <div class="monthForm">
      <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="dropdown">
        <select name="months">
          <option selected>All</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <input type="submit" name="month" id="monthBtn" value="View Blog">
      </form>
    </div>

    <?php
      include("./viewBlog.php");
    
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $value = $_POST["months"];
        if ($value === "All"){
          writeAll();
        }
        else{
          writeMonths($value);
        }
      }
    ?>

    <noscript>
      <p>This page requires JavaScript to function properly. Please enable JavaScript in your browser.</p>
    </noscript>
  </body>
</html>