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
$query = "SELECT * FROM node2 ORDER BY id desc";
$sql = mysqli_query($conn, $query);

?>
<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 60; URL=$url");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SimpanTani | Pemantauan Kelembaban Gabah</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Project GrainHumidity" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
 <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></script>
</head>
<body>
  <div class="page-container">
  	   <div class="mother-grid-inner">
              <!--header start here-->
  				<div class="header-main">
  					<div class="header-left">
  							<div class="logo-name">
  									 <a href="index.php"> <h1>SimpanTani</h1>
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
    <div class="main-page-charts">
       <div class="main-page-chart-layer1">
    		<div class="col-md-4 chart-layer1-left">
    			<div class="glocy-chart">
            <h3 align="center" class="tlt">Data Kelembaban Harian</h3>
    			    <div class="signup-block">
                <div id="datepicker-container">
                  <div id="datepicker-center">
                    <div id="z"></div>
                    <input type="text" id="d" disabled/>
                    <input type="submit" name="proses" value="Proses"/>
                  </div>
                </div>
              </div>
    			</div>
    		</div>
    		<div class="col-md-8 chart-layer1-right">
          <div class="glocy-chart">
    			     <div class="span-2c">
                 <h3 align="center" class="tlt">Data Kelembaban Harian</h3>
                 <div class="table-responsive">
                     <table class="table table-hover">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Project</th>
                           <th>Manager</th>

                           <th>Status</th>
                           <th>Progress</th>
                       </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>1</td>
                       <td>Face book</td>
                       <td>Malorum</td>

                       <td><span class="label label-danger">in progress</span></td>
                       <td><span class="badge badge-info">50%</span></td>
                   </tr>
                   <tr>
                       <td>2</td>
                       <td>Twitter</td>
                       <td>Evan</td>

                       <td><span class="label label-success">completed</span></td>
                       <td><span class="badge badge-success">100%</span></td>
                   </tr>
                   <tr>
                       <td>3</td>
                       <td>Google</td>
                       <td>John</td>

                       <td><span class="label label-warning">in progress</span></td>
                       <td><span class="badge badge-warning">75%</span></td>
                   </tr>
                   <tr>
                       <td>4</td>
                       <td>LinkedIn</td>
                       <td>Danial</td>

                       <td><span class="label label-info">in progress</span></td>
                       <td><span class="badge badge-info">65%</span></td>
                   </tr>
                   <tr>
                       <td>5</td>
                       <td>Tumblr</td>
                       <td>David</td>

                       <td><span class="label label-warning">in progress</span></td>
                       <td><span class="badge badge-danger">95%</span></td>
                   </tr>
                   <tr>
                       <td>6</td>
                       <td>Tesla</td>
                       <td>Mickey</td>

                       <td><span class="label label-info">in progress</span></td>
                       <td><span class="badge badge-success">95%</span></td>
                   </tr>
               </tbody>
           </table>
       </div>
               </div>
    			</div>
    		</div>
    	 <div class="clearfix"> </div>
      </div>
     </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$('#z').datepicker({
    inline: true,
    altField: '#d'
});
$('#d').change(function(){
    $('#z').datepicker('setDate', $(this).val());
});
</script>
</div>
</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 D4TB PENS 2017 | Modified Design from  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->

<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
