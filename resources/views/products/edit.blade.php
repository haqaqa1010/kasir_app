@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Edit Produk
                </h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <!-- Barcode -->
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" class="form-control" id="barcode" 
                                   value="8997009510023" required>
                        </div>

                        <!-- Nama Produk -->
                        <div class="col-md-6 mb-3">
                            <label for="productName" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="productName" 
                                   value="Kopi Hitam" required>
                        </div>

                        <!-- Harga -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">RP</span>
                                <input type="number" class="form-control" id="price" 
                                       value="15000" required>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stock" 
                                   value="25" required>
                        </div>

                        <!-- Kategori -->
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" id="category">
                                <option value="minuman" selected>Minuman</option>
                                <option value="makanan">Makanan</option>
                                <option value="snack">Snack</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active" selected>Aktif</option>
                                <option value="inactive">Non-Aktif</option>
                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12 mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3">
Kopi hitam dengan rasa pahit yang khas, cocok untuk penggemar kopi asli.
                            </textarea>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between">
                        <a href="/products" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <div>
                            <button type="button" class="btn btn-danger me-2">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection