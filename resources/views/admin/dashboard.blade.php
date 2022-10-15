@extends('admin.layouts.main')

@section('title')
  <title>Dashboard</title>
@endsection

@section('assets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
@endsection

@section('content')
  <div class="flex justify-between">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Dashboard
    </h2>
    @feature('voting')
      @php
        $message = 'Matikan fitur voting';
        $classes = 'bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800';
      @endphp
    @endfeature

    @feature('voting', false)
      @php
        $message = 'Nyalakan fitur voting';
        $classes = 'bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
      @endphp
    @endfeature
    <a onclick="return window.confirm('Yakin ingin toggle voting?')" href="{{ route('admin.toggle-voting') }}"
      class="mt-6 h-fit text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center {{ $classes }}">
      {{ $message }}
    </a>
  </div>

  @if (session()->has('success'))
    <div id="toast-success"
      class="flex items-center p-4 mb-4 w-full text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
      role="alert">
      <div
        class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
            clip-rule="evenodd"></path>
        </svg>
      </div>
      <span class="ml-5 text-sm font-normal">{{ session()->get('success') }}</span>
    </div>
  @endif

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
