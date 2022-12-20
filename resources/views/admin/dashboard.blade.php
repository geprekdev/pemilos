@extends('admin.layouts.main')

@section('title')
  <title>Dashboard</title>
@endsection

@section('assets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
@endsection

@section('content')
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
  </h2>

  <div class="w-full flex flex-wrap gap-4 justify-center">
    <div class="w-full md:w-[45%] min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Live Count Voting OSIS
      </h4>

      <canvas class="max-w-full" id="osis"></canvas>
    </div>
    <div class="w-full md:w-[45%] min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Live Count Voting MPK
      </h4>

      <canvas class="max-w-full" id="mpk"></canvas>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script>
    const osisCtx = document.getElementById('osis');
    let osisCanvas = new Chart(osisCtx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($osis->pluck('name')) !!},
        datasets: [{
          label: 'Votes',
          data: {!! json_encode($osis->pluck('votes_count')) !!},
          backgroundColor: '#0694a2',
          borderWidth: 1,
        }, ],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
        },
        scales: {
          yAxes: [{
            display: true,
            ticks: {
              beginAtZero: true
            }
          }]
        },
      },
    });

    const mpkCtx = document.getElementById('mpk');
    let mpkCanvas = new Chart(mpkCtx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($mpk->pluck('name')) !!},
        datasets: [{
          label: 'Votes',
          data: {!! json_encode($mpk->pluck('votes_count')) !!},
          backgroundColor: '#e60000',
          borderWidth: 1,
        }],
      },
      options: {
        responsive: true,
        legend: {
          display: false,
        },
        scales: {
          yAxes: [{
            display: true,
            ticks: {
              beginAtZero: true
            }
          }]
        },
      },
    });

    const updateChart = () => {
      fetch('{{ route('api.live-count') }}')
        .then(response => response.json())
        .then(data => {
          osisCanvas.data.labels = data.osis.labels;
          osisCanvas.data.datasets[0].data = data.osis.data;
          osisCanvas.update();

          mpkCanvas.data.labels = data.mpk.labels;
          mpkCanvas.data.datasets[0].data = data.mpk.data;
          mpkCanvas.update();
        });
    };

    setInterval(() => {
      updateChart();
    }, 5000);
  </script>
@endsection
