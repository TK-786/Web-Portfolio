<header>
  <nav id="navBox">
    <figure id="navFig">
      <a href="../php/index.php">
        <img src="../images/TK logo2.png" alt="Tafsir Kamali logo" />
      </a>
      <figcaption>
        <p>Tafsir Kamali</p>
      </figcaption>
    </figure>
    <ul id="navBoxList">
      <li><a href="../php/about.php#about">About me</a></li>
      <li><a href="../php/about.php#exp">Experience</a></li>
      <li><a href="../php/skills.php#skills">Skills</a></li>
      <li><a href="../php/skills.php#education">Education</a></li>
      <li><a href="../php/projects.php">Projects</a></li>
      <li><a href="../php/blog.php">Blog</a></li>
      <?php
        if(isset($_SESSION["username"])){
          echo '<li><a href="../php/logout.php">Log Out</a></li>';
        }
      ?>
    </ul>
  </nav>
</header>