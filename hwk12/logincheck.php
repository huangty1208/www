

<?php
  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["username"])&& !isset($_POST["psw"])){
  $name = "";
  $psw = "";  
  }
  else{
  $name = $_POST["username"];
  $psw = $_POST["psw"];  
  }
  
  if (trim($name) =="" || trim($psw) ==""){
print <<<REGISTRATION_RESULT

<html>

<head>

<title> Login Form </title>

<style>
.center {
    margin: auto;
    width: 50%;
}
</style>
</head>


<body>
<center>

<h2> <br/>Database Login Form </h2>

</center>


<br/>
<table class="center">

<form action = "logincheck.php" method = "post">

<tr>
<td> Enter name: </td>
<td> <input type = "text" name = "username" size = "30" /></td>
</tr>

<tr>
<td> Enter password: </td>
<td> <input type = "password" name = "psw" size = "30" /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input type = "submit" value = "Login" /></td>
<td><input type = "reset" value = "Reset" /></td>
</tr>

</form>

</table>
<center>
<p>Login name or password can not be empty</p>
</center>
</body>
</html>
REGISTRATION_RESULT;
  }

  
  else{
  

  # open file 'passwd.txt' 
  $myfile = fopen ("passwd.txt", "r");
  $found = false;
  while(!feof($myfile)) {

    $array1 = explode(":",fgets($myfile));

    if(! isset($array1[1])){
     $array1[1]=null;
    }

    $str1 = $array1[0];
    $str2 = $array1[1];
    if ( $str1 == trim($name)){
      $found = true;

      if(trim($str2) != trim($psw)){
        echo "Wrong password <br/>";
		echo "Login Failed";
      }
      else{

		include "menu.php";
        
      }

      break;
    }
  }

  fclose($myfile);

  if(! $found){

print <<<REGISTRATION_RESULT
<html>

<head>

<title> Login Form </title>

<style>
.center {
    margin: auto;
    width: 50%;
}
</style>
</head>


<body>
<center>

<h2> <br/>Database Login Form </h2>

</center>


<br/>
<table class="center">

<form action = "logincheck.php" method = "post">

<tr>
<td> Enter name: </td>
<td> <input type = "text" name = "username" size = "30" /></td>
</tr>

<tr>
<td> Enter password: </td>
<td> <input type = "password" name = "psw" size = "30" /></td>
</tr>

<tr>
<td> &nbsp; </td> <td> &nbsp; </td>
</tr>
<tr>
<td><input type = "submit" value = "Login" /></td>
<td><input type = "reset" value = "Reset" /></td>
</tr>

</form>

</table>
<center>
<p>User name not found out </p>
</center>
</body>
</html>
REGISTRATION_RESULT;

  }
  }

?>

