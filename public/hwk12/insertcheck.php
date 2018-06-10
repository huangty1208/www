

<?php
  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["id"])|| !isset($_POST["last"])|| !isset($_POST["first"])|| !isset($_POST["gpa"])|| !isset($_POST["major"])){
  $id = "";
  $last = "";  
  $first = "";
  $gpa = ""; 
  $major = "";  
  }
  else{
  $id = $_POST["id"];
  $major = $_POST["major"];  
  $first = $_POST["first"];
  $last = $_POST["last"]; 
  $gpa = $_POST["gpa"];  
  }
  
  if (trim($id) =="" || trim($last) =="" || trim($first) =="" || trim($gpa) =="" || trim($major) ==""){
print <<<REGISTRATION_RESULT

<html>

<head>

<title> Insert Student Record </title>

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

<h2> <br/>Insert Student Record </h2>

</center>


<br/>
<table class="center">

<form action = "insertcheck.php" method = "post">

<tr>
<td> Enter ID: </td>
<td> <input type = "text" name = "id" size = "30" /></td>
</tr>

<tr>
<td> Enter LAST: </td>
<td> <input type = "text" name = "last" size = "30" /></td>
</tr>

<tr>
<td> Enter FIRST: </td>
<td> <input type = "text" name = "first" size = "30" /></td>
</tr>

<tr>
<td> Enter MAJOR: </td>
<td> <input type = "text" name = "major" size = "30" /></td>
</tr>

<tr>
<td> Enter GPA: </td>
<td> <input type = "text" name = "gpa" size = "30" /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> All the fields have to be filled! </td>
</tr>


<tr>
<td><input class = "mi" type = "submit" value = "Submit" /></td>
<td><input class = "mi" type = "reset" value = "Reset" /></td>
</tr>

</form>

</table>




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

$stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param ($stmt, 'sssss', $id, $last, $first, $major, $gpa);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);  
  
  
mysqli_close($connect);

print <<<REGISTRATION_RESULT
<html>

<head>

<title> Insert Student Record </title>

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

<h2> <br/>Insert Student Record </h2>

</center>


<br/>
<center>
<p>
Your input :<br/>
  ID = $id <br/>
  LAST = $last   <br/>
  FIRST = $first <br/>
  GPA = $gpa  <br/>
  MAJOR = $major <br/>
have been inserted <br/>  
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

