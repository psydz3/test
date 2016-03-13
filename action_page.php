 

<?php

$connection = mysqli_connect('localhost','root','123456','test');

if (!$connection){
    die("hehe" . mysqli_connect_error());
}
//mysql_select_db('test',$connection);

/* show tables */


//$A = $B = $C = $D = "";	
foreach( $_POST as $k => $v ){

     //$A = ($_POST["A"]);
    
     if ($v == "N/A")
         $v = "NA";
      

     	 $sql = "SELECT $v FROM alphbet WHERE Options = '$k'";
        echo("<p>$sql</p>");

      $result = mysqli_query($connection, $sql);

     	if (mysqli_num_rows($result) <= 0){
        $sql = "INSERT INTO alphbet (Options, Yes, NA, No) VALUES ('$k', 0, 0, 0)";
        echo("<p>$sql</p>");

        mysqli_query($connection, $sql);
      }
  
  		$row = mysqli_fetch_assoc($result);
    	$value = (int)$row[$v] + 1;
    	 
        $sql = "UPDATE alphbet SET $v = $value WHERE Options = '$k'";
         echo("<p>$sql</p>");

    	mysqli_query($connection, $sql);
		  
     }
   
   
  
?>