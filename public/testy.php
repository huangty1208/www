<<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml"
      lang = "en" xml:lang = "en">

  <head>
    <meta charset = "utf-8" />
    <title> Circadian  Site </title>
    <link rel = "stylesheet" type = "text/css"
	 href = "project4.css" media = "all" />
    <script type = "text/javascript" src = "project.js"></script>

  </head>

  <body>
  
    <div class="contact" >
	  <br/>
	
		 <div id = "cap" >
	     <h3>Contact me</h3>
	     </div>
	
	  <p>
      <i>Copyright&#64;2015 UT Austin </i><br>
      </p>
	  <a href = "mailto:huangty@utexas.edu"> huangty@utexas.edu </a>
	</div>

    <div class="image">
     <a href="project.html"><img id = "logo2" src = "logo2.png" 
     alt = "site logo" /></a>
	 <div id = "cap" >
	     <h3>Mouse over me to navigate!</h3>
	 </div>
	 
	  <div id = "side" >
	    <h3>Our Content</h3>
        <p>
            <a href="interior1.html">What we know about the clock?</a>
            <br/>
            <a href="interior2.html">How circadian works?</a>
            <br/>
            <a href="interior3.html">What's the up-to-date stuff?</a>
            <br/>   
            <a href="testy.php">Test Yourself!</a>
            <br/>    
            <a href="interior4.php">Diurnal Tools</a>
           		
        </p>
        <h3>Sources</h3>
        <p>
            <a href="http://www.ncbi.nlm.nih.gov/pubmed">Pubmed</a>
             <br/>
            <a href="http://diurnal.mocklerlab.org/">Diurnal</a>
            <br/>
            <a href="http://www.jcircadianrhythms.com/">Journal of Circadian Rhythms</a>
            <br/>  
            <a href="http://sites.dartmouth.edu/mcclunglab/">McClung Lab</a>	
		</p>
      </div>
    </div>
  
  <div class = "page">
    
    <header>  
       <h1>Test Yourself! </h1>

    </header>

	
    <div class = "intro">
<h3>True / False</h3>
<br/>
<form action = "testy.php" method = "post">


<?php

session_start();


if (!isset($_SESSION["number"]))
{
  $_SESSION["number"] = 0;
  $_SESSION["correct"] = 0;
  $_SESSION["time"] = time();
  $_SESSION["total"] = 0;  
}


$total_number = 3;


$number = $_SESSION["number"];
$correct = $_SESSION["correct"];
$total = $_SESSION["total"];
$time = time();




if (isset($_POST["username"]))
{
  $data = $_POST["username"];
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);	
  
  if( $data != "" ) {

    $cookie_name = $data;
    setcookie("name", $cookie_name, time() + (3600 * 10), "/");	
	
  }
  
}

if (isset ($_COOKIE["score"]) && isset ($_COOKIE["name"]) && $number < 3){
	$name = $_COOKIE["name"];
	$score = $_COOKIE["score"];
	
	if( $score == 15 ){
	echo "<b> Great! $name , you are the grand master of circadian clock. </b><br/><br/>" 	;
	}
	else{
	echo "<b> Hi $name , you got $score last time. See what score you can get this try. </b><br/><br/>"	;
	}
	
}




if ($number >= $total_number)
{


  if(isset($_POST["ans11"])){
    if($_POST["ans11"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans12"])){
    if($_POST["ans12"] == "False"){
      $correct++;

    }
  }
    if(isset($_POST["ans13"])){
    if($_POST["ans13"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans14"])){
    if($_POST["ans14"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans15"])){
    if($_POST["ans15"] == "False"){
      $correct++;

    }
  }
  
  
  if ($correct < 3){
	  $correct = 0;
      $_SESSION["correct"] = $correct;

print <<<QUESTION

<p>

    You will need to answer at least 3 questions correctly to proceed to next section.<br/>
	Try to find the information in our content.<br/>
    <br/>	
    
    11) Circadian rhythms are controlled by "clock genes" that code for clock proteins. The levels of these proteins rise and fall in rhythmic patterns.  <br />
     <input type="radio" name="ans11" value="True" /> a) True<br />
     <input type="radio" name="ans11" value="False" /> b) False<br />
	 <br />
	12) Clock genes are "not" known to function in such as cell proliferation (which is uncontrolled in cancer) and cell suicide.  <br />
     <input type="radio" name="ans12" value="True" /> a) True<br />
     <input type="radio" name="ans12" value="False" /> b) False<br />
	 <br />	
    13) We are able to accelerate clock gene discovery based on genome-wide genomic and proteomic techniques. <br />
     <input type="radio" name="ans13" value="True" /> a) True<br />
     <input type="radio" name="ans13" value="False" /> b) False<br />
	 <br />
    14) Chromatin remodeling contributes to the rhythmicity of circadian genes. <br /> 
     <input type="radio" name="ans14" value="True" /> a) True<br />
     <input type="radio" name="ans14" value="False" /> b) False<br />
	 <br />
	15) Genetic motifs (specific DNA sequences) are not responsible for conferring rhythmicity to corresponding genes. <br />
     <input type="radio" name="ans15" value="True" /> a) True<br />
     <input type="radio" name="ans15" value="False" /> b) False<br />
	 <br />	 
	 
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;

	  
  }


  else{


      $total = $correct + $total;
      $cookie_name = "";
	  $cookie_value = $total;
      setcookie("score", $cookie_value, time() + (3600 * 10), "/");
	  
  print <<<FINAL_SCORE
  <br/>
  Your final score is $total correct out of 15. <br /><br />
  Congratulation!. You are now a circadian clock expert! <br /><br />
  You can try these questions again by revisiting the page. <br /><br /> 
FINAL_SCORE;
  
      session_destroy();
  if (!isset ($_COOKIE["name"])){  
  print <<<FINAL_SCORE
  Enter name to record your latest score : <input type = "text" name = "username" size = "30" /><br /><br />

  <input type = "submit" value = "Submit" />
  <input type = "reset" value = "Reset" />
FINAL_SCORE;

      }
  }
}


