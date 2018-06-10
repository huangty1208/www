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

<?php
$host = "localhost";
$user = "";
$pwd = "";
$dbs = "test";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

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

?>

</table>
</body>

</html>
