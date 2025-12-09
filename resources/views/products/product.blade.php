@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-box-seam me-2"></i>Daftar Produk
                </h5>
                <a href="#" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Produk
                </a>
            </div>
            <div class="card-body">
                <!-- Filter dan Pencarian -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari produk...">
                            <button class="btn btn-outline-primary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-filter me-1"></i>Filter
                        </button>
                    </div>
                </div>

                <!-- Tabel Produk -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Barcode</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Produk 1 -->
                            <tr>
                                <td>1</td>
                                <td>
                                    <span class="badge bg-light text-dark">8997009510023</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3">
                                            <i class="bi bi-cup-straw" style="font-size: 1.5rem; color: #4361ee;"></i>
                                        </div>
                                        <div>
                                            <strong>Kopi Hitam</strong><br>
                                            <small class="text-muted">Minuman</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong>RP 15,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success">25</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/products/edit" class="btn btn-outline-primary" 
                                           data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/products/hapus" class="btn btn-outline-danger"
                                           data-bs-toggle="tooltip" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info"
                                           data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Produk 2 -->
                            <tr>
                                <td>2</td>
                                <td>
                                    <span class="badge bg-light text-dark">8997009510024</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3">
                                            <i class="bi bi-cup" style="font-size: 1.5rem; color: #4361ee;"></i>
                                        </div>
                                        <div>
                                            <strong>Teh Manis</strong><br>
                                            <small class="text-muted">Minuman</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong>RP 10,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-success">42</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Produk 3 -->
                            <tr>
                                <td>3</td>
                                <td>
                                    <span class="badge bg-light text-dark">8997009510025</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3">
                                            <i class="bi bi-cake2" style="font-size: 1.5rem; color: #4361ee;"></i>
                                        </div>
                                        <div>
                                            <strong>Roti Bakar</strong><br>
                                            <small class="text-muted">Makanan</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong>RP 20,000</strong>
                                </td>
                                <td>
                                    <span class="badge bg-warning">5</span>
                                </td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-danger">
                                            <i class="bi bi-trash"></i>
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