else if ($number == 0)
{

print <<<QUESTION

<p>

    1) The human circadian rhythm is exactly 24 hours. <br />
     <input type="radio" name="ans1" value="True" /> a) True<br />
     <input type="radio" name="ans1" value="False" /> b) False<br />
	 <br />
	2) Biological clocks play a role in other cycles such as hibernation, migrations, and even annual changes in coat and color. <br />
     <input type="radio" name="ans2" value="True" /> a) True<br />
     <input type="radio" name="ans2" value="False" /> b) False<br />
	 <br />	
    3) The biological clock will not continue running on its own natural cycle without daylight. <br />
     <input type="radio" name="ans3" value="True" /> a) True<br />
     <input type="radio" name="ans3" value="False" /> b) False<br />
	 <br />
    4) A biological clock has three parts: a way to receive input from the environment; the clock itself; and components that control the activity of other genes.<br /> 
     <input type="radio" name="ans4" value="True" /> a) True<br />
     <input type="radio" name="ans4" value="False" /> b) False<br />
	 <br />
	5) If you lived in an underground bunker under constant artificial light, your cycle would slowly get out of phase with actual daytime and nighttime. <br />
     <input type="radio" name="ans5" value="True" /> a) True<br />
     <input type="radio" name="ans5" value="False" /> b) False<br />
	 <br />	 
	 
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;

  $number++;
  $_SESSION["number"] = $number;  
}

else if ($number == 1)
{

  if(isset($_POST["ans1"])){
    if($_POST["ans1"] == "False"){
      $correct++;

    }
  }
    if(isset($_POST["ans2"])){
    if($_POST["ans2"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans3"])){
    if($_POST["ans3"] == "False"){
      $correct++;

    }
  }
    if(isset($_POST["ans4"])){
    if($_POST["ans4"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans5"])){
    if($_POST["ans5"] == "True"){
      $correct++;

    }
  }
  
  
  if ($correct < 3){
	  $correct = 0;
      $_SESSION["correct"] = $correct;

print <<<QUESTION

<p>

    You will need to answer at least 3 questions correctly to proceed to next section.<br/>
	Try to find the information in our content.<br/>
    <br/>	
    
    1) The human circadian rhythm is exactly 24 hours. <br />
     <input type="radio" name="ans1" value="True" /> a) True<br />
     <input type="radio" name="ans1" value="False" /> b) False<br />
	 <br />
	2) Biological clocks play a role in other cycles such as hibernation, migrations, and even annual changes in coat and color. <br />
     <input type="radio" name="ans2" value="True" /> a) True<br />
     <input type="radio" name="ans2" value="False" /> b) False<br />
	 <br />	
    3) The biological clock will not continue running on its own natural cycle without daylight. <br />
     <input type="radio" name="ans3" value="True" /> a) True<br />
     <input type="radio" name="ans3" value="False" /> b) False<br />
	 <br />
    4) A biological clock has three parts: a way to receive input from the environment; the clock itself; and components that control the activity of other genes.<br /> 
     <input type="radio" name="ans4" value="True" /> a) True<br />
     <input type="radio" name="ans4" value="False" /> b) False<br />
	 <br />
	5) If you lived in an underground bunker under constant artificial light, your cycle would slowly get out of phase with actual daytime and nighttime. <br />
     <input type="radio" name="ans5" value="True" /> a) True<br />
     <input type="radio" name="ans5" value="False" /> b) False<br />
	 <br />	 
	 
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;

	  
  }
  
  
  else{

  	  $_SESSION["total"] =   $total + $correct;
      $total = $correct;
	  $correct = 0;
      $_SESSION["correct"] = $correct;
	  $number++;
      $_SESSION["number"] = $number; 

	  
print <<<QUESTION

<p>

    Great! You got $total out of 5 questions correct!.<br/>
	Now let's try section 2.<br/>
    <br/>	
    
    6) A protein named melanopsin, which is sensitive to blue light, is critical for the brightness-detection system.  <br />
     <input type="radio" name="ans6" value="True" /> a) True<br />
     <input type="radio" name="ans6" value="False" /> b) False<br />
	 <br />
	7) Rods and cones in the retina of the eye are the only light-detecting proteins in our body.  <br />
     <input type="radio" name="ans7" value="True" /> a) True<br />
     <input type="radio" name="ans7" value="False" /> b) False<br />
	 <br />	
    8) The master circadian clock that regulates 24-hour cycles throughout our bodies is found in a region called the suprachiasmatic nuclei (SCN) in the hypothalamus of the brain. <br />
     <input type="radio" name="ans8" value="True" /> a) True<br />
     <input type="radio" name="ans8" value="False" /> b) False<br />
	 <br />
    9) The SCN can tell time based on external cues, such as light and darkness, and regulates sleep, metabolism, and hormone production. <br /> 
     <input type="radio" name="ans9" value="True" /> a) True<br />
     <input type="radio" name="ans9" value="False" /> b) False<br />
	 <br />
	10) There are "no" local clocks that sit in organs and tissues beside the brain's master pacemaker. <br />
     <input type="radio" name="ans10" value="True" /> a) True<br />
     <input type="radio" name="ans10" value="False" /> b) False<br />
	 <br />	 
	 
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;

  }

}

