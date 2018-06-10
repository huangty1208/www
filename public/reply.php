<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml"
      lang = "en" xml:lang = "en">

  <head>
    <meta charset = "utf-8" />
    <title> Circadian  Site </title>
    <link rel = "stylesheet" type = "text/css"
	 href = "project5.css" media = "all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script type = "text/javascript"> 

function callServer() { 
var v2 = document.getElementById("te").value;
if (v2.trim()== "" ){
  alert("Gene names can not be empty!");
}

} 



</script>


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
            <a class="ex1" href="interior1.html">What we know about the clock?</a>
            <br/>
            <a class="ex1" href="interior2.html">How circadian works?</a>
            <br/>
            <a class="ex1" href="interior3.html">What's the up-to-date stuff?</a>
            <br/>   
            <a class="ex1" href="testy.php">Test Yourself!</a>
            <br/>    
            <a class="ex1" href="interior4.php">Diurnal Tools</a>
           		
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
       <h1>Diurnal Tools </h1>

    </header>

	
    <div class = "intro">
	<h3>Exploring the diurnal genome-wide expression of chromatin markers</h3>
	</div>
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
  


  $host = "localhost";
  $user = "";
  $pwd = "";
  $dbs = "test";
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
  
  mysqli_close($connect);
  
?>  

	<div id="container" >
    <script> 
	
	
	var list = <?php echo json_encode($all) ?> ; 
	var series = [];
	var dict = {};
	var num = [];
	
	for (var i = 0; i < list.length; i++) {
      

      num = list[i].slice(0,8).map(function(nu) {
        return eval(nu);
      });	  
	  
      dict = {
      name: list[i][9],
      data: num
      };	  
	  series[i] = dict;
	  dict = {};
      
    }


	
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Mean selected histone marker levels at different ZT',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Circadian site',
            x: -20
        },
        xAxis: {
		    title: {
                text: 'Time of the day'
            },
            categories: ['ZT0', 'ZT3', 'ZT6', 'ZT9', 'ZT12', 'ZT15',
                'ZT18', 'ZT021', 'ZT24']
        },
        yAxis: {
            title: {
                text: 'Mean reads level per bp'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'rpb'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: series
    });
});
	
	
	</script>


    </div>	
	
	
	
    <div class = "intro">
        
 
 
    <br/>
 
 
    <div class = "intro3">
    
	<br/>

	<form  id="usrform" action="reply.php" method="post" >

	 <div id = "ra" >
	 <input type="radio" name="type" value="h3k4" checked="checked" /> H3K4me3
     <input type="radio" name="type" value="h3k9" /> H3K9ac <br />
	 </div>
	 <br/>
    
    <textarea id = "te" rows="10" cols="30" name="genename" form="usrform" required>
At2g46830
At1g01060
At5g61380
At2g25930
	</textarea>
    <br/>
	<input type="submit" value="Submit">
    </form>
	
	<br/>
	<p>
	The current version supports two active histone markers <br/>
	More histone markers will be included once the expression data is publicized
	</p>
 
    </div>
	
	<div class = "intro4">
	
	<p>
	The diurnal tool provides a convenient access to circadian and diurnal expression data of multiple histone markers for model plant Arabidopsis thaliana. The acutal statistical results will be publicized and open for download after the current papers are published. <br/><br/>
    Gnome-wide analysis identifying ATX1 at the core of the Arabidopsis circadian clock Huang TY, Yu HH, Lu J, McClung CR, Chen ZJ. Plant Cell 2015 Dec. (in press) <br/><br/>
	Circadian site, a web-based epigenomics platform for histone-modifying expression profiling Huang TY, McClung CR, Chen ZJ (in preparation)<br/>
	
	
	</p>
	
	</div>

    </div>	


   <br/>
   <br/>
  </div>

  </body>

</html>
