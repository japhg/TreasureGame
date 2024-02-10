

<?php
include("connect.php");
    session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php


if(isset($_POST['next_all'])){
mysql_query("UPDATE book1  SET  played=''");
echo "reset all to 0 done !";
}


if(isset($_POST['next_99'])){


	$id_no = $_POST['user_no'];





mysql_query("UPDATE book1  SET  played='0' where id= '$id_no'");
echo "reset 0 done !";
}

?>



<?php

Echo '
 
  
<form action = "" method = "POST">
           <select class="form-control cbo" name="user_no" value= "" data-placeholder="User" style= "height:45px;width:40%" > ;      
                                                           
                                                           ';
                                                           echo '<option></option>';
                                                          $results =mysql_query("SELECT * FROM book1");
                                                                        while($rows=mysql_fetch_array($results))
                                                                    {
                                                                       echo '<option value="'.$rows[0].'">'.$rows[9]."-".$rows[17].'</option>';
                                                                     }
                                                                  echo '          
                                                           </select>
                                                  







  ';
                                                                                      
?>



<input type = "submit" name = "next_99" value = "Transact" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">


<input type = "submit" name = "next_all" value = "Reset All" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">

 </form>





</body>
</html>