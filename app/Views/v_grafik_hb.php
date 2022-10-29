<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <h2 class="text-center">Chart Harga Barang</h2>

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
  $js_array_jtb = json_encode($jumlah_harga_barang);
  echo "var dataobj = " . $js_array_jtb . ";\n";
  ?>

  console.log(dataobj.hb)
  var labels = []
  var dataarray = []

  dataobj.hb.map(function(hb) {
    labels.push(hb.nama_barang);
    dataarray.push(hb.harga_barang);
  });

  const data = {
    labels: labels,
    datasets: [{
      label: 'Grafik Harga Barang',
      backgroundColor: '#000',
      borderColor: '#000',
      data: dataarray,
    }]
  };

  const config = {
    type: 'line',
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