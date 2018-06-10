

<?php


  function purge ($str)
  {
    $purged_str = preg_replace("/\W/", "", $str);
    return $purged_str;
  }

  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["username"])|| !isset($_POST["item"])){
  $name = "";
  $item = "";  
 
  }
  else{
  $name = purge($_POST["username"]);
  $item = purge($_POST["item"]);  
  }
  

// read password stored on the server
$file = fopen("/u/huangty/psw.txt","r");
$line = fgets($file);
$line = trim($line);
fclose($file);

// Connect to the MySQL database
$host = "fall-2015.cs.utexas.edu";
$user = "huangty";
$pwd = $line;
$dbs = "cs329e_huangty";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$name = mysqli_real_escape_string ($connect, $name);
$item = mysqli_real_escape_string ($connect, $item);


if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

$table = "Dinner";


// Add data to a table in the database

$stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?)");
mysqli_stmt_bind_param ($stmt, 'ss', $name, $item);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);  
  
  
mysqli_close($connect);

print <<<REGISTRATION_RESULT
<html>

<head>

<title> Signup complete </title>

<style>
.center {
    margin: auto;
    width: 50%;
}

.text{
text-align: center;
}

.mi{

    margin: 0 40%;

}
</style>
</head>


<body>

<br/>
<center>
<p>

Successfully signned up<br/>  
Thank you for using <br/>
<br/>
<a href="dinner.php">Go back</a>
</p>

</center>
</body>

</html>
REGISTRATION_RESULT;

  


?>

