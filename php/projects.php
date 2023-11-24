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
    <link rel="stylesheet" href="../css/project.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Golos+Text&family=IBM+Plex+Mono:wght@300&family=Quicksand&family=Shantell+Sans&family=Silkscreen&family=Tilt+Neon&family=Urbanist&display=swap"
      rel="stylesheet"
    />

    <title>Projects</title>
  </head>
  <body>
    <?php 
      include_once("./header.php");
    ?>

    <article>
      <div id="title">
        <hr />
        <h1>Projects</h1>
        <hr />
      </div>

      <div class="projects">
        <aside>
          <h2>Dice Game</h2>
          <p>
            As I was learning Python, I decided to begin a project to test what
            I had learnt. It was a simple, beginner project. A dice game with
            two users, and the aim of the game was to accumulate the highest
            score in a set number of rounds.
          </p>
          <p>
            Despite not having any GUI (the game being played through the
            terminal), it is something I am very proud of since it kindled my
            enthusiasm for Computer Science. The process of developing the game
            required lots of patience and problem solving to achieve the end
            result.
          </p>
        </aside>
        <aside>
          <h2>Quiz Game</h2>
          <p>
            After learning the fundamentals of Java, I begun a project to put my
            capabilities to the test. The project's aim was to create a quiz
            game in Java with any number of players and any amounts of
            questions. The project consisted of the use of external files, which
            is where the high scores of the players were scored.
          </p>
        </aside>
        <aside>
          <h2>Pong Game</h2>
          <p>
            Feeling confident, I undertook another Python game project, but this
            time with the use of a Graphical User Interface. The game I intended
            to recreate was the classic Pong game, which was one of the first
            ever computer video games created. Using the python module PyGame, I
            was able to create a GUI, and thus allowed me to create the game.
            The user had the option to play against a computer or to play with a
            friend. I began to use object oriented constructs.
          </p>
          <figure>
            <img src="../images/pong.png" alt="Pong Game" />
            <!--insert image-->
            <figcaption>Pong Game</figcaption>
          </figure>
        </aside>
        <aside>
          <h2>Snake Game</h2>
          <p>
            After having fully learnt Object Oriented techniques, I wanted to
            apply this in the game development field. I set about creating
            another game in Python using PyGame and the game I intended to
            create was Snake, where the aim of the game was to eat the food to
            gain points whilst making the snake grow bigger and thus making the
            game harder.
          </p>
          <figure>
            <img src="../images/snake.png" alt="Snake Game" />
            <figcaption>Snake Game</figcaption>
          </figure>
        </aside>
      </div>
    </article>
  </body>
</html>
