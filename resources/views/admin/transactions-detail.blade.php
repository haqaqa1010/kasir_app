@extends('layouts.admin')

@section('title', 'Detail Transaksi')
@section('page-title', 'Detail Transaksi')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <!-- Transaction Details -->
        <div class="card dashboard-card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-receipt me-2"></i>Detail Transaksi
                </h5>
                <div>
                    <span class="badge bg-success me-2">Selesai</span>
                    <span class="badge bg-primary">Tunai</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="140">No. Invoice</th>
                                <td><strong>INV-2024-00123</strong></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ date('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Kasir</th>
                                <td>
                                    <span class="badge bg-info">Kasir-Admin</span>
                                    (Shift: Pagi)
                                </td>
                            </tr>
                            <tr>
                                <th>Shift</th>
                                <td>Pagi (08:00 - 16:00)</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="140">Total Items</th>
                                <td><strong>3 items</strong></td>
                            </tr>
                            <tr>
                                <th>Subtotal</th>
                                <td>RP 40,000</td>
                            </tr>
                            <tr>
                                <th>Pajak</th>
                                <td>RP 0</td>
                            </tr>
                            <tr>
                                <th><h5 class="mb-0">Total</h5></th>
                                <td><h5 class="mb-0 text-primary">RP 40,000</h5></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Items List -->
                <h6 class="mb-3">Items yang Dibeli</h6>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3">
                                            <i class="bi bi-cup-straw" style="font-size: 1.5rem; color: #4361ee;"></i>
                                        </div>
                                        <div>
                                            <strong>Kopi Hitam</strong><br>
                                            <small class="text-muted">Barcode: 8997009510023</small>
                                        </div>
                                    </div>
                                </td>
                                <td>RP 15,000</td>
                                <td>2</td>
                                <td><strong>RP 30,000</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3">
                                            <i class="bi bi-cup" style="font-size: 1.5rem; color: #4361ee;"></i>
                                        </div>
                                        <div>
                                            <strong>Teh Manis</strong><br>
                                            <small class="text-muted">Barcode: 8997009510024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>RP 10,000</td>
                                <td>1</td>
                                <td><strong>RP 10,000</strong></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td><strong class="text-primary">RP 40,000</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-cash-stack me-2"></i>Detail Pembayaran
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Metode Pembayaran</label>
                            <p class="form-control-plaintext">Tunai</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Uang Dibayar</label>
                            <p class="form-control-plaintext">RP 50,000</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <p class="form-control-plaintext text-success fw-bold">RP 10,000</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran</label>
                            <p>
                                <span class="badge bg-success">Lunas</span>
                                <small class="text-muted ms-2">{{ date('H:i:s') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Actions -->
        <div class="card dashboard-card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-gear me-2"></i>Aksi
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary">
                        <i class="bi bi-printer me-2"></i>Cetak Ulang Struk
                    </button>
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-send me-2"></i>Kirim ke Email Customer
                    </button>
                    <button class="btn btn-outline-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Transaksi
                    </button>
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-x-circle me-2"></i>Batalkan Transaksi
                    </button>
                </div>
            </div>
        </div>

        <!-- Receipt Preview -->
        <div class="card dashboard-card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-receipt-cutoff me-2"></i>Pratinjau Struk
                </h5>
            </div>
            <div class="card-body">
                <div class="receipt-preview border p-3" style="font-family: 'Courier New', monospace; font-size: 12px;">
                    <div class="text-center mb-2">
                        <strong>TOKO MAKMUR JAYA</strong><br>
                        Jl. Merdeka No. 123, Jakarta<br>
                        Telp: 021-12345678
                    </div>
                    <hr class="my-2">
                    <div class="mb-2">
                        <strong>INV-2024-00123</strong><br>
                        {{ date('d/m/Y H:i:s') }}<br>
                        Kasir: Admin
                    </div>
                    <hr class="my-2">
                    <div>
                        <div class="d-flex justify-content-between">
                            <span>Kopi Hitam (2x)</span>
                            <span>RP 30,000</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Teh Manis (1x)</span>
                            <span>RP 10,000</span>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div>
                        <div class="d-flex justify-content-between">
                            <span>Total:</span>
                            <span>RP 40,000</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tunai:</span>
                            <span>RP 50,000</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Kembali:</span>
                            <span>RP 10,000</span>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="text-center mt-2">
                        Terima kasih telah berbelanja
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="card dashboard-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-info-circle me-2"></i>Informasi Tambahan
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Catatan Transaksi</label>
                    <textarea class="form-control" rows="3" placeholder="Tambah catatan..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diperbarui Terakhir</label>
                    <p class="form-control-plaintext">{{ date('d F Y H:i:s') }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dibuat Oleh</label>
                    <p class="form-control-plaintext">
                        <span class="badge bg-info">Kasir-Admin</span>
                        (User ID: 1)
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back Button -->
<div class="mt-4">
    <a href="/admin/transactions" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Transaksi
    </a>
</div>
@endsection