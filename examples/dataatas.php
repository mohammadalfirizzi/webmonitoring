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
<style>
  #font{
    font-size: 1.2rem;
  }
  </style>
<div class="content">
        <div class="row">
          <div class="col-lg-6 col-md-3 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-6 col-md-6">
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
                      <?php $reading_time = mysqli_query($conn,"SELECT reading_time FROM `data` ORDER BY `data`.`reading_time` DESC LIMIT 1"); 
                        while ($b = mysqli_fetch_array($reading_time)) { echo $b['reading_time'];}
                       ?>
                  </div>
                  <div class="col-6 col-md-6">
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
                  <div class="col-6 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-6 col-md-8">
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
          </div>