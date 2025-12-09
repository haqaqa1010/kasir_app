@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h3>Dashboard Admin</h3>
        <p class="text-muted">Ringkasan statistik dan aktivitas sistem</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card stats-card-1">
            <div class="card-body">
                <div class="card-icon">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <h5 class="card-title text-muted">Pendapatan Hari Ini</h5>
                <h2 class="fw-bold">RP 4,250,000</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-success">
                        <i class="bi bi-arrow-up-right"></i> 12.5%
                    </span>
                    <small>vs Kemarin</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card stats-card-2">
            <div class="card-body">
                <div class="card-icon">
                    <i class="bi bi-receipt"></i>
                </div>
                <h5 class="card-title text-muted">Total Transaksi</h5>
                <h2 class="fw-bold">128</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-success">
                        <i class="bi bi-arrow-up-right"></i> 8.3%
                    </span>
                    <small>vs Kemarin</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card stats-card-3">
            <div class="card-body">
                <div class="card-icon">
                    <i class="bi bi-cart-check"></i>
                </div>
                <h5 class="card-title text-muted">Produk Terjual</h5>
                <h2 class="fw-bold">542</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-success">
                        <i class="bi bi-arrow-up-right"></i> 15.2%
                    </span>
                    <small>vs Kemarin</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card dashboard-card stats-card-4">
            <div class="card-body">
                <div class="card-icon">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="card-title text-muted">Kasir Aktif</h5>
                <h2 class="fw-bold">3</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-success">
                        <i class="bi bi-check-circle"></i>
                    </span>
                    <small>Online</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-graph-up me-2"></i>Pendapatan 7 Hari Terakhir
                </h5>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="250"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-pie-chart me-2"></i>Metode Pembayaran
                </h5>
            </div>
            <div class="card-body">
                <canvas id="paymentChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Transactions -->
<div class="row">
    <div class="col-12">
        <div class="card dashboard-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-clock-history me-2"></i>Transaksi Terbaru
                </h5>
                <a href="/admin/reports" class="btn btn-admin btn-sm">
                    Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Waktu</th>
                                <th>Kasir</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>INV-2024-00125</strong>
                                    <br><small class="text-muted">#T125</small>
                                </td>
                                <td>{{ date('H:i', strtotime('-2 minutes')) }}</td>
                                <td>
                                    <span class="badge bg-info">Kasir-1</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">5 items</span>
                                </td>
                                <td>
                                    <strong>RP 85,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success">Tunai</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>INV-2024-00124</strong>
                                    <br><small class="text-muted">#T124</small>
                                </td>
                                <td>{{ date('H:i', strtotime('-5 minutes')) }}</td>
                                <td>
                                    <span class="badge bg-info">Kasir-2</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">3 items</span>
                                </td>
                                <td>
                                    <strong>RP 45,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-primary">QRIS</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>INV-2024-00123</strong>
                                    <br><small class="text-muted">#T123</small>
                                </td>
                                <td>{{ date('H:i', strtotime('-15 minutes')) }}</td>
                                <td>
                                    <span class="badge bg-warning">Admin</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">3 items</span>
                                </td>
                                <td>
                                    <strong>RP 40,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success">Tunai</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-plus-circle text-primary" style="font-size: 2.5rem; margin-bottom: 15px;"></i>
                <h5>Tambah Produk</h5>
                <p class="text-muted">Tambah produk baru ke inventori</p>
                <a href="/admin/products" class="btn btn-admin">Tambah Produk</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-printer text-success" style="font-size: 2.5rem; margin-bottom: 15px;"></i>
                <h5>Cetak Laporan</h5>
                <p class="text-muted">Cetak laporan harian/bulanan</p>
                <a href="/admin/reports" class="btn btn-admin">Lihat Laporan</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dashboard-card">
            <div class="card-body text-center">
                <i class="bi bi-cash-register text-warning" style="font-size: 2.5rem; margin-bottom: 15px;"></i>
                <h5>Mode Kasir</h5>
                <p class="text-muted">Beralih ke mode kasir</p>
                <a href="/pos" class="btn btn-admin">Ke Kasir</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['6 hari lalu', '5 hari lalu', '4 hari lalu', '3 hari lalu', '2 hari lalu', 'Kemarin', 'Hari Ini'],
            datasets: [{
                label: 'Pendapatan (RP)',
                data: [3200000, 3500000, 3800000, 4200000, 4100000, 3950000, 4250000],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    ticks: {
                        callback: function(value) {
                            return 'RP ' + (value/1000000).toFixed(1) + ' jt';
                        }
                    }
                }
            }
        }
    });

    // Payment Method Chart
    const paymentCtx = document.getElementById('paymentChart').getContext('2d');
    const paymentChart = new Chart(paymentCtx, {
        type: 'doughnut',
        data: {
            labels: ['Tunai', 'QRIS', 'Transfer Bank'],
            datasets: [{
                data: [65, 25, 10],
                backgroundColor: [
                    '#28a745',
                    '#007bff',
                    '#6f42c1'
                ],
                borderWidth: 1
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