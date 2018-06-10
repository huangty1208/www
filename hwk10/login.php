<?php
  # get the incoming information
  extract ($_POST);
  $list2 = array("8"=>"","9"=>"","10"=>"","11"=>"","12"=>"","1"=>"","2"=>"","3"=>"","4"=>"","5"=>"");
  $ind = 0;

  print <<<REGISTRATION_RESULT
  <html>
  <head>
  <title> Registration Form </title>
  <link rel = "stylesheet" type = "text/css"
	 href = "login.css" media = "all" />
  </head>
  <body>
  <center>
  <h2> Sign-Up Sheet </h2>
  </center>
  <form action = "login.php" method = "post">
  <table align = "center" border = "2">
  <tr><th> Time </th><th> Name </th></tr>
REGISTRATION_RESULT;

  # save the input value
  foreach($_POST as $x => $x_value) {
    if( trim($x_value) != ""){
      $list2[substr($x, 2)] = trim($x_value);    
    }
  }   

  $myfile = fopen("signup.txt", "r");
  // Output one line until end-of-file
  foreach($list2 as $x => $x_value) {
    $tt = fgets($myfile);    
    if(trim($tt) != ""){
      $list2[$x] = trim($tt);
    }
  }
  fclose($myfile);

  $myfile = fopen("signup.txt", "w");

  foreach($list2 as $x => $x_value) {
    fwrite($myfile, $x_value."\n");

    if( $x_value != ""){
      echo "<tr><td> $x:00 am </td><td>$x_value</td></tr>";
    }
    else{
      echo "<tr><td> $x:00 am </td><td><input type = 'text' name = un$x size = '30' /></td></tr>";
    }
  }  

  fclose($myfile);

  print <<<REGISTRATION
</table>

<table align = "center">
<tr>
<td><input type = "reset" value = "Reset" /></td>
<td><input type = "submit" value = "Submit" /></td>
</tr>
</table>
</form>

</body>
</html>

REGISTRATION;

?>