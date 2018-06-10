

<!DOCTYPE html>
<html>

<head>
    <title>TYH</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <script src="js/jquery.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.kwicks-1.5.1.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/touchTouch.jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>

    <script>
        if ($(window).width() > 1024) {
            document.write("<" + "script src='js/jquery.preloader.js'></" + "script>");
        }
    </script>
    <script>
        jQuery(window).load(function () {
            $x = $(window).width();
            if ($x > 1024) {
                jQuery("#content .row").preloader();
            }
            jQuery('.magnifier').touchTouch();
            jQuery('.spinner').animate({
                'opacity': 0
            }, 1000, 'easeOutCubic', function () {
                jQuery(this).css('display', 'none')
            });
        });
    </script>
	
	


		
</head>

<body>
    <div class="spinner"></div>
    <!-- header start -->

    <div class="bg-content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <!-- slider -->
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="screen.jpg" />
                            </li>
                            <li>
                                <img src="no.jpg" alt=""> 
                            </li>
                            <li>
                                <img src="image 6.jpg" alt="">
                            </li>
                            <li>
                               <img src="hadoop1.jpg" alt=""> 
                            </li>
                            <li>
                                <img src="sg.jpg" alt=""> 
                            </li>
                        </ul>
                    </div>
                    <span id="responsiveFlag"></span>
                    <div class="block-slogan">
                        <h2>Howdy!</h2>
                        <div id="intro">
						    
                            <p id="introduction">Thank you for visiting my page. This website was built to demonstrate my current projects in the hope of stimulating cross-disciplinary collaborations.  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content -->

		<div id="content" class="content-extra">
            <div class="ic"></div>
            <div class="row-1">
                <div class="container">
                    <div class="row">
                    <div class="block-slogan2">
                        <h2>Resume!</h2>
                        <div id="intro2">
						    <h5>Tien-Yu Huang</h5>
                            <p id="introduction2">
							
							Currently a Ph.D. student at The University of Texas at Austin. Have a strong interest in Data Mining and Machine learning, with a particular emphasis on algorithms for both relational and non-relational data, and its applications to bioinformatics.  
							</p>
							
							<h5 id="h5" >Technology Skills</h5>
							<p id="introduction2">
							<b>Languages : </b>  Python, R, MATLAB, Java, C++, C, SQL, JavaScript, HTML, CSS, PHP, Unix Shell<br/>
                            <b>Tools and Utilities: </b>  HADOOP and HIVE, Linux, Git, GitHub, MySQL, jQuery, Closure<br/>

							</p>
							
							<h5 id="h5" >Current Projects</h5>
							<p id="introduction2">
							<b>NOSQL Distributed Machine Learning Package</b><br/>
							Working on the distributed machine learning package, including implementation of linear regression, logistic regression, and bayesian learning.<br/>
							Collaborating with Yexi Jiang (Skytree), Ellen Segal
							<br/>
							<br/>
							</p>
							<p id="introduction2">
							<b>Apache Hadoop Data Exploration and Discovery </b><br/>
							Implementing the Apache Mahout machine learning library to generate co-occurance and similarity recommendation.
                            Using R to deploy the MapReduce/YARN programming framework to process large amounts of data on Hadoop clusters<br/>
							Collaborating with Lujie Yi (Comcast)
														<br/>
							<br/>							
							</p>
							<p id="introduction2">
							<b>Circadian Site </b> <a id = "cir" href="interior4.php">&nbsp; Visit it!</a> <br/>
							A circadian pattern discovery website. Its main purpose is to assist scientists working on circadian epigenomic infrastructure
in exploring underlying genomic pattern and expression phase.<br/>
Circadian site was created from scratch using HTML/Javascript (with the help of jQuery), PHP, and MySQL. PHP is used
server-side to provide access to the MySQL server. jQuery helps with sending Ajax requests to the server to fetch and write
information to the database.
														<br/>
							<br/>							
							</p>
							<p id="introduction2">
							<b>Design and Simulation of Data Aggregation & Fitting Algorithm </b><br/>
							Designing and implementing data aggregation and fitting algorithm based on Least Squares Support Vector Machine.
Simulation and verification of the entire theory were further confirmed using MATLAB, with the key parameters optimized.

														<br/>
							<br/>							
							</p>
							
	    <div id="container" >
    <script> 
	
	
	
