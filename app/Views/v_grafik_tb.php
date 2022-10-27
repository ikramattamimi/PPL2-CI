<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <h2 class="text-center">Chart Tinggi Badan</h2>

      <!-- Trending Section -->
      <div class="col-lg">
        <div class="trending">
          <!-- <h3>Chart Tinggi Badan</h3> -->
          <ul class="trending-post">
            <li>
              <canvas id="myChart"></canvas>
            </li>
          </ul>
        </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  <?php
  $js_array_jtb = json_encode($jumlah_tinggi_badan);
  echo "var dataobj = " . $js_array_jtb . ";\n";
  ?>

  console.log(dataobj.tb)
  var labels = []
  var dataarray = []

  dataobj.tb.map(function(tb) {
    labels.push(tb.nama);
    dataarray.push(tb.tinggi_badan);
  });

  const data = {
    labels: labels,
    datasets: [{
      label: 'Tinggi Badan Mahasiswa',
      backgroundColor: '#000',
      borderColor: '#000',
      data: dataarray,
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
          suggestedMax: 200,
          beginAtZero: true,
          ticks: {
            maxTicksLimit: 6,
          },
          grid: {
            drawBorder: false,
          },
        },
      },
      datasets: {
        bar: {
          barThickness: 30
        }
      }
    }
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>