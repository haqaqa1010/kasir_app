@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi
                </h5>
                <div>
                    <button class="btn btn-light btn-sm me-2">
                        <i class="bi bi-download me-1"></i>Export
                    </button>
                    <button class="btn btn-light btn-sm">
                        <i class="bi bi-printer me-1"></i>Cetak Laporan
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Tanggal -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label for="startDate" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="startDate" 
                               value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="endDate" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="endDate" 
                               value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="cashier" class="form-label">Kasir</label>
                        <select class="form-select" id="cashier">
                            <option value="">Semua Kasir</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir 1</option>
                            <option value="3">Kasir 2</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-filter me-2"></i>Filter
                        </button>
                    </div>
                </div>

                <!-- Statistik -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Total Transaksi</h6>
                                        <h3 class="mb-0">128</h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-receipt-cutoff" style="font-size: 2rem; color: #198754;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Total Pendapatan</h6>
                                        <h3 class="mb-0">RP 4.2M</h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-cash-coin" style="font-size: 2rem; color: #0d6efd;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Rata-rata/Transaksi</h6>
                                        <h3 class="mb-0">RP 32,800</h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-graph-up" style="font-size: 2rem; color: #0dcaf0;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Produk Terjual</h6>
                                        <h3 class="mb-0">542</h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-cart-check" style="font-size: 2rem; color: #ffc107;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Transaksi -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Invoice No</th>
                                <th>Tanggal</th>
                                <th>Kasir</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Transaksi 1 -->
                            <tr>
                                <td>1</td>
                                <td>
                                    <strong>INV-2024-00123</strong>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i') }}
                                </td>
                                <td>
                                    <span class="badge bg-info">Admin</span>
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
                                    <div class="btn-group btn-group-sm">
                                        <a href="/pos/print" class="btn btn-outline-primary" 
                                           data-bs-toggle="tooltip" title="Cetak Ulang">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info"
                                           data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Transaksi 2 -->
                            <tr>
                                <td>2</td>
                                <td>
                                    <strong>INV-2024-00122</strong>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i', strtotime('-1 hour')) }}
                                </td>
                                <td>
                                    <span class="badge bg-info">Kasir 1</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">5 items</span>
                                </td>
                                <td>
                                    <strong>RP 75,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-primary">QRIS</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/pos/print" class="btn btn-outline-primary">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Transaksi 3 -->
                            <tr>
                                <td>3</td>
                                <td>
                                    <strong>INV-2024-00121</strong>
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i', strtotime('-2 hour')) }}
                                </td>
                                <td>
                                    <span class="badge bg-info">Admin</span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">2 items</span>
                                </td>
                                <td>
                                    <strong>RP 30,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success">Tunai</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/pos/print" class="btn btn-outline-primary">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
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
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
