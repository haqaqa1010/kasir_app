//view/pos/payment
@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-cash-stack me-2"></i>Pembayaran
                </h5>
            </div>
            <div class="card-body">
                <!-- Informasi Total -->
                <div class="alert alert-info">
                    <div class="d-flex justify-content-between">
                        <span>Total Belanja:</span>
                        <span class="fw-bold fs-5">RP 40,000</span>
                    </div>
                </div>

                <!-- Form Pembayaran -->
                <form>
                    <!-- Metode Pembayaran -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Metode Pembayaran</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="cash" checked>
                                    <label class="form-check-label" for="cash">
                                        <i class="bi bi-cash-coin me-1"></i> Tunai
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="qris">
                                    <label class="form-check-label" for="qris">
                                        <i class="bi bi-qr-code me-1"></i> QRIS
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="transfer">
                                    <label class="form-check-label" for="transfer">
                                        <i class="bi bi-bank me-1"></i> Transfer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input Uang -->
                    <div class="mb-4">
                        <label for="amountPaid" class="form-label fw-bold">Uang Dibayar</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">RP</span>
                            <input type="number" class="form-control" id="amountPaid" 
                                   value="50000" min="40000" step="1000">
                        </div>
                        <div class="form-text">Masukkan jumlah uang yang dibayarkan customer</div>
                    </div>

                    <!-- Kembalian -->
                    <div class="mb-4">
                        <div class="alert alert-success">
                            <div class="d-flex justify-content-between">
                                <span>Kembalian:</span>
                                <span class="fw-bold fs-4" id="change-amount">RP 10,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-grid gap-2">
                        <a href="/pos/print" class="btn btn-success btn-lg">
                            <i class="bi bi-check-circle me-2"></i>Selesaikan Transaksi
                        </a>
                        <a href="/pos" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Kasir
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Hitung kembalian saat input berubah
    document.getElementById('amountPaid').addEventListener('input', function() {
        const total = 40000; // Total belanja
        const paid = parseInt(this.value) || 0;
        const change = paid - total;
        
        if (change >= 0) {
            document.getElementById('change-amount').textContent = formatRupiah(change);
        } else {
            document.getElementById('change-amount').textContent = formatRupiah(0);
        }
    });
</script>
@endsection
