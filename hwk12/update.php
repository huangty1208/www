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