
<?php

print <<<TOP
<html>
<head>
<title> Database Access </title>
</head>
<style>
.center {
    margin: auto;
    width: 50%;
}
td{
text-align:center;
}

</style>
<body>
<center>
<h3> Database Access </h3>
</center>
<table class="center">
<tr>
<th> ID </th><th> Last</th><th>First</th><th>Major</th><th>GPA</th>
</tr>

TOP;

  
// Connect to the MySQL database
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
print "<center>";
print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";
print "</center>";


// Get data from a table in the database and print it out

$table = "students";


	

$result = mysqli_query($connect, "SELECT * from $table ORDER BY LAST and FIRST " );


if(!$result){

  print	"<tr><td>no results</td><td></td><td></td><td></td><td></td></tr>";

}
else{
while ($row = $result->fetch_row())
{
  print "<tr>";	
  print "<td>".$row[0] . "</td><td>" . $row[1]. "</td><td>" . $row[2].
	"</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td>";
  print "</tr>";		
}
$result->free();
}



// Close connection to the database
mysqli_close($connect);

print <<<BOTTOM
</table>

</body>
</html>
BOTTOM;
?>
