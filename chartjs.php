<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChartJS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
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
      //SQL for Area Chart
      $areasql = "SELECT * FROM `areachart`";
      $arearesult = mysqli_query($conn, $areasql);

      //Find the number of records returned
      $areanum = mysqli_num_rows($arearesult);

      //Saving data from database to php arrays
      if($areanum>0){
        for ($arealabels=array(), $ice=array(), $i=0; $row =mysqli_fetch_assoc($arearesult); $i++)
        {
          $arealabels[$i] = $row['day'];
          $ice[$i] = $row['icecream'];
        }
      }
      
      // SQL for Line Chart
      $linesql = "SELECT * FROM `linechart`";
      $lineresult = mysqli_query($conn, $linesql);

      //Find the number of records returned
      $linenum = mysqli_num_rows($lineresult);

      //Saving data from database to php arrays
      if($linenum>0){
        for ($linelabels=array(), $cricket=array(), $hockey=array(), $football=array(), $i=0; $row =mysqli_fetch_assoc($lineresult); $i++)
        {
          $linelabels[$i] = $row['year'];
          $cricket[$i] = $row['cricket'];
          $hockey[$i] = $row['hockey'];
          $football[$i] = $row['football'];
        }
      }

      //SQL for Doughnut Chart
      $doughnutsql = "SELECT * FROM `doughnutchart`";
      $doughnutresult = mysqli_query($conn, $doughnutsql);

      //Find the number of records returned
      $doughnutnum = mysqli_num_rows($doughnutresult);

      //Saving data from database to php arrays
      if($doughnutnum>0){
        for ($doughnutlabels=array(), $mango=array(), $i=0; $row =mysqli_fetch_assoc($doughnutresult); $i++)
        {
          $doughnutlabels[$i] = $row['month'];
          $mango[$i] = $row['mangoes'];
        }
      }

      //SQL for Stacked Bar Chart
      $stackedbarsql = "SELECT * FROM `stackedbarchart`";
      $stackedbarresult = mysqli_query($conn, $stackedbarsql);

      //Find the number of records returned
      $stackedbarnum = mysqli_num_rows($stackedbarresult);

      //Saving data from database to php arrays
      if($stackedbarnum>0){
        for ($stackedbarlabels=array(), $maths=array(), $computer=array(), $english=array(), $hindi=array(), $science=array(), $i=0; $row =mysqli_fetch_assoc($stackedbarresult); $i++)
        {
          $stackedbarlabels[$i] = $row['year'];
          $maths[$i] = $row['Maths'];
          $computer[$i] = $row['Computer Science'];
          $english[$i] = $row['English'];
          $hindi[$i] = $row['Hindi'];
          $science[$i] = $row['Science'];
        }
      }

      //SQL for Radar Chart
      $radarsql = "SELECT * FROM `radarchart`";
      $radarresult = mysqli_query($conn, $radarsql);

      //Find the number of records returned
      $radarnum = mysqli_num_rows($radarresult);

      //Saving data from database to php arrays
      if($radarnum>0){
        for ($radarlabels=array(), $tvs=array(), $phones=array(), $computers=array(), $i=0; $row =mysqli_fetch_assoc($radarresult); $i++)
        {
          $radarlabels[$i] = $row['month'];
          $tvs[$i] = $row['TV'];
          $phones[$i] = $row['phones'];
          $computers[$i] = $row['computers'];
        }
      }

      //SQL for Polar Area Chart
      $polarsql = "SELECT * FROM `polarchart`";
      $polarresult = mysqli_query($conn, $polarsql);

      //Find the number of records returned
      $polarnum = mysqli_num_rows($polarresult);

      //Saving data from database to php arrays
      if($polarnum>0){
        for ($polarlabels=array(), $users=array(), $i=0; $row =mysqli_fetch_assoc($polarresult); $i++)
        {
          $polarlabels[$i] = $row['agegroup'];
          $users[$i] = $row['users'];
        }
      }

      //SQL for Pie Chart
      $piesql = "SELECT * FROM `piechart`";
      $pieresult = mysqli_query($conn, $piesql);

      //Find the number of records returned
      $pienum = mysqli_num_rows($pieresult);

      //Saving data from database to php arrays
      if($pienum>0){
        for ($pielabels=array(), $hours=array(), $i=0; $row =mysqli_fetch_assoc($pieresult); $i++)
        {
          $pielabels[$i] = $row['task'];
          $hours[$i] = $row['hours'];
        }
      }

      //SQL for Bar Chart
      $barsql = "SELECT * FROM `barchart`";
      $barresult = mysqli_query($conn, $barsql);

      //Find the number of records returned
      $barnum = mysqli_num_rows($barresult);

      //Saving data from database to php arrays
      if($barnum>0){
        for ($barlabels=array(), $profit=array(), $i=0; $row =mysqli_fetch_assoc($barresult); $i++)
        {
          $barlabels[$i] = $row['year'];
          $profit[$i] = $row['yearly_profit'];
        }
      }
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0%; background-color: lightskyblue;">
        <!-- Content Header (Page header) -->
        <div style="padding-left: 15px;">
            <h1 style=" text-align: center;">ChartJS</h1>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Area Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Printing Area Chart using Canvas -->
                                <canvas id="areaChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Donut Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Doughnut Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="donutChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Pie Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="pieChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- RADAR CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Radar Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Radar Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="radarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
                        <!-- LINE CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Line Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Line Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="lineChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- BAR CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Bar Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Bar Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- STACKED BAR CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Stacked Bar Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- POLAR AREA CHART -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Polar Area Chart</h3>

                                <!-- Buttons for Minimizing and Closing Chart -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Printing Polar Area Chart using Canvas -->
                            <div class="card-body">
                                <canvas id="polarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Converting PHP arrays to JavaScript variables
        var arealabels = <?php echo json_encode($arealabels); ?>;
        var areadata = <?php echo json_encode($ice); ?>;
        
        // Get context with jQuery - using jQuery's .get() method.+
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: arealabels,
            datasets: [{
                label: 'Ice-cream Sales Report',
                backgroundColor: 'rgba(60,141,188,0.9)',
                pointColor: '#5caede',
                data: areadata
            }]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        //-------------
        //- LINE CHART -
        //--------------

        // Converting PHP arrays to JavaScript variables
        var linelabels = <?php echo json_encode($linelabels); ?>;
        var cricketdata = <?php echo json_encode($cricket); ?>;
        var hockeydata = <?php echo json_encode($hockey); ?>;
        var footballdata = <?php echo json_encode($football); ?>;

        // Get context with jQuery - using jQuery's .get() method.+
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartData = {
            labels: linelabels,
            datasets: [{
                    label: 'Cricket',
                    backgroundColor: '#ffffff',
                    borderColor: 'rgba(60,141,188,0.8)',
                    data: cricketdata
                },
                {
                    label: 'Hockey',
                    backgroundColor: '#ffffff',
                    borderColor: 'green',
                    data: hockeydata
                },
                {
                    label: 'Football',
                    backgroundColor: '#ffffff',
                    borderColor: 'red',
                    data: footballdata
                }
            ]
        }
        var lineChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------

        // Converting PHP arrays to JavaScript variables
        var doughnutlabels = <?php echo json_encode($doughnutlabels); ?>;
        var mangodata = <?php echo json_encode($mango); ?>;

        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: doughnutlabels,
            datasets: [{
                data: mangodata,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#17a2b8',
                    '#6f42c1', '#e83e8c'
                ]
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }


        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------

        // Converting PHP arrays to JavaScript variables
        var pielabels = <?php echo json_encode($pielabels); ?>;
        var hoursdata = <?php echo json_encode($hours); ?>;

        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = {
            labels: pielabels,
            datasets: [{
                data: hoursdata,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#17a2b8',
                    '#6f42c1', '#e83e8c'
                ]
            }]
        }
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        
        new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        })

        //-------------
        //- BAR CHART -
        //-------------

        // Converting PHP arrays to JavaScript variables
        var barlabels = <?php echo json_encode($barlabels); ?>;
        var profitdata = <?php echo json_encode($profit); ?>;
        
        // Get context with jQuery - using jQuery's .get() method.
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var BarChartData = {
            labels: barlabels,
            datasets: [{
                    label: "Company's Yearly Profit",
                    borderColor: '#00cdff',
                    backgroundColor: '#97d9e970',
                    data: profitdata,
                    borderWidth: 2
                }
            ]
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: BarChartData,
          options: {
            scales: {
                y: {
                    min: 0,
                    max: 70,
                }
            }
          },
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------

        // Converting PHP arrays to JavaScript variables
        var stackedbarlabels = <?php echo json_encode($stackedbarlabels); ?>;
        var mathsdata = <?php echo json_encode($maths); ?>;
        var computerdata = <?php echo json_encode($computer); ?>;
        var englishdata = <?php echo json_encode($english); ?>;
        var hindidata = <?php echo json_encode($hindi); ?>;
        var sciencedata = <?php echo json_encode($science); ?>;

        // Get context with jQuery - using jQuery's .get() method.
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = {
            labels: stackedbarlabels,
            datasets: [{
                    label: 'Maths',
                    data: mathsdata,
                    backgroundColor: '#dc3545',
                },
                {
                    label: 'Computer Science',
                    data: computerdata,
                    backgroundColor: '#ffc107',
                },
                {
                    label: 'English',
                    data: englishdata,
                    backgroundColor: '#fd7e14',
                },
                {
                    label: 'Hindi',
                    data: hindidata,
                    backgroundColor: '#e83e8c',
                },
                {
                    label: 'Science',
                    data: sciencedata,
                    backgroundColor: 'pink',
                }
            ]
        }

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })

        //-------------
        //- RADAR CHART -
        //--------------

        // Converting PHP arrays to JavaScript variables
        var radarlabels = <?php echo json_encode($radarlabels); ?>;
        var tvsdata = <?php echo json_encode($tvs); ?>;
        var phonesdata = <?php echo json_encode($phones); ?>;
        var computersdata = <?php echo json_encode($computers); ?>;

        // Get context with jQuery - using jQuery's .get() method.
        var radarChartCanvas = $('#radarChart').get(0).getContext('2d')
        var radarChartData = {
            labels: radarlabels,
            datasets: [{
                    label: 'TVs',
                    backgroundColor: '#0000ff5e',
                    borderColor: 'blue',
                    data: tvsdata
                },
                {
                    label: 'Phones',
                    backgroundColor: '#0080005e',
                    borderColor: 'green',
                    data: phonesdata
                },
                {
                    label: 'Computers',
                    backgroundColor: '#ff00005e',
                    borderColor: 'red',
                    data: computersdata
                }
            ]
        }

        new Chart(radarChartCanvas, {
            type: 'radar',
            data: radarChartData,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }
            }
        })

        //-------------
        //- POLAR CHART -
        //--------------

        // Converting PHP arrays to JavaScript variables
        var polarlabels = <?php echo json_encode($polarlabels); ?>;
        var usersdata = <?php echo json_encode($users); ?>;

        // Get context with jQuery - using jQuery's .get() method.
        var polarChartCanvas = $('#polarChart').get(0).getContext('2d')
        var polarChartData = {
            labels: polarlabels,
            datasets: [{
                label: 'Social Media Users',
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#2a6384'],
                borderColor: '#ffffff',
                data: usersdata
            }]
        }

        new Chart(polarChartCanvas, {
            type: 'polarArea',
            data: polarChartData
        })
    })
    </script>
</body>

</html>