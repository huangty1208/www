

<?php


  function purge ($str)
  {
    $purged_str = preg_replace("/\W/", "", $str);
    return $purged_str;
  }

  # get the incoming information
  extract ($_POST);
  
  if(!isset($_POST["type"])|| !isset($_POST["genename"])){
  $type = "";
  $genename = "";  
 
  }
  else{
  $type = trim($_POST["type"]);
  $genename = trim($_POST["genename"]);  
  }
  
  $genename = explode("\n", $genename);
  
  foreach($genename as $x => $x_value) {
    $genename[$x] = strtolower(purge($x_value));
}
  



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

  $type = mysqli_real_escape_string ($connect, $type);
  
  foreach($genename as $x => $x_value) {
    $genename[$x] = mysqli_real_escape_string ($connect, $x_value);
}  
  

if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}  
  
$table = $type;


 $all = array(); 

foreach($genename as $x => $x_value) { 
 
  $result = mysqli_query($connect, "SELECT * from $table WHERE ID = \"$x_value\" " );
  if(!$result){
    $all[] = $x_value;
  }
  else{
    $row = $result->fetch_row();

    $all[] = $row;
		
  }
  $result->free();
  
}


echo json_encode($all) ;

  
  mysqli_close($connect);
  
?>  