else if ($number == 2)
{


  if(isset($_POST["ans6"])){
    if($_POST["ans6"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans7"])){
    if($_POST["ans7"] == "False"){
      $correct++;

    }
  }
    if(isset($_POST["ans8"])){
    if($_POST["ans8"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans9"])){
    if($_POST["ans9"] == "True"){
      $correct++;

    }
  }
    if(isset($_POST["ans10"])){
    if($_POST["ans10"] == "False"){
      $correct++;

    }
  }
  
  
  if ($correct < 3){
	  $correct = 0;
      $_SESSION["correct"] = $correct;

print <<<QUESTION

<p>
 
    You will need to answer at least 3 questions correctly to proceed to next section.<br/>
	Try to find the information in our content.<br/>
    <br/>	
    
    6) A protein named melanopsin, which is sensitive to blue light, is critical for the brightness-detection system.  <br />
     <input type="radio" name="ans6" value="True" /> a) True<br />
     <input type="radio" name="ans6" value="False" /> b) False<br />
	 <br />
	7) Rods and cones in the retina of the eye are the only light-detecting proteins in our body.  <br />
     <input type="radio" name="ans7" value="True" /> a) True<br />
     <input type="radio" name="ans7" value="False" /> b) False<br />
	 <br />	
    8) The master circadian clock that regulates 24-hour cycles throughout our bodies is found in a region called the suprachiasmatic nuclei (SCN) in the hypothalamus of the brain. <br />
     <input type="radio" name="ans8" value="True" /> a) True<br />
     <input type="radio" name="ans8" value="False" /> b) False<br />
	 <br />
    9) The SCN can tell time based on external cues, such as light and darkness, and regulates sleep, metabolism, and hormone production. <br /> 
     <input type="radio" name="ans9" value="True" /> a) True<br />
     <input type="radio" name="ans9" value="False" /> b) False<br />
	 <br />
	10) There are "no" local clocks that sit in organs and tissues beside the brain's master pacemaker. <br />
     <input type="radio" name="ans10" value="True" /> a) True<br />
     <input type="radio" name="ans10" value="False" /> b) False<br />
	 <br />	 
	 
</p>
<p>
  <br />
  <input type = "submit" value = "Grade" />
  <input type = "reset" value = "Clear" />
</p>

QUESTION;

	  
  }
  
  
  else{

  	  $_SESSION["total"] =   $total + $correct;
      $total = $correct;
	  $correct = 0;
      $_SESSION["correct"] = $correct;
	  $number++;
      $_SESSION["number"] = $number; 

	  
print <<<QUESTION

<p>

    Great! You got $total out of 5 questions correct!.<br/>
	Now let's try section 3.<br/>
    <br/>	
    
    11) Circadian rhythms are controlled by "clock genes" that code for clock proteins. The levels of these proteins rise and fall in rhythmic patterns.  <br />
     <input type="radio" name="ans11" value="True" /> a) True<br />
     <input type="radio" name="ans11" value="False" /> b) False<br />
	 <br />
	12) Clock genes are "not" known to function in such as cell proliferation (which is uncontrolled in cancer) and cell suicide.  <br />
     <input type="radio" name="ans12" value="True" /> a) True<br />
     <input type="radio" name="ans12" value="False" /> b) False<br />
	 <br />	
    13) We are able to accelerate clock gene discovery based on genome-wide genomic and proteomic techniques. <br />
     <input type="radio" name="ans13" value="True" /> a) True<br />
     <input type="radio" name="ans13" value="False" /> b) False<br />
	 <br />
    14) Chromatin remodeling contributes to the rhythmicity of circadian genes. <br /> 
     <input type="radio" name="ans14" value="True" /> a) True<br />
     <input type="radio" name="ans14" value="False" /> b) False<br />
	 <br />
	15) Genetic motifs (specific DNA sequences) are not responsible for conferring rhythmicity to corresponding genes. <br />
     <input type="radio" name="ans15" value="True" /> a) True<br />
     <input type="radio" name="ans15" value="False" /> b) False<br />
	 <br />	 
	 
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
  </div>
  </div>

  </body>

</html>