$(function () {

    // Give the points a 3D feel by adding a radial gradient
    Highcharts.getOptions().colors = $.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.4,
                cy: 0.3,
                r: 0.5
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.2).get('rgb')]
            ]
        };
    });

    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            margin: 100,
            type: 'scatter',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 30,
                depth: 250,
                viewDistance: 5,

                frame: {
                    bottom: { size: 1, color: 'rgba(0,0,0,0.02)' },
                    back: { size: 1, color: 'rgba(0,0,0,0.04)' },
                    side: { size: 1, color: 'rgba(0,0,0,0.06)' }
                }
            }
        },
        title: {
            text: 'Draggable box'
        },
        subtitle: {
            text: 'Click and drag the plot area to rotate in space'
        },
        plotOptions: {
            scatter: {
                width: 10,
                height: 10,
                depth: 10
            }
        },
        yAxis: {
            min: 0,
            max: 10,
            title: null
        },
        xAxis: {
            min: 0,
            max: 10,
            gridLineWidth: 1
        },
        zAxis: {
            min: 0,
            max: 10,
            showFirstLabel: false
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Reading',
            colorByPoint: true,
            data: [[1, 6, 5], [8, 7, 9], [1, 3, 4], [4, 6, 8], [5, 7, 7], [6, 9, 6], [7, 0, 5], [2, 3, 3], [3, 9, 8], [3, 6, 5], [4, 9, 4], [2, 3, 3], [6, 9, 9], [0, 7, 0], [7, 7, 9], [7, 2, 9], [0, 6, 2], [4, 6, 7], [3, 7, 7], [0, 1, 7], [2, 8, 6], [2, 3, 7], [6, 4, 8], [3, 5, 9], [7, 9, 5], [3, 1, 7], [4, 4, 2], [3, 6, 2], [3, 1, 6], [6, 8, 5], [6, 6, 7], [4, 1, 1], [7, 2, 7], [7, 7, 0], [8, 8, 9], [9, 4, 1], [8, 3, 4], [9, 8, 9], [3, 5, 3], [0, 2, 4], [6, 0, 2], [2, 1, 3], [5, 8, 9], [2, 1, 1], [9, 7, 6], [3, 0, 2], [9, 9, 0], [3, 4, 8], [2, 6, 1], [8, 9, 2], [7, 6, 5], [6, 3, 1], [9, 3, 1], [8, 9, 3], [9, 1, 0], [3, 8, 7], [8, 0, 0], [4, 9, 7], [8, 6, 2], [4, 3, 0], [2, 3, 5], [9, 1, 4], [1, 1, 4], [6, 0, 2], [6, 1, 6], [3, 8, 8], [8, 8, 7], [5, 5, 0], [3, 9, 6], [5, 4, 3], [6, 8, 3], [0, 1, 5], [6, 7, 3], [8, 3, 2], [3, 8, 3], [2, 1, 6], [4, 6, 7], [8, 9, 9], [5, 4, 2], [6, 1, 3], [6, 9, 5], [4, 8, 2], [9, 7, 4], [5, 4, 2], [9, 6, 1], [2, 7, 3], [4, 5, 4], [6, 8, 1], [3, 4, 0], [2, 2, 6], [5, 1, 2], [9, 9, 7], [6, 9, 9], [8, 4, 3], [4, 1, 7], [6, 2, 5], [0, 4, 9], [3, 5, 9], [6, 9, 1], [1, 9, 2]]
        }]
    });


    // Add mouse events for rotation
    $(chart.container).bind('mousedown.hc touchstart.hc', function (eStart) {
        eStart = chart.pointer.normalize(eStart);

        var posX = eStart.pageX,
            posY = eStart.pageY,
            alpha = chart.options.chart.options3d.alpha,
            beta = chart.options.chart.options3d.beta,
            newAlpha,
            newBeta,
            sensitivity = 5; // lower is more sensitive

        $(document).bind({
            'mousemove.hc touchdrag.hc': function (e) {
                // Run beta
                newBeta = beta + (posX - e.pageX) / sensitivity;
                chart.options.chart.options3d.beta = newBeta;

                // Run alpha
                newAlpha = alpha + (e.pageY - posY) / sensitivity;
                chart.options.chart.options3d.alpha = newAlpha;

                chart.redraw(false);
            },
            'mouseup touchend': function () {
                $(document).unbind('.hc');
            }
        });
    });

});

	
	
	</script>


    </div>							
							
							<p id="introduction2">
							<b>Yelp Dataset Challenge </b><br/>
