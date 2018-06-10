

<?php
  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["username"])&& !isset($_POST["psw"])){
  $name = "";
  $psw = "";  
  }
  else{
  $name =trim($_POST["username"]);
  $psw = trim($_POST["psw"]);  
  }
  
  if (trim($name) =="" || trim($psw) ==""){
print <<<REGISTRATION_RESULT

<!DOCTYPE html>
<html>

<head>

<title> Signup Form </title>

<style>
.center {
    margin: auto;
    width: 50%;
}

.text{
    margin: auto;
    width: 50%;
text-align: center;
}
</style>

</head>


<body>

<center>

<h2> <br/>Dinner Signup Form </h2>

</center>


<br/>
<table class="center">

<form action = "check.php" method = "post" >

<tr>
<td> Enter name: </td>
<td> <input type = "text" name = "username" size = "20" required /></td>
</tr>

<tr>
<td> Enter password: </td>
<td> <input type = "password" name = "psw" size = "20" required /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input type = "submit" value = "submit" /></td>
<td><input type = "reset" value = "Reset" /></td>
</tr>

</form>
</table>

<center>
<p>
Login name and value can not be empty
</p>
</center>

</body>

</html>
REGISTRATION_RESULT;
  }

  
  else{
	  
  $found = false;
  if($name == "guest" && $psw == "dinner"){
	  
	$found = true ;
print <<<REGISTRATION_RESULT
<!DOCTYPE html>
<html>

<head>

<title> Signup Form </title>

<style>
.center {
    margin: auto;
    width: 50%;
}

.text{
    margin: auto;
    width: 50%;
text-align: center;
}
</style>

<script>
function validateForm() {
    var x = document.forms["myForm"]["username"].value;
    var y = document.forms["myForm"]["item"].value;
    alert(x);
    alert(y);
    if (x == null || x == "" || y == null || y == "") {
        alert("Name and Item must be filled out");
        return false;
    }
</script>

</head>


<body>

<center>

<h2> <br/>Dinner Signup Form </h2>

</center>


<br/>
<table class="center">

<form action = "insert.php" method = "post" >

<tr>
<td> Enter name: </td>
<td> <input type = "text" name = "username" size = "20" required /></td>
</tr>

<tr>
<td> Enter item: </td>
<td> <input type = "text" name = "item" size = "100" required /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input type = "submit" value = "submit" /></td>
<td><input type = "reset" value = "Reset" /></td>
</tr>

</form>

</table>



<br/>

<center>

<h4> Items people will bring: </h4>

</center>


<table class="text">
<tr>
<th> Name </th><th> Item </th>
</tr>

REGISTRATION_RESULT;

// read password stored on the server
$file = fopen("/u/huangty/psw.txt","r");
$line = fgets($file);
$line = trim($line);
fclose($file);

// Connect to the MySQL database
$host = "fall-2015.cs.utexas.edu";
$user = "huangty";
$pwd2 = $line;
$dbs = "cs329e_huangty";
$port = "3306";


$connect = mysqli_connect ($host, $user, $pwd2, $dbs, $port);

if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

$table = "Dinner";

$result = mysqli_query($connect, "SELECT * from $table " );
if(!$result){

  print	"<tr><td>no results</td><td></td></tr>";

}
else{
while ($row = $result->fetch_row())
{
  print "<tr>";	
  print "<td>".$row[0] . "</td><td>" . $row[1]. "</td>";
  print "</tr>";		
}
$result->free();
}

// Close connection to the database
mysqli_close($connect);

print <<<REGISTRATION

</table>
</body>

</html>
REGISTRATION;
  }
  
  
  if(! $found){

print <<<REGISTRATION
<!DOCTYPE html>
<html>

<head>

<title> Signup Form </title>

<style>
.center {
    margin: auto;
    width: 50%;
}

.text{
    margin: auto;
    width: 50%;
text-align: center;
}
</style>

</head>


<body>

<center>

<h2> <br/>Dinner Signup Form </h2>

</center>


<br/>
<table class="center">

<form action = "check.php" method = "post" >

<tr>
<td> Enter name: </td>
<td> <input type = "text" name = "username" size = "20" required /></td>
</tr>

<tr>
<td> Enter password: </td>
<td> <input type = "password" name = "psw" size = "20" required /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input type = "submit" value = "submit" /></td>
<td><input type = "reset" value = "Reset" /></td>
</tr>

</form>
</table>

<center>
<p>
Wrong password
</p>
</center>

</body>

</html>
REGISTRATION;

  }
  }

?>

