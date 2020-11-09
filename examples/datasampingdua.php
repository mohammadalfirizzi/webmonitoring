<?php 
include 'koneksi.php';
$temp = mysqli_query($conn,"SELECT temp FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>Temp : <?php while ($b = mysqli_fetch_array($temp)) { echo  $b['temp'];}?></p>
             <?php $humid = mysqli_query($conn,"SELECT humid FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>Humid : <?php while ($b = mysqli_fetch_array($humid)) { echo  $b['humid'];}?></p>
             <?php $alt = mysqli_query($conn,"SELECT alt FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>Altitude : <?php while ($b = mysqli_fetch_array($alt)) { echo  $b['alt'];}?></p>
             <?php $pres = mysqli_query($conn,"SELECT pres FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>Pressure : <?php while ($b = mysqli_fetch_array($pres)) { echo  $b['pres'];}?></p>
