<?php
include("connect.php");
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

  <!-- CSS styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/start.css">

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Treasure Quest</title>
</head>

<body>
  <div class="container">
    <audio id="player" autoplay loop>
      <source src="sounds/tre.mp3" type="audio/mp3">
    </audio>

    <div>
      <center>
        <div class="image-container">
          <img src="images/hangman/0.png" id="hangman" />
        </div>
      </center>
    </div>

    <div class="vertical-center">
      <center>
        <div id="guessed-word-div" class="v2">
          <div class="text-background">
            <span>
              <?= $blankWord ?>
            </span>
          </div>
        </div>

      </center>

      <center>
        <div id="lives-left-div" class="">
          Treasures left: <span id="lives-left">
            <?= $_SESSION['lives'] ?>
          </span>
        </div>
      </center>

      <div class="container-letter">
        <div id="letters">
          <div class="title">
            <h3> Choose a letter</h3>
          </div>
          <?php
          foreach (range('A', 'Z') as $char) {

            echo '<span class="letter button">' . $char . '</span>    ';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div id="play-again-div" class="display-none word1 many1 centerme">
    <center>
      <br>
      <div class="">
        <div id="the-word-was-div" class=""></div>
      </div>
      <h2>THANK YOU FOR PLAYING!</h2>
      <br>
      <h3><?php echo 'The word was: <b>' . $_SESSION['word'] . '</b>'; ?></h3>

<br>
<br>
      <form action="" method="POST">
        <input type="submit" name="end" value="Okay">
      </form>
    </center>
  </div>
  </div>

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>