<?php
include("connect.php");
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

if (isset($_POST['top10'])) {
  header("location:top.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/title.css">

  <title>Treasure Quest</title>
</head>

<body style="background-image: url(bg.jpg); background-size: 100% 105% ; background-repeat: no-repeat;">
  <audio id="player" autoplay loop>
    <source src="sounds/tre1.mp3" type="audio/mp3">
  </audio>

  <div id="hangman-div">
    <form action="controller.php" method="POST">
      <input type="hidden" name="action" value="1" />
      <br><br><br><br><br><br><br>
      <img src="images/logo1.png" id="logo" />

      <div class="center">
        <div id="levels-div">
          <span id="level">
            <input type="radio" name="level" checked="checked" id="level_0" value="0">
            <input type="radio" name="level" id="level_1" value="1">
            <input type="radio" name="level" id="level_2" value="2">
          </span>
        </div>
        <br>
        <br>
        <div class="form-group select-container">
          <h1>
            <label style="color:Black;height:45px;width:60%;font-size:35"> Select Player </label>
          </h1>
          <br>
          <select class="form-group select-user" name="user" placeholder="Select" onchange="blur_key()"> ';
            <?php
            echo '<option></option> ';
            $querypro = "SELECT * FROM book1 where played != '1' order by user ASC ";
            $resultpro = mysqli_query($link, $querypro);
            while ($rowpro = mysqli_fetch_array($resultpro)) {
              echo '<option  value="' . $rowpro[0] . '">' . $rowpro[9] . ' </option>';
            }
            ?>
          </select>
        </div>
        <br>
        <br>
        <div>
          <input type="submit" name="play" value="PLAY" id="submit-button" /> <br><br>
        </div>
      </div>
    </form>
    <form action="" method="POST">
      <input type="submit" name="top10" id="top10" value="VIEW TOP 10" class="btn btn-info btn-lg"
        style="font-size:15;width:200px;height:50px">
    </form>
  </div>
</body>

</html>

<script type="text/javascript">
  document.getElementById("submit-button").disabled = true;
  document.getElementById("level_0").style.display = "none";
  document.getElementById("level_1").style.display = "none";
  document.getElementById("level_2").style.display = "none";

  //on keyup
  function blur_key() {
    document.getElementById("submit-button").disabled = false;
  }
</script>