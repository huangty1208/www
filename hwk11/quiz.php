<html>
<head>
<title> Astronomy Quiz </title>
</head>
<body>
<h3> Astronomy Quiz </h3>

<form action = "quiz.php" method = "post">


<?php

session_start();

if (!isset($_SESSION["number"]))
{
  $_SESSION["number"] = 0;
  $_SESSION["correct"] = 0;
  $_SESSION["time"] = time();
  $_SESSION["name"] = "";  
}

$total_number = 6;


$number = $_SESSION["number"];
$correct = $_SESSION["correct"];
$n1 = $_SESSION["name"];
$time = time();

if( $time - $_SESSION["time"] >= 900){

  $correct = $correct *10;
  $total_number = $total_number *10;
 
  print <<<FINAL_SCORE
  Time out!
  Your final score is $correct correct out of $total_number . <br /><br />
  Thank you for playing. <br /><br />
FINAL_SCORE;
  session_destroy();	

  # open file 'info.txt' and append the name and e-mail address
  if ($fh = fopen ("results.txt", "a"))
  {
    fwrite ($fh, "$n1".":"."$correct \n");
    fclose ($fh);
  }
  
}

else{

if ($number >= $total_number)
{

  if(isset($_POST["ans6"])){ 
    if(strtolower(trim($_POST["ans6"])) == "age"){
      $correct++;
      $_SESSION["correct"] = $correct;
	}  
  }

  $correct = $correct *10;
  $total_number = $total_number *10;
  
  print <<<FINAL_SCORE
  Your final score is $correct correct out of $total_number. <br /><br />
  Thank you for playing. <br /><br />
FINAL_SCORE;
  session_destroy();
  
  if ($fh = fopen ("results.txt", "a"))
  {
    fwrite ($fh, "$n1".":"."$correct \n");
    fclose ($fh);
  }  
  
}


else if ($number == 0)
{
  $_SESSION["name"] = trim($name); 	
  $number++;
  $_SESSION["number"] = $number;
print <<<QUESTION
<h3>True / False</h3>
<p>
    You have 15 mins to finish the quiz! <br/>
    1) According to Kepler the orbit of the earth is a circle with the sun at the center.<br />
     <input type="radio" name="ans1" value="True" /> a) True<br />
     <input type="radio" name="ans1" value="False" /> b) False<br />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}

else if ($number == 1)
{
  $number++;
  $_SESSION["number"] = $number;
  if(isset($_POST["ans1"])){
    if($_POST["ans1"] == "False"){
      $correct++;
      $_SESSION["correct"] = $correct;
    }
  }
print <<<QUESTION
<h3>True / False</h3>
<p>
    2) Ancient astronomers did consider the heliocentric model of the solar system but rejected it because they could not detect parallax.<br />
     <input type="radio" name="ans2" value="True" /> a) True<br />
     <input type="radio" name="ans2" value="False" /> b) False<br />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}

else if ($number == 2)
{
  $number++;
  $_SESSION["number"] = $number;
  if(isset($_POST["ans2"])){
    if($_POST["ans2"] == "True"){
      $correct++;
      $_SESSION["correct"] = $correct;
    }
  }	
print <<<QUESTION
<h3>Multiple Choice</h3>
<p>
     3) The total amount of energy that a star emits is directly related to its<br />
      <input type="checkbox" name="ans3[]" value="a" /> a) surface gravity and magnetic field<br />
      <input type="checkbox" name="ans3[]" value="b" /> b) radius and temperature <br />
      <input type="checkbox" name="ans3[]" value="c" /> c) pressure and volume <br />
      <input type="checkbox" name="ans3[]" value="d" /> d) location and velocity <br />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}

else if ($number == 3)
{
  $number++;
  $_SESSION["number"] = $number;
  if(isset($_POST["ans3"])){
    if($_POST["ans3"] == ["b"]){
      $correct++;
      $_SESSION["correct"] = $correct;
    }
  }
print <<<QUESTION
<h3>Multiple Choice</h3>
<p>
     4) Stars that live the longest have<br />
      <input type="checkbox" name="ans4[]" value="a" /> a) high mass<br />
      <input type="checkbox" name="ans4[]" value="b" /> b) high temperature <br />
      <input type="checkbox" name="ans4[]" value="c" /> c) lots of hydrogen <br />
      <input type="checkbox" name="ans4[]" value="d" /> d) d) small mass  <br />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}

else if ($number == 4)
{
  if(isset($_POST["ans4"])){
    if($_POST["ans4"] == ["d"]){
      $correct++;
      $_SESSION["correct"] = $correct;
    }
  }
  $number++;
  $_SESSION["number"] = $number;
print <<<QUESTION
<h3>Fill in the Blank</h3>
<p>
     5) A collection of a hundred billion stars, gas, and dust is called a _____. <br/>
      <input name = "ans5" type = "text" size = "10" />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}

else if ($number == 5)
{
  $number++;
  $_SESSION["number"] = $number;
  if(isset($_POST["ans5"])){
    if(strtolower(trim($_POST["ans5"])) == "galaxy"){
      $correct++;
      $_SESSION["correct"] = $correct;
    }
  }
print <<<QUESTION
<h3>Fill in the Blank</h3>
<p>
     6) The inverse of the Hubble's constant is a measure of the _____ of the universe.<br/>
      <input name = "ans6" type = "text" size = "10" />
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;
}
}
?>

</form>
</body>
</html>