Developing a recommendation system to recommend restaurants and travel cities by using data mining techniques.
Data mining tools such as R , WEKA, and KNIME are adopted to generate pipeline for restaurant classification,
restaurant recommendation, and review-rating analysis based on the NoSQL data from MongoDB. 
		            	    <div class="regular content">
		            	    <div class="regular_body"><p>e.g. To get started, just load JSON into MongoDB</p>
							<pre><code># Import businesses, users, reviews and checkins
mongoimport --db yelp --collection businesses yelp_austin_academic_dataset/yelp_academic_dataset_business.json
mongoimport --db yelp --collection users yelp_austin_academic_dataset/yelp_academic_dataset_user.json
mongoimport --db yelp --collection reviews yelp_austin_academic_dataset/yelp_academic_dataset_review.json
mongoimport --db yelp --collection checkins yelp_austin_academic_dataset/yelp_academic_dataset_checkin.json
</code></pre>
</div>
		            	    </div>
<div id="chartContainer">

<script type="text/javascript">

  FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "bubble",
        "renderAt": "chartContainer",
        "width": "600",
        "height": "400",
        "dataFormat": "json",
        "dataSource":  {
     "chart": {
        "caption": "Sales Analysis of Restaurant Location",
        "subcaption": "Last Quarter",
        "xAxisMinValue": "0",
        "xAxisMaxValue": "100",
        "yAxisMinValue": "0",
        "yAxisMaxValue": "10000",
        "plotFillAlpha": "70",
        "plotFillHoverColor": "#6baa01",
        "showPlotBorder": "0",
        "xAxisName": "Average Meal Price",
        "yAxisName": "Average Units Sold",
        "numDivlines": "2",
        "showValues": "1",
        "showTrendlineLabels": "0",
        "plotTooltext": "$name : Profit Contribution - $zvalue%",
        "drawQuadrant": "0",
        "quadrantLineAlpha": "80",
        "quadrantLineThickness": "3",
        "quadrantXVal": "50",
        "quadrantYVal": "5000",

        "theme": "fint"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "$0",
                    "x": "0"
                },
                {
                    "label": "$20",
                    "x": "20",
                    "showverticalline": "1"
                },
                {
                    "label": "$40",
                    "x": "40",
                    "showverticalline": "1"
                },
                {
                    "label": "$60",
                    "x": "60",
                    "showverticalline": "1"
                },
                {
                    "label": "$80",
                    "x": "80",
                    "showverticalline": "1"
                },
                {
                    "label": "$100",
                    "x": "100",
                    "showverticalline": "1"
                }
            ]
        }
    ],
    "dataset": [
        {
            "color": "#00aee4",
            "data": [
                {
                    "x": "40",
                    "y": "2000",
                    "z": "7",
                    "name": "Far West"
                },
                {
                    "x": "60",
                    "y": "7500",
                    "z": "37",
                    "name": "Downtown"
                },
                {
                    "x": "30",
                    "y": "4450",
                    "z": "12",
                    "name": "East I35"
                },
                {
                    "x": "35",
                    "y": "6000",
                    "z": "19",
                    "name": "South"
                },
                {
                    "x": "42",
                    "y": "3200",
                    "z": "11",
                    "name": "Hyde Park"
                },
                {
                    "x": "45",
                    "y": "5500",
                    "z": "23",
                    "name": "North Austin"
                }
            ]
        }
    ],
    "trendlines": [
        {
            "line": [
                {
                    "startValue": "6666",
                    "endValue": "10000",
                    "isTrendZone": "1",
                    "color": "#aaaaaa",
                    "alpha": "14"
                },
                {
                    "startValue": "3333",
                    "endValue": "6666",
                    "isTrendZone": "1",
                    "color": "#aaaaaa",
                    "alpha": "7"
                }
            ]
        }
    ],
    "vTrendlines": [
        {
            "line": [
                {
                    "startValue": "44",
                    "isTrendZone": "0",
                    "color": "#0066cc",
                    "thickness": "1",
                    "dashed": "1",
                    "displayValue": "Gross Avg."
                }
            ]
        }
    ]
      }

  });
revenueChart.render();
})
</script>

</div>
							


														<br/>
							<br/>							
							</p>
	



	
							<p id="introduction2">
														<br/>
                            <b>Please contact me if you are interested in any sort of collaboration!</b>

							<br/>							
							</p>							
							
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
		
    </div>
    <!-- footer -->
    <footer>
        <div class="container clearfix">
            <div class="privacy"><b>&copy; 2015 | Contact Me | </b><a href="mailto:huangty@utexas.edu">TienYu Huang</a></div>
        </div>
    </footer>
    <script src="js/bootstrap.js"></script>
</body>

</html>