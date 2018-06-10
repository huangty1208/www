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




</body>

</html>