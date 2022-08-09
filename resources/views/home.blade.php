@extends('layouts.app')

@section('content')
<div class="container">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Grafik Penelitian / Semester</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                      <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                        <canvas id="myChart" height="100"></canvas>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/components-statistic.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var total_penelitian = <?php echo json_encode($total_penelitian) ?>;
  var semester = <?php echo json_encode($semester) ?>;
  Highcharts.chart('grafik', {
    title : {
      text: 'Grafik Penelitian'
    },
    xAxis : {
      categories : ['semester', 'sad', 'sasd', 'saff']
    },
    yAxis : {
      title : {
        text : 'Total Penelitian'
      } 
    },
    plotOptions: {
        series: {
          allowPointSelect: true
        }
    },
    series: [
      {
        name : 'Total Penelitian'
        data : [1,2,4,52,5]
      }
    ]
  });
</script>
<script>
  var total_penelitian = <?php echo json_encode($total_penelitian) ?>;
  var semester = <?php echo json_encode($semester) ?>;
  var tot = <?php echo json_encode($tot) ?>;
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: semester,
        datasets: [{
            label: 'Jumlah Penelitian',
            data: total_penelitian,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: tot,
          callback: function(value, index, values) {
            return value;
          }
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
          tickMarkLength: 15,
        }
      }]
    },
  }
});
  </script>
@endsection
