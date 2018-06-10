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
<td> <input type = "text" name = "username" size = "20" /></td>
</tr>

<tr>
<td> Enter password: </td>
<td> <input type = "password" name = "psw" size = "20" /></td>
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



</body>

</html>
