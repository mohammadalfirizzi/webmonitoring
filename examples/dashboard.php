<?php
include 'koneksi.php';
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  }
$temp1 = mysqli_query($conn,"SELECT temp FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
$humid2 = mysqli_query($conn,"SELECT humid FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
$pm1 = mysqli_query($conn,"SELECT pm1_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
$pm253 = mysqli_query($conn,"SELECT pm2_5 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
$pm104 = mysqli_query($conn,"SELECT pm10_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Air Watcher
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="../assets/js/plugins/jquery-latest.js"></script> 
  <script type="text/javascript" src="../assets/js/plugins/mdb.min.js"></script>
<script>
var refreshIddua = setInterval(function()
{
    $('#responsecontainer').load('datagraph.php');
}, 3000);
</script>
<script>
  var refreshId = setInterval(function()
{
    $('#responsecontainerdua').load('dataduagraph.php');
}, 3000);
</script>
<script>
  var refreshIdtiga = setInterval(function()
{
    $('#responsecontainertiga').load('dataatas.php');
}, 3000);
</script>
<script>
  var refreshIdempat = setInterval(function()
{
    $('#responsecontainerempat').load('datasamping.php');
}, 3000);
</script>
<script>
  var refreshIdlima = setInterval(function()
{
    $('#responsecontainerlima').load('datasampingdua.php');
}, 3000);
</script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/air.png">
          </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          AIR WATCHER
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#">
             <!--  <i class="nc-icon nc-pin-3"></i> -->
              <p></p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Data Table</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">AIR WATCHER</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->

      <div class="content">
        <div class="row">
         <!--  <div class="col-lg-6 col-md-3 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-6">
                    <?php while ($b = mysqli_fetch_array($pm104)) { $b['pm10_0'];
  $xx = $b['pm10_0'];
   $I = ((100-50)/(365-80))*($xx-80)+50;
                        $aqi = round($I);
  }?> 
                    <div class="icon-big icon-warning">
                      <?php if ($aqi > 0 and $aqi < 50) {
                        echo "<h6 class='text-success'>Baik</h6>";
                      }
                      elseif ($aqi > 51 and $aqi < 100) {
                        echo "<h6 class='text-primary'>Sedang</h6>";
                      }
                      elseif ($aqi > 101 and $aqi < 200) {
                        echo "<h6 class='text-warning'>Tidak Sehat</h6>";
                      }
                      // elseif ($aqi > 151 and $aqi < 200) {
                      //   echo "Tidak Sehat";
                      // }
                      elseif ($aqi > 201 and $aqi < 300) {
                        echo "<h6 class='text-danger'>Sangat Tidak Sehat</h6>";
                      }
                      else
                       {
                        echo "<h6 class='text-dark'>Berbahaya</h6>";
                      } ?>
                    </div>
                      <?php $reading_time = mysqli_query($conn,"SELECT reading_time FROM `data` LIMIT 1"); 
                        while ($b = mysqli_fetch_array($reading_time)) { echo $b['reading_time'];}
                       ?>
                  </div>
                  <div class="col-7 col-md-6">
                    <div class="numbers">
                      <p class="card-category">PM 10</p>
                      <p><?php echo $xx; ?></p>
                      <p><?php echo $aqi; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> In the last 5 minutes
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Temperature</p>
                      <p class="card-title"><?php while ($b = mysqli_fetch_array($temp1)) { echo $b['temp'];} ?>
                        </p>
                        <p><br></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                 <div class="stats">
                  <i class="fa fa-clock-o"></i> In the last 5 minutes
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-sun-fog-29 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Humid</p>
                      <p class="card-title"><?php while ($b = mysqli_fetch_array($humid2)) { echo $b['humid'];} ?>
                      </p><br></p>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> In the last 5 minutes
                </div>
              </div>
            </div>
          </div> -->
        </div> 
          <div id="responsecontainertiga"></div>
        <div class="row">
          <div class="col-md-9">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Air Monitoring</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
              <div id="responsecontainer">
               <!--  <canvas id=myChart width="400" height="100"></canvas>
            -->   </div>
              </div>
              </div>  
            </div>
            <div class="col-md-3  ">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Air Monitoring</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
                  <div id="responsecontainerempat"></div>
              </div>
              </div>  
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Air Monitoring</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
              <div id="responsecontainerdua">
               <!--  <canvas id=myChart width="400" height="100"></canvas>
            -->   </div>
              </div>
              </div>  
            </div>
            <div class="col-md-3  ">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Air Monitoring</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">

                <div id="responsecontainerlima"></div>
              </div>
              </div>  
            </div>
          </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/jquery-3.4.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!-- <script>
    $(function(){

  //get the line chart canvas
  var ctx = $("#myChart");

  //line chart data
  var data = {
    labels: ["match1", "match2", "match3", "match4", "match5"],
    datasets: [
      {
        label: "TeamA Score",
        data: [10, 50, 25, 70, 40],
        backgroundColor: "blue",
        borderColor: "lightblue",
        fill: false,
        lineTension: 0,
        radius: 5
      },
      {
        label: "TeamB Score",
        data: [20, 35, 40, 60, 50],
        backgroundColor: "green",
        borderColor: "lightgreen",
        fill: false,
        lineTension: 0,
        radius: 5
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Line Graph",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  //create Chart class object
  var chart = new Chart(ctx, {
    type: "line",
    data: data,
    options: options
  });
});
  </script> -->
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
 
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
