<?php
include 'koneksi.php';
?>

<?php
$waktu = mysqli_query($conn,"SELECT reading_time FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$temp = mysqli_query($conn,"SELECT temp FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$humid = mysqli_query($conn,"SELECT humid FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$pm1_0 = mysqli_query($conn,"SELECT pm1_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$pm2_5 = mysqli_query($conn,"SELECT pm2_5 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$pm10_0 = mysqli_query($conn,"SELECT pm10_0 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");

?>
             <canvas id=myChart width="300" height="100" style="margin-left: -4%"></canvas>
              <div class="content">
        <div class="row">
          <div class="col-md-12">
              </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 5 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com" target="_blank">AIR WATCHER</a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com/" target="_blank">D4 Telkom B 2017</a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license" target="_blank">Support</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
<script>
	var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($waktu)) { echo '"' . $b['reading_time'] . '",';}?>],
            datasets: [
            {
                label: "PM 1",
                backgroundColor: "rgba(0, 0, 0, 0)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 1,
                pointBorderColor: "rgba(200, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($pm1_0)) { echo  $b['pm1_0'] . ',';}?>],
            },
               {
                label: "PM 2.5", 
                backgroundColor: "rgba(255, 255, 255, 0)",
                borderColor: "rgba(255,9,9,1)",
                borderWidth: 1,
                pointBorderColor: "rgba(255, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($pm2_5)) { echo  $b['pm2_5'] . ',';}?>],
            },
            {
                label: "PM 10", 
                backgroundColor: "rgba(255, 255, 255, 0)",
                borderColor: "rgba(0,9,9,1)",
                borderWidth: 1,
                pointBorderColor: "rgba(255, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($pm10_0)) { echo  $b['pm10_0'] . ',';}?>],
            }
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

</script>