<?php

$servername = "localhost";
// REPLACE with your Database name
$dbname = "u7973178_grainhumidity";
// REPLACE with Database user
$username = "u7973178_node";
// REPLACE with Database user password
$password = "monitoringgabah";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select from Node 1
$sql = "SELECT id, value, reading_time FROM node1 order by reading_time desc limit 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    $time1 = $row["reading_time"];
    $value1 = $row["value"];
}

// Select from Node 2
$sql = "SELECT id, value, reading_time FROM node2 order by reading_time desc limit 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    $time2 = $row["reading_time"];
    $value2 = $row["value"];
}

// Select from Node 3
$sql = "SELECT id, value, reading_time FROM node3 order by reading_time desc limit 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()){
    $time3 = $row["reading_time"];
    $value3 = $row["value"];
}


$timegraph1 = mysqli_query($conn,"SELECT reading_time FROM ( SELECT * FROM node1 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");
$valuegraph1 = mysqli_query($conn,"SELECT value FROM ( SELECT * FROM node1 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");
$timegraph2 = mysqli_query($conn,"SELECT reading_time FROM ( SELECT * FROM node2 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");
$valuegraph2 = mysqli_query($conn,"SELECT value FROM ( SELECT * FROM node2 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");
$timegraph3 = mysqli_query($conn,"SELECT reading_time FROM ( SELECT * FROM node3 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");
$valuegraph3 = mysqli_query($conn,"SELECT value FROM ( SELECT * FROM node3 ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC");

$result->free();
$conn->close();
?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>AirWatcher | Pemantauan Kualitas Udara</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Project AirWatcher2" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div class="page-container">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php"> <h1>AirWatcher</h1>
									<!--<img id="logo" src="" alt="Logo"/>-->
								  </a>
							</div>
							<div class="clearfix"> </div>
						 </div>
				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3><?php echo $value1; ?>%</h3>
						<h4>Alat 1</h4>
						<p><?php echo $time1; ?></p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3><?php echo $value2; ?>%</h3>
					<h4>Alat 2</h4>
					<p><?php echo $time2; ?></p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3><?php echo $value3; ?>%</h3>
						<h4>Alat 3</h4>
						<p><?php echo $time3; ?></p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-envelope-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<br>
<!--main page chart start here-->
<div class="chart-layer">
			<div class="glocy-chart">
			<div class="span-2c">
                        <h3 class="tlt">Grafik Kelembaban Alat 1</h3>
                        <canvas id="bar1" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
                        <script>
                            var barChartData = {
                            labels : [<?php while ($b = mysqli_fetch_array($timegraph1)) { echo '"' . substr($b['reading_time'], 11, 18) . '",';}?>],
                            datasets : [
                                {
                                    fillColor : "#FC8213",
                                    data : [<?php while ($b = mysqli_fetch_array($valuegraph1)) { echo  $b['value'] . ',';}?>]
                                }
                            ]

                        };
                            new Chart(document.getElementById("bar1").getContext("2d")).Bar(barChartData);
                        </script>
                        <h5 class="tlt">Data Realtime dalam 1 Jam Terakhir</h5>
                    </div>
			</div>
	 <div class="clearfix"> </div>
 </div>

 <div class="chart-layer">
 			<div class="glocy-chart">
 			<div class="span-2c">
                         <h3 class="tlt">Grafik Kelembaban Alat 2</h3>
                         <canvas id="bar2" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
                         <script>
                             var barChartData = {
                             labels : [<?php while ($b = mysqli_fetch_array($timegraph2)) { echo '"' . substr($b['reading_time'], 11, 18) . '",';}?>],
                             datasets : [
                                 {
                                     fillColor : "#FC8213",
                                     data : [<?php while ($b = mysqli_fetch_array($valuegraph2)) { echo  $b['value'] . ',';}?>]
                                 }
                             ]

                         };
                             new Chart(document.getElementById("bar2").getContext("2d")).Bar(barChartData);
                         </script>
                         <h5 class="tlt">Data Realtime dalam 1 Jam Terakhir</h5>
                     </div>
 			</div>
 	 <div class="clearfix"> </div>
  </div>

   <div class="chart-layer">
   			<div class="glocy-chart">
   			<div class="span-2c">
                           <h3 class="tlt">Grafik Kelembaban Alat 3</h3>
                           <canvas id="bar3" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
                           <script>
                               var barChartData = {
                               labels : [<?php while ($b = mysqli_fetch_array($timegraph3)) { echo '"' . substr($b['reading_time'], 11, 18) . '",';}?>],
                               datasets : [
                                   {
                                       fillColor : "#FC8213",
                                       data : [<?php while ($b = mysqli_fetch_array($valuegraph3)) { echo  $b['value'] . ',';}?>]
                                   }
                               ]

                           };
                               new Chart(document.getElementById("bar3").getContext("2d")).Bar(barChartData);
                           </script>
                           <h5 class="tlt">Data Realtime dalam 1 Jam Terakhir</h5>
                       </div>
   			</div>
    </div>

</div>
</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 D4TB PENS 2017 | Modified Design from  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->



<!--slider menu-->

<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
