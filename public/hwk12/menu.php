<html>

<head>

<title> Menu </title>

<style>
.center {
    margin: auto;
    width: 50%;
}

td {
    margin: auto;
    width: 60%;
}
input{
margin: 0 25% 0 25%;
width: 50%;
text-align: center;
}
</style>
</head>


<body>

<center>

<h2> <br/>Database Menu Form </h2>

</center>


<br/>
<table class="center">


<form action = "insert.php" method = "post">
<tr>
<td> <input type = "submit" value = "Insert Student Record" /></td>

</tr>

</form>
<form action = "update.php" method = "post">
<tr>
<td> <input type = "submit" value = "Update Student Record" /></td>

</tr>

</form>
<form action = "delete.php" method = "post">
<tr>
<td> <input type = "submit" value = "Delete Student Record" /></td>

</tr>

</form>
<form action = "view.php" method = "post">
<tr>
<td> <input type = "submit" value = "View Student Record" /></td>

</tr>

</form>
<form action = "thankyou.php" method = "post">
<tr>
<td> <input type = "submit" value = "Logout" /> </td>

</tr>

</form>
</table>



</body>

</html>