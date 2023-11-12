@extends('layouts.app')
{{-- @section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection --}}
<x-assets.datatables />

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/chart.js/Chart.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-12">
        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
            <img style="background-image:url('https://portalsi.com/wp-content/uploads/2023/10/Desain-tanpa-judul.png">
        </ul>
    </div>
@endpush
{{-- @php
    $labels = [];
    $data = [];

    for ($i = 0; $i <= 10; $i++) {
        $start = $end = now();

        if ($i > 0) {
            if ($i <= 11) {
                $start = $start->subMonths($i - 1)->startOfMonth();
                $end = $end->subMonths($i - 1)->endOfMonth();
            } elseif ($i <= 21) {
                $start = $start->subYears($i - 12)->startOfYear();
                $end = $end->subYears($i - 12)->endOfYear();
            } else {
                $start = $start->subYears(($i - 22) * 10)->startOfYear();
                $end = $end->subYears(($i - 22) * 10)->endOfYear();
            }
        }

        $pemasukan = App\Models\Pemasukan::whereBetween('tgl_pemasukan', [$start, $end])->sum('jumlah');

        if ($i === 0) {
            $labels[] = 'Hari Ini';
        } else {
            $labels[] = $i <= 21 ? $start->format('M Y') : $start->format('Y') . ($i > 21 ? '-' . $end->format('Y') : '');
        }

        $data[] = $pemasukan;
    }
@endphp --}}

{{-- <script>
    var labels = @json($labels);
    var data = @json($data);
</script> --}}


@section('contents')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome {{ auth()->user()->name }}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Tanaman yg sedang ditanam</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_tanamen }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendapatan Hari ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp.{{ number_format($pemasukan_now, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pengeluaran Hari ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp.{{ number_format($pengeluaran_now, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Karyawan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_user }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">
            {{-- <div class="col-xl-8 col-lg-7" id="chart-container">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header"></div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="toggleChart(1)">PerMinggu</a>
                                <a class="dropdown-item" href="#" onclick="toggleChart(2)">PerBulan</a>
                                <a class="dropdown-item" href="#" onclick="toggleChart(3)">PerTahun</a>
                                <a class="dropdown-item" href="#" onclick="toggleChart(4)">Per10Tahun</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart1" class="hidden"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7" id="hari">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan Minggu Ini</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Ubah</div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="togglechart(2)">Perbulan</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(3)">Pertahun</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="Harian"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-lg-7" id="minggu">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan Bulan Ini</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Ubah</div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(3)">Pertahun</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="Pekanan"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7" id="bulan">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan Tahun Ini</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Ubah</div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(2)">perbulan</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="Bulanan"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7" id="tahun">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pendapatan 10 Tahun Ini</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Ubah</div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(2)">Perbulan</a>
                                <a class="dropdown-item" href="#" onclick="togglechart(3)">perTahun</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="Tahunan"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .hidden {
                    display: none;
                }
            </style>
            <script>
                // Menambahkan kode untuk mengatur default chart yang akan ditampilkan
                document.addEventListener("DOMContentLoaded", function() {
                    // Sembunyikan tiga chart pertama
                    document.getElementById("minggu").classList.add("hidden");
                    document.getElementById("bulan").classList.add("hidden");
                    document.getElementById("tahun").classList.add("hidden");

                    // Tampilkan chart default (contoh: "hari")
                    document.getElementById("hari").classList.remove("hidden");
                });

                function togglechart(chartId) {
                    var hari = document.getElementById("hari");
                    var minggu = document.getElementById("minggu");
                    var bulan = document.getElementById("bulan");
                    var tahun = document.getElementById("tahun");

                    switch (chartId) {
                        case 1:
                            hari.classList.remove("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 2:
                            hari.classList.add("hidden");
                            minggu.classList.remove("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 3:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.remove("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 4:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.remove("hidden");
                            break;
                        default:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                    }
                }
            </script>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> --}}
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div> --}}
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="banding"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // function toggleChart(chartId) {
                //     const charts = document.querySelectorAll('[id^="myAreaChart"]');
                //     charts.forEach(chart => chart.classList.add("hidden"));

                //     const selectedChart = document.getElementById("myAreaChart" + chartId);
                //     if (selectedChart) {
                //         selectedChart.classList.remove("hidden");
                //     }
                // }
                // Data yang Anda terima dari response JSON
                var labelsHari = {!! json_encode($labelsHari) !!};
                var dataHari = {!! json_encode($dataHari) !!};
                var labelsMinggu = {!! json_encode($labelsMinggu) !!};
                var dataMinggu = {!! json_encode($dataMinggu) !!};
                var labelsBulan = {!! json_encode($labelsBulan) !!};
                var dataBulan = {!! json_encode($dataBulan) !!};
                var labelsTahun = {!! json_encode($labelsTahun) !!};
                var dataTahun = {!! json_encode($dataTahun) !!};
                // Konfigurasi Chart.js
                var ctx1 = document.getElementById('Harian').getContext('2d');

                var Harian = new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: labelsHari,
                        datasets: [{
                            label: 'Pemasukan',
                            data: dataHari,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var ctx2 = document.getElementById('Pekanan').getContext('2d');

                var Pekanan = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: labelsBulan,
                        datasets: [{
                            label: 'Pemasukan',
                            data: dataBulan,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var ctx3 = document.getElementById('Bulanan').getContext('2d');

                var Bulanan = new Chart(ctx3, {
                    type: 'line',
                    data: {
                        labels: labelsTahun,
                        datasets: [{
                            label: 'Pemasukan',
                            data: dataTahun,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var ctx4 = document.getElementById('Tahunan').getContext('2d');

                var Tahunan = new Chart(ctx4, {
                    type: 'line',
                    data: {
                        labels: labelsMinggu,
                        datasets: [{
                            label: 'Pemasukan',
                            data: dataMinggu,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <script type="text/javascript">
                var totalTanamen = {{ $total_tanamen }};
                var totalBibits = {{ $total_bibits }};
                var totalPupuks = {{ $total_pupuks }};
                var totalAlats = {{ $total_alats }};

                var ctx = document.getElementById("banding");
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Tanaman", "Bibit", "Pupuk", "Alat"],
                        datasets: [{
                            data: [totalTanamen, totalBibits, totalPupuks, totalAlats],
                            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 80,
                    },
                });
            </script>

        </div>
    @endsection
    <script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
