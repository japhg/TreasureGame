<?php

include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");






if (isset($_POST['play'])) {


    $user = $_POST['user'];
    echo $user;
    $_SESSION["data"] = $user;
    if (strlen($user) == 0) {


        echo '<div class = "how1"><div class = "many centerme"><br> 
  <center>
    <h1> No Selected Player </h1> <br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
   </center> 
  </div></div>';
    } else {
        //$user = $_POST['user'];

        mysql_query("UPDATE  book1
         sET
         
         played = '1'
         WHERE
         id = '$user'
         ");



        $resulto = mysql_query("SELECT * FROM book1 where id='$user' ");
        while ($rowo = mysql_fetch_array($resulto)) {
            $player_name = strtoupper($rowo[9]);
            echo $player_name;
            $_SESSION["player_name1"] = $player_name;
        }




        // header("location:https://www.test.pcnpromopro.com/index.php");
        //header("location:record.php");
    }
}




if (isset($_GET['action']))
    $action = $_GET['action'];
elseif (isset($_POST['action']))
    $action = $_POST['action'];
else
    $action = 0;

switch ($action) {
    case 0: // Title
        $levels = array(
            '0' => 'Easy game: you are allowed 10 misses.',
            '1' => 'Medium game: you are allowed 5 misses.',
            '2' => 'Hard game: you are allowed 3 misses.'
        );

        require 'title.php';



        break;



    case 1: // Start
        $lines = file('dictionary.txt');
        $word = $lines[rand(0, count($lines) - 1)];
        $word = substr($word, 0, strlen($word) - 1);

        $_SESSION['word'] = trim($word);
        $_SESSION['foundLetters'] = '';
        $_SESSION['win'] = null;

        $level = 0;
        if (isset($_POST['level']))
            $level = $_POST['level'];
        $_SESSION['level'] = $level;

        switch ($level) {
            case 0: // Easy
                $_SESSION['lives'] = 10;
                break;
            case 1: // Medium
                $_SESSION['lives'] = 5;
                break;
            case 2: // Hard
                $_SESSION['lives'] = 3;
                break;
        }

        $_SESSION['image'] = 0;

        $blankWord = '';
        for ($i = 0; $i < strlen($word); $i++) {
            $blankWord .= (substr($word, $i, 1) != ' ' ? '<span class="guessed-letter">_</span>' : ' ');
        }

        require 'start.php';







        break;


    case 2: // Called via AJAX

        $response = array();




        if ($_SESSION['win'] == null) {
            $letter = strtolower($_POST['letter']);

            if (strpos(strtolower($_SESSION['word']), $letter) === false) {

                $_SESSION['lives'] -= 1;
                switch ($_SESSION['level']) {
                    case 0:
                        $_SESSION['image'] += 1;
                        break;
                    case 1:
                        $_SESSION['image'] += 2;
                        break;
                    case 2:
                        if ($_SESSION['image'] == 0)
                            $_SESSION['image'] = 3;
                        elseif ($_SESSION['image'] == 3)
                            $_SESSION['image'] = 6;
                        else
                            $_SESSION['image'] = 10;

                        break;
                }



                $response['image'] = 'images/hangman/' . $_SESSION['image'] . '.png';



                if ($_SESSION['lives'] === 0) {
                    echo 'thanks for playing';
                    $_SESSION['win'] = false;
                    $response['word'] = 'The word was: <b>' . $_SESSION['word'] . '</b>';



                }




            } else {


                $_SESSION['foundLetters'] .= $letter;

                $i = 0;
                $wordLetters = str_split($_SESSION['word']);
                $foundLetters = str_split($_SESSION['foundLetters']);
                foreach ($wordLetters as $letter) {
                    $found = false;

                    foreach ($foundLetters as $letter2) {
                        if (strtolower($letter) == strtolower($letter2)) {
                            $found = true;
                            break;
                        }
                    }

                    if ($found)
                        $i++;
                }
                if ($i == strlen($_SESSION['word']) - substr_count($_SESSION['word'], ' '))
                    $_SESSION['win'] = true;



            }




        }




        $wordLetters = str_split($_SESSION['word']);
        $foundLetters = str_split($_SESSION['foundLetters']);
        $guessedWord = '';

        foreach ($wordLetters as $letter) {
            $found = false;

            foreach ($foundLetters as $letter2) {
                if (strtolower($letter) == strtolower($letter2)) {
                    $found = true;

                    break;
                }
            }

            if ($found)
                $guessedWord .= $letter;
            elseif ($letter != ' ')
                $guessedWord .= '<span class="guessed-letter">_</span>';
            else
                $guessedWord .= ' ';
        }



        $response['win'] = $_SESSION['win'];
        $response['lives'] = $_SESSION['lives'];
        $response['guessedWord'] = $guessedWord;


        echo json_encode($response);





        break;


}



?>