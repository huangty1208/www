

<?php
  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["id"])){
  $id = "";
 
  }
  else{
  $id = $_POST["id"];
 
  }
  
  if (trim($id) ==""){
print <<<REGISTRATION_RESULT

<html>

<head>

<title> Delete Student Record </title>

<style>
.center {
    margin: auto;
    width: 40%;
}

.text{
text-align: right;
}

.mi{

    margin: 0 50%;

}
</style>
</head>


<body>

<center>

<h2> <br/>Delete Student Record </h2>

</center>


<br/>
<table class="center">

<form action = "deletecheck.php" method = "post">

<tr>
<td class="text"> Enter ID: </td>
<td class="text"> <input type = "text" name = "id" size = "30" /></td>
</tr>


<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input class = "mi" type = "submit" value = "Submit" /></td>
<td><input class = "mi" type = "reset" value = "Reset" /></td>
</tr>

</form>

</table>

<center>

<p>ID can not be empty </p>

</center>


</body>

</html>
REGISTRATION_RESULT;
  }

  
  else{
  
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

if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

// Get data from a table in the database and print it out

$table = "students";

// Add data to a table in the database

$stmt = mysqli_prepare ($connect, "DELETE FROM $table WHERE ID = $id ");
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);  
  
  
mysqli_close($connect);

print <<<REGISTRATION_RESULT
<html>

<head>

<title> Delete Student Record </title>

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

<center>

<h2> <br/>Delete Student Record </h2>

</center>


<br/>
<center>
<p>
Your deleted :<br/>
  ID = $id <br/>

Thank you for using <br/>
<br/>
<a href="menu.php">Go back to menu</a>
</p>
</center>
</body>

</html>
REGISTRATION_RESULT;

  
  }

?>

