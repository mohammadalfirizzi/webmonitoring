
<?php
include 'koneksi.php';
 $pm1_0 = mysqli_query($conn,"SELECT pm1_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>PM 1   : <?php while ($b = mysqli_fetch_array($pm1_0)) { echo  $b['pm1_0'];}?></p>
             <?php $pm25 = mysqli_query($conn,"SELECT pm2_5 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>PM 2.5 : <?php while ($b = mysqli_fetch_array($pm25)) { echo  $b['pm2_5'];}?></p>
             <?php $pm106 = mysqli_query($conn,"SELECT pm10_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC"); ?>
             <p>PM 10  : <?php while ($b = mysqli_fetch_array($pm106)) { echo  $b['pm10_0'];}?></p>