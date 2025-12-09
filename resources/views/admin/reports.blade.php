@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h3>Laporan Transaksi</h3>
        <p class="text-muted">Lihat dan analisis data transaksi</p>
    </div>
</div>

<!-- Date Filter -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Periode</label>
                        <select class="form-select" id="reportPeriod">
                            <option value="today">Hari Ini</option>
                            <option value="yesterday">Kemarin</option>
                            <option value="week" selected>Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="custom">Kustom</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2" id="customDateRange" style="display: none;">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3 mb-2" id="customDateRange2" style="display: none;">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3 mb-2 d-flex align-items-end">
                        <button class="btn btn-admin w-100" id="generateReport">
                            <i class="bi bi-arrow-clockwise me-2"></i>Generate Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card dashboard-card stats-card-1">
            <div class="card-body">
                <h6 class="text-muted">Total Transaksi</h6>
                <h3 class="mb-2">1,248</h3>
                <small class="text-success">
                    <i class="bi bi-arrow-up-right"></i> 8.3% vs periode lalu
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card dashboard-card stats-card-2">
            <div class="card-body">
                <h6 class="text-muted">Total Pendapatan</h6>
                <h3 class="mb-2">RP 42.5 Jt</h3>
                <small class="text-success">
                    <i class="bi bi-arrow-up-right"></i> 12.5% vs periode lalu
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card dashboard-card stats-card-3">
            <div class="card-body">
                <h6 class="text-muted">Produk Terjual</h6>
                <h3 class="mb-2">5,420</h3>
                <small class="text-success">
                    <i class="bi bi-arrow-up-right"></i> 15.2% vs periode lalu
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card dashboard-card stats-card-4">
            <div class="card-body">
                <h6 class="text-muted">Rata-rata/Transaksi</h6>
                <h3 class="mb-2">RP 34,118</h3>
                <small class="text-success">
                    <i class="bi bi-arrow-up-right"></i> 3.8% vs periode lalu
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">Trend Penjualan</h5>
            </div>
            <div class="card-body">
                <canvas id="salesChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">Metode Pembayaran</h5>
            </div>
            <div class="card-body">
                <canvas id="paymentChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Transactions Table -->
<div class="row">
    <div class="col-12">
        <div class="card dashboard-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-receipt me-2"></i>Data Transaksi
                </h5>
                <div>
                    <button class="btn btn-outline-secondary btn-sm me-2" onclick="window.print()">
                        <i class="bi bi-printer me-1"></i>Cetak
                    </button>
                    <button class="btn btn-admin btn-sm">
                        <i class="bi bi-download me-1"></i>Export Excel
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Tanggal</th>
                                <th>Kasir</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 10; $i++)
                            @php
                                $cashiers = ['Kasir-1', 'Kasir-2', 'Kasir-3', 'Admin'];
                                $cashier = $cashiers[array_rand($cashiers)];
                                $methods = [
                                    ['bg-success', 'Tunai'],
                                    ['bg-primary', 'QRIS'],
                                    ['bg-purple', 'Transfer']
                                ];
                                $method = $methods[array_rand($methods)];
                            @endphp
                            <tr>
                                <td>
                                    <strong>INV-2024-00{{ 130 - $i }}</strong>
                                    <br><small class="text-muted">#T{{ 130 - $i }}</small>
                                </td>
                                <td>
                                    {{ date('d/m/Y', strtotime("-$i days")) }}
                                    <br><small>{{ date('H:i', strtotime("+$i hours")) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $cashier }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ rand(1, 8) }} items</span>
                                </td>
                                <td>
                                    <strong>RP {{ number_format(rand(10000, 200000), 0, ',', '.') }}</strong>
                                </td>
                                <td>
                                    <span class="badge {{ $method[0] }}">{{ $method[1] }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Report Types -->
<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-cash-stack text-primary" style="font-size: 2rem; margin-bottom: 15px;"></i>
                <h6>Laporan Harian</h6>
                <p class="text-muted">Ringkasan transaksi harian</p>
                <button class="btn btn-outline-primary btn-sm">Lihat</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-calendar-week text-success" style="font-size: 2rem; margin-bottom: 15px;"></i>
                <h6>Laporan Mingguan</h6>
                <p class="text-muted">Analisis mingguan</p>
                <button class="btn btn-outline-primary btn-sm">Lihat</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-calendar-month text-warning" style="font-size: 2rem; margin-bottom: 15px;"></i>
                <h6>Laporan Bulanan</h6>
                <p class="text-muted">Laporan bulanan lengkap</p>
                <button class="btn btn-outline-primary btn-sm">Lihat</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Charts
    let salesChart, paymentChart;
    
    document.addEventListener('DOMContentLoaded', function() {
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pendapatan (RP)',
                    data: [4200000, 3800000, 4500000, 5200000, 4800000, 5500000, 4250000],
                    backgroundColor: '#4361ee',
                    borderColor: '#3f37c9',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'RP ' + (value/1000000).toFixed(1) + ' jt';
                            }
                        }
                    }
                }
            }
        });

        // Payment Chart
        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
        paymentChart = new Chart(paymentCtx, {
            type: 'pie',
            data: {
                labels: ['Tunai', 'QRIS', 'Transfer'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#28a745',
                        '#007bff',
                        '#6f42c1'
                    ]
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
    });

    // Custom date range toggle
    document.getElementById('reportPeriod').addEventListener('change', function() {
        const customRange = document.getElementById('customDateRange');
        const customRange2 = document.getElementById('customDateRange2');
        
        if (this.value === 'custom') {
            customRange.style.display = 'block';
            customRange2.style.display = 'block';
        } else {
            customRange.style.display = 'none';
            customRange2.style.display = 'none';
        }
    });

    // Generate report
    document.getElementById('generateReport').addEventListener('click', function() {
        const period = document.getElementById('reportPeriod').value;
        
        // Simulate loading
        const btn = this;
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            alert(`Laporan untuk periode ${period} berhasil dibuat!`);
        }, 2000);
    });
</script>
@endsection