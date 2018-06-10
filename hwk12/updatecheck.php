

<?php
  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["id"])){
  $id = "";
  $last = "";  
  $first = "";
  $gpa = ""; 
  $major = "";  

  }
  else{
  $id = trim($_POST["id"]);
  
  if(!isset($_POST["major"])){	  
    $major = ""; 
  }
  else{
    $major = trim($_POST["major"]); 
  }	 

  if(!isset($_POST["last"])){	  
    $last = ""; 
  }
  else{
    $last = trim($_POST["last"]); 
  }	

  if(!isset($_POST["first"])){	  
    $first = ""; 
  }
  else{
    $first = trim($_POST["first"]); 
  }	

  if(!isset($_POST["gpa"])){	  
    $gpa = ""; 
  }
  else{
    $gpa = trim($_POST["gpa"]); 
  }	  
    
  }
  
  if (trim($id) =="" || trim($last) =="" && trim($first) =="" && trim($gpa) =="" && trim($major) ==""){
print <<<REGISTRATION_RESULT

<html>

<head>

<title> Update Student Record </title>

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

<h2> <br/>Update Student Record </h2>

</center>


<br/>
<table class="center">

<form action = "updatecheck.php" method = "post">

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
<td> &nbsp; </td> <td> ID and at least one of the field has to be filled!  </td>
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


$a=", last = ";
$b=", first = ";
$c=", major = ";
$d=", gpa = ";

if($last == ""){
	$a ="";
}
else{
	$a = "$a'$last'";	
}
if($first == ""){
	$b ="";
}
else{
	$b = "$b'$first'";	
}
if($major == ""){
	$c ="";
}
else{
	$c = "$c'$major'";	
}
if($gpa == ""){
	$d ="";
}
else{
	$d = "$d$gpa";	
}


$e = trim($a.$b.$c.$d);
$e = ltrim($e,",");


$stmt = mysqli_prepare ($connect, "UPDATE $table SET $e WHERE ID = $id ");

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);  
  
  
mysqli_close($connect);




print <<<REGISTRATION_RESULT
<html>

<head>

<title> Update Student Record </title>

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

<h2> <br/>Update Student Record </h2>

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
have been updated <br/>  
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

