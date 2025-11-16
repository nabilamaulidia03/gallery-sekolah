@extends('layouts.admin') {{-- layout Velzon lo punya --}}

@section('page-content')
<div class="card">
  <div class="card-body">
    <!-- Summary cards -->
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card card-zoom">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-2">Total Events</p>
                            <h2>{{ $eventsCount }}</h2>
                        </div>
                        <div class="avatar-sm bg-soft-primary rounded">
                            <i class="ri-calendar-2-line display-6 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card card-zoom">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-2">Upcoming Events</p>
                            <h2>{{ $upcomingCount }}</h2>
                        </div>
                        <div class="avatar-sm bg-soft-success rounded">
                            <i class="ri-calendar-check-line display-6 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card card-zoom">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-muted mb-2">Past Events</p>
                            <h2>{{ $pastCount }}</h2>
                        </div>
                        <div class="avatar-sm bg-soft-warning rounded">
                            <i class="ri-history-line display-6 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bisa tambah card lain: Users, etc -->
    </div>
    <!-- Chart area -->
    <div class="row">
      <div class="col-lg-8">
          <div class="card mt-4">
              <div class="card-header">
                  <h5 class="card-title mb-0">Events Per Month</h5>
              </div>
              <div class="card-body">
                  <canvas id="lineChart"></canvas>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="card mt-4">
              <div class="card-header">
                  <h5 class="card-title mb-0">Upcoming vs Past Events</h5>
              </div>
              <div class="card-body">
                  <canvas id="pieChart"></canvas>
              </div>
          </div>
    </div>
  </div>
</div>
@endsection

@section('js')
    <!-- pastikan Velzon sudah include Chart.js atau library chart yg ada -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Events',
                    data: @json($eventsPerMonth),
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Upcoming', 'Past'],
                datasets: [{
                    data: [{{ $upcoming }}, {{ $past }}],
                    backgroundColor: ['#198754', '#ffc107']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endsection
