<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Graphs</title>
    <link href="/Task_2/icon.png" rel="icon" type="image/png" />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body style="background: #666666">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex-container pt-3">
      <div class="row">
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart1"
                style="min-height: 350px, height: 350px, max-height: 350px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart2"
                style="min-height: 250px, height: 250px, max-height: 250px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart3"
                style="min-height: 250px, height: 250px, max-height: 250px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart4"
                style="min-height: 250px, height: 250px, max-height: 250px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart5"
                style="min-height: 250px, height: 250px, max-height: 250px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0">
          <div class="card text-dark bg-light mx-2 my-2">
            <div class="card-header text-white bg-dark">Sales Report</div>
            <div class="card-body">
              <canvas
                id="myChart6"
                style="min-height: 250px, height: 250px, max-height: 250px, max-width: 100%, display: block"
              ></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    //Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "salesreport";

    //Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    //Die if connection was not successful
    if (!$conn) {
      die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
      $sql = "SELECT * FROM `soldicecream`";
      $result = mysqli_query($conn, $sql);

      //Find the number of records returned
      $num = mysqli_num_rows($result);

      //Saving data from database to php arrays
      if($num>
    0){ for ($labels=array(), $ice=array(), $i=0; $row =
    mysqli_fetch_assoc($result); $i++) { $labels[$i] = $row['day']; $ice[$i] =
    $row['icecream']; } } } ?>
    <script>
      var passedArray = <?php echo json_encode($labels); ?>;
      var element = <?php echo json_encode($ice); ?>;
      var ctx = document.getElementById("myChart1").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)'
              }]
          }
      })
      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              animations: {
                tension: {
                  duration: 2000,
                  easing: 'linear',
                  from: 0.5,
                  to: 0,
                  loop: true
                }
              }
          }
      })
      var ctx = document.getElementById("myChart3").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ]
              }]
          },
          options: {
              animations: {
                tension: {
                  duration: 2000,
                  easing: 'linear',
                  from: 0.5,
                  to: 0,
                  loop: true
                }
              }
          }
      })
      var ctx = document.getElementById("myChart4").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ]
              }]
          },
          options: {
              animations: {
                tension: {
                  duration: 2000,
                  easing: 'linear',
                  from: 0.5,
                  to: 0,
                  loop: true
                }
              }
          }
      })
      var ctx = document.getElementById("myChart5").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'polarArea',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ]
              }]
          },
          options: {
              animations: {
                tension: {
                  duration: 2000,
                  easing: 'linear',
                  from: 0.5,
                  to: 0,
                  loop: true
                }
              }
          }
      })
      var ctx = document.getElementById("myChart6").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'radar',
          data: {
              labels: passedArray,
              datasets: [{
                  label: 'Number of Ice-Cream Sold',
                  data: element,
                  backgroundColor: 'rgba(255, 99, 132, 0.2)'
              }]
          }
      })
    </script>
  </body>
</html>
