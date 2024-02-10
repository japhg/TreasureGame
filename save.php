<?php

include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

if (isset($_POST['back'])) {

  $flips = $_SESSION['lives'];
  echo $flips;
  $playerto = $_SESSION["player_name1"];

  $query = "INSERT INTO data(name,score,datenow) VALUES ('$playerto','$flips','$datenow')";
  mysqli_query($link, $query);

}
?>
<!--  Modal ===============================================================================-->
<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"></button>
      <h4 class="modal-title">Playing Date :<br>
        <?php echo $datenow ?>
      </h4>
    </div>
    <form action="" method="POST"><br>
      <div class="modal-body">
        thanks for playing
      </div>

      <div class="modal-footer">
        <input type="submit" name="top10" id="top10" value="View Top 10" class="btn btn-info btn-lg"
          style="font-size:15;width:200px;height:50px">
        <input type="submit" name="back" value="Play" class="btn btn-info btn-lg"
          style="font-size:15;width:200px;height:50px" *>
      </div>
    </form>
  </div>
</div>