


<?php

include("connect.php");

date_default_timezone_set('Asia/Hong_Kong');
$datenow=date("m/d/Y h:i:s A");


 

?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    
    .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 15px 15px 15px 15px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;


}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '>';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;

}

.w2
{


bottom: 80px;
right: 20%;
border: 0px solid tomato;
border-radius: 2%;
align-content:center;

}

.treasures
{
position:absolute;
top: 5%;
left: 50%;
border: 0px solid tomato;
border-radius: 2%;
}

.lives
{
position:sticky;
top: 20%;
left: 60%;
padding: 1px 5px 1px 1px;
border: 0px solid tomato;
border-radius: 2%;
font-size: 3vw;



}

.word
{
position:absolute;
top: 20%;
left: 44%;
border: 0px solid tomato;
border-radius: 2%;
box-sizing: border-box;

}

.word1
{
position:absolute;
top: 500px;
left: 30%;
border: 0px solid tomato;
border-radius: 2%;

}
.word1a
{
position:absolute;
top: 290px;
right: 48%;
border: 0px solid tomato;
border-radius: 2%;
font-size: 2vw;
}


body {

  overflow-y: hidden;
  overflow-x: hidden;
}



.vertical-center {
  margin: 0;
  position: absolute;
  top: 52%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 50%;
-ms-transform: translatex(-50%);
  transform: translatex(-50%);

  
}


.v1 {

  position: absolute;
  bottom: 105%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 45%;
-ms-transform: translatex(-50%);
  transform: translatex(-50%);
  
}


.centermeUP {
  margin: 0;
  position: absolute;
  top: 10%;
  left: 50%;
  width: 90%;
  height: 18%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.centerme {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.centerme1 {
    z-index: 3;
    height: 50%;
    width: 50%;
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);

}
.many1 
{

  z-index: 3;
  height:50%;
  width: 60%;
  border: 2px inset Blue;
  opacity: 1;
  border-radius: 10px;
  box-shadow: 0px 5px 10px 5px #000000;
  font-family: Arial; 
  font-size: 25;
 background: #cc9900;
 }
 .howx
{
  position:absolute;
     z-index: 0;
  background: tomato;
  background-size: 100% 100%;
 top:0;
  height: 100%;
  width: 100%;
}


body {
  
  background-image: url(images/bg.png);

  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center; 
    background-size: 99% 99%;

}

.modal-content {
  background:url('red.png');
}


input[type=button], input[type=submit], input[type=reset] {
  background-color: #392613;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  width: 200px;
  border-radius: 10px;
}

 input:hover[type="submit"] {
  font-weight: 900;
  
     background: #996633;
}













</style>

        <title>Treasure Quest</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body >


    <audio id="player" autoplay loop>
    <source src="sounds/tre.mp3" type="audio/mp3">
</audio>

        <div id="hangman-div2">
        <div class="row">
           
        <div class="">
         
                          



          
           <div class="vertical-center">

              <center>
                <div id="lives-left-div" class="lives" style="">
                    Treasures left: <span id="lives-left"> <?= $_SESSION['lives'] ?> </span> 
                </div>
              </center>
                 
               <h3> Choose a letter: </h3>
               
                <div id="letters">
                    <?php
                    foreach (range('A', 'Z') as $char) {
                      
                        echo '<span class="letter button">' . $char . '</span>    ';
                    }
                    ?>
                    
                    <div class="clear"></div>
                  
                </div>
              
               
              
                  </div>
            </div>
            
          
            <div class="v1">
          
            <img src="images/hangman/0.png" id="hangman" alt="hangman"/>

            
            </div>
           
            </div>
            
            
            <div>

            <!--THE WORD IN BLANK-->
            
                <div id="guessed-word-div" class="word">
                    <?= $blankWord ?>

                </div>
           
               
        
              <div id="play-again-div" class="display-none word1 many1 centerme">
   <center><br>
               <div class="">
                     <div id="the-word-was-div" class=""></div>
                </div>
 
  
  <h3> THANK YOU FOR PLAYING !</h3>
        <form action = "" method = "POST">
    <input type = "submit" name = "end"  value = "Okay" ></form>
     

 </center>
 </div> 
                  
                       
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
    
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/script.js"></script> 
    </body>
</html>


