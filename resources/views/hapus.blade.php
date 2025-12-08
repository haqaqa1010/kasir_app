//views/products/hapus
@extends('layouts.app')

@section('title', 'Hapus Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">
                    <i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
            </div>
            <div class="card-body text-center">
                <!-- Icon Warning -->
                <div class="mb-4">
                    <i class="bi bi-exclamation-circle" style="font-size: 4rem; color: #dc3545;"></i>
                </div>
                
                <!-- Pesan Konfirmasi -->
                <h5 class="mb-3">Apakah Anda yakin ingin menghapus produk ini?</h5>
                
                <!-- Informasi Produk -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded p-3 me-3">
                                <i class="bi bi-cup-straw" style="font-size: 2rem; color: #4361ee;"></i>
                            </div>
                            <div class="text-start">
                                <h6 class="mb-1">Kopi Hitam</h6>
                                <p class="text-muted mb-1">Barcode: 8997009510023</p>
                                <p class="text-muted mb-0">Harga: RP 15,000 | Stok: 25</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Peringatan -->
                <div class="alert alert-warning">
                    <i class="bi bi-info-circle me-2"></i>
                    Data yang telah dihapus tidak dapat dikembalikan.
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-center">
                    <a href="/products" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </a>
                    <button class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>Ya, Hapus Produk
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
