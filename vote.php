<!DOCTYPE html>
<html>
<head>

</head>
<body>
 <form action="action_page.php" method="post" id = "form">
  <p>A
  <input type="radio" name="A" value="Yes"> Yes
  <input type="radio" name="A" value="N/A" checked> N/A
  <input type="radio" name="A" value="No"> No<br><br>
  </p>
  
  <p>B
  <input type="radio" name="B" value="Yes"> Yes
  <input type="radio" name="B" value="N/A" checked> N/A
  <input type="radio" name="B" value="No"> No<br><br>
  </p>
  
  <p>C
  <input type="radio" name="C" value="Yes"> Yes
  <input type="radio" name="C" value="N/A" checked> N/A
  <input type="radio" name="C" value="No"> No<br><br>
  </p> 
  <p>D
  <input type="radio" name="D" value="Yes"> Yes
  <input type="radio" name="D" value="N/A" checked> N/A
  <input type="radio" name="D" value="No"> No<br><br>
  <input type="submit" id = "submit" onClick="SubForm()"></p>
</form> 

<style>
table {
    width:80%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>


<?php

$connection = mysqli_connect('localhost','root','123456','test');

if (!$connection){
    die("hehe" . mysqli_connect_error());
}
//mysql_select_db('test',$connection);

/* show tables */
$sql = "SELECT Options, Yes, NA, No FROM alphbet";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0){
  echo '<table>';
  echo '<tr><th>Options</th><th>Yes</th><th>N/A</th><th>No</th></tr>';
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';# code...
      
        echo "<td>".$row["Options"]."</td><td>".$row["Yes"]."</td><td>".$row["NA"]."</td><td>".$row["No"]."</td>";
      
    echo '</tr>';
  }
  echo '</table>';
}


?>
<!-- import jQuery library-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var form = $('#form'); // contact form
  var submit = $('#submit');  // submit button
  var alert = $('.alert'); // alert div for show alert message

  // form submit event
  form.on('submit', function(e) {
    e.preventDefault(); // prevent default form submit

    $.ajax({
      url: 'action_page.php', // form action url
      type: 'POST', // form submit method get/post
      data: form.serialize(), // serialize form data 
 
      success: function(data) {
        
        window.location.reload();
      },
 
    });
  });
});
</script>
</body>

</html>