

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
<center>
<p>
Login name and value can not be empty
</p>
</center>


</table>
</body>

</html>
REGISTRATION_RESULT;
  }

  
  else{
	  
  $found = false;
  if($name == "guest" && $psw == "dinner"){
	  
	$found = true ;
    include index2.php;
  }
  
  
  if(! $found){

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
<center>
<p>
Wrong password
</p>
</center>


</table>
</body>

</html>
REGISTRATION_RESULT;

  }
  }

?>

