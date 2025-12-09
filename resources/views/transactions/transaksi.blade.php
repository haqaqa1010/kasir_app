@extends('layouts.app')

@section('title', 'Transaksi Hari Ini')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar3 me-2"></i>Transaksi Hari Ini
                    <small class="ms-2">({{ date('d F Y') }})</small>
                </h5>
            </div>
            <div class="card-body">
                <!-- Today's Summary -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card border-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Transaksi Hari Ini</h6>
                                        <h2 class="mb-0" id="todayCount">0</h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-receipt" style="font-size: 2.5rem; color: #198754;"></i>
                                    </div>
                                </div>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>Shift: 
                                    <span id="currentShift">Pagi</span>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="card border-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Total Pendapatan</h6>
                                        <h2 class="mb-0" id="todayRevenue">RP 0</h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-cash-coin" style="font-size: 2.5rem; color: #0d6efd;"></i>
                                    </div>
                                </div>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up-right me-1"></i>
                                    Update terakhir: <span id="lastUpdate">{{ date('H:i') }}</span>
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="card border-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted">Produk Terjual</h6>
                                        <h2 class="mb-0" id="productsSold">0</h2>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="bi bi-cart-check" style="font-size: 2.5rem; color: #ffc107;"></i>
                                    </div>
                                </div>
                                <small class="text-muted">
                                    <i class="bi bi-person me-1"></i>Kasir: 
                                    <span id="cashierName">Kasir 1</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Transactions Message (Default) -->
                <div id="noTransactions" class="text-center py-5">
                    <i class="bi bi-receipt" style="font-size: 4rem; color: #dee2e6;"></i>
                    <h4 class="mt-3 text-muted">Belum ada transaksi hari ini</h4>
                    <p class="text-muted">Transaksi yang Anda buat hari ini akan muncul di sini</p>
                    <a href="/pos" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Buat Transaksi Pertama
                    </a>
                </div>

                <!-- Transactions Table (Hidden by default) -->
                <div id="transactionsTable" class="d-none">
                    <!-- Quick Stats -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="alert alert-light py-2">
                                <small class="text-muted">Transaksi Pertama</small>
                                <div class="fw-bold" id="firstTransaction">--:--</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-light py-2">
                                <small class="text-muted">Transaksi Terakhir</small>
                                <div class="fw-bold" id="lastTransaction">--:--</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-light py-2">
                                <small class="text-muted">Rata-rata/Transaksi</small>
                                <div class="fw-bold" id="averageTransaction">RP 0</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-light py-2">
                                <small class="text-muted">Status</small>
                                <div>
                                    <span class="badge bg-success" id="shiftStatus">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transactions List -->
                    <div class="table-responsive mb-4">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">No</th>
                                    <th>Waktu</th>
                                    <th>Invoice</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Metode</th>
                                    <th width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="transactionsBody">
                                <!-- Data akan diisi via JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Export Options -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">
                                        <i class="bi bi-file-earmark-text me-2"></i>Ringkasan Hari Ini
                                    </h6>
                                    <small class="text-muted">Export data transaksi hari ini</small>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm me-2" id="printTodayBtn">
                                        <i class="bi bi-printer me-1"></i>Cetak
                                    </button>
                                    <button class="btn btn-primary btn-sm" id="exportTodayBtn">
                                        <i class="bi bi-download me-1"></i>Export
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Transaction Details -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-receipt me-2"></i>Detail Transaksi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="transactionDetailContent">
                <!-- Detail akan diisi via JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="printReceipt()">
                    <i class="bi bi-printer me-2"></i>Cetak Ulang
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Simple styling for today's transactions */
    .transaction-row {
        transition: background-color 0.2s;
    }
    
    .transaction-row:hover {
        background-color: rgba(67, 97, 238, 0.05);
    }
    
    .time-badge {
        font-size: 0.85rem;
        padding: 4px 10px;
        border-radius: 20px;
    }
    
    .time-morning {
        background-color: #e3f2fd;
        color: #1565c0;
    }
    
    .time-afternoon {
        background-color: #fff3e0;
        color: #f57c00;
    }
    
    .time-evening {
        background-color: #f3e5f5;
        color: #7b1fa2;
    }
    
    /* Status indicator */
    .status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    
    .status-completed {
        background-color: #28a745;
    }
    
    .status-pending {
        background-color: #ffc107;
    }
    
    /* Empty state */
    .empty-state-icon {
        opacity: 0.3;
    }
</style>
@endsection

@section('scripts')
<script>
    // Data untuk transaksi hari ini (simulasi)
    let todayTransactions = [];
    
    // Format currency
    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    }
    
    // Get time indicator class
    function getTimeClass(hour) {
        const h = parseInt(hour);
        if (h >= 5 && h < 12) return 'time-morning';
        if (h >= 12 && h < 17) return 'time-afternoon';
        return 'time-evening';
    }
    
    // Load today's transactions
    function loadTodayTransactions() {
        // Simulasi data - dalam aplikasi nyata, ini akan diambil dari API
        const now = new Date();
        const currentHour = now.getHours();
        
        // Generate sample data for today
        todayTransactions = [
            {
                id: 1,
                invoice: 'INV-' + now.getFullYear() + '-' + String(now.getDate()).padStart(3, '0') + '001',
                time: now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0'),
                items: 3,
                total: 85000,
                method: 'Tunai',
                status: 'completed',
                details: [
                    { name: 'Kopi Hitam', qty: 2, price: 15000 },
                    { name: 'Teh Manis', qty: 1, price: 10000 }
                ]
            }
        ];
        
        // Add more sample transactions throughout the day
        for (let i = 2; i <= 5; i++) {
            const hour = Math.max(8, currentHour - i + 1);
            todayTransactions.push({
                id: i,
                invoice: 'INV-' + now.getFullYear() + '-' + String(now.getDate()).padStart(3, '0') + String(100 + i).slice(-3),
                time: hour + ':' + String(Math.floor(Math.random() * 60)).padStart(2, '0'),
                items: Math.floor(Math.random() * 5) + 1,
                total: Math.floor(Math.random() * 200000) + 10000,
                method: ['Tunai', 'QRIS', 'Transfer'][Math.floor(Math.random() * 3)],
                status: 'completed',
                details: [
                    { name: 'Kopi Hitam', qty: Math.floor(Math.random() * 3) + 1, price: 15000 },
                    { name: 'Teh Manis', qty: Math.floor(Math.random() * 2) + 1, price: 10000 }
                ]
            });
        }
        
        // Sort by time (newest first)
        todayTransactions.sort((a, b) => {
            const timeA = a.time.split(':');
            const timeB = b.time.split(':');
            return (parseInt(timeB[0]) * 60 + parseInt(timeB[1])) - (parseInt(timeA[0]) * 60 + parseInt(timeA[1]));
        });
        
        updateDisplay();
    }
    
    // Update display based on transactions
    function updateDisplay() {
        const noTransactionsDiv = document.getElementById('noTransactions');
        const transactionsTableDiv = document.getElementById('transactionsTable');
        
        if (todayTransactions.length === 0) {
            noTransactionsDiv.classList.remove('d-none');
            transactionsTableDiv.classList.add('d-none');
            return;
        }
        
        noTransactionsDiv.classList.add('d-none');
        transactionsTableDiv.classList.remove('d-none');
        
        // Update statistics
        updateStatistics();
        
        // Render transactions table
        renderTransactionsTable();
    }
    
    // Update statistics
    function updateStatistics() {
        if (todayTransactions.length === 0) return;
        
        let totalRevenue = 0;
        let totalProducts = 0;
        let firstTime = todayTransactions[todayTransactions.length - 1].time;
        let lastTime = todayTransactions[0].time;
        
        todayTransactions.forEach(transaction => {
            totalRevenue += transaction.total;
            totalProducts += transaction.items;
        });
        
        const average = totalRevenue / todayTransactions.length;
        
        // Update counters
        document.getElementById('todayCount').textContent = todayTransactions.length;
        document.getElementById('todayRevenue').textContent = formatCurrency(totalRevenue);
        document.getElementById('productsSold').textContent = totalProducts;
        document.getElementById('firstTransaction').textContent = firstTime;
        document.getElementById('lastTransaction').textContent = lastTime;
        document.getElementById('averageTransaction').textContent = formatCurrency(average);
        
        // Update shift status based on current time
        const now = new Date();
        const hour = now.getHours();
        const shiftStatus = document.getElementById('shiftStatus');
        
        if (hour >= 8 && hour < 16) {
            shiftStatus.textContent = 'Shift Pagi';
            shiftStatus.className = 'badge bg-success';
        } else if (hour >= 16 && hour < 20) {
            shiftStatus.textContent = 'Shift Siang';
            shiftStatus.className = 'badge bg-warning';
        } else {
            shiftStatus.textContent = 'Shift Selesai';
            shiftStatus.className = 'badge bg-secondary';
        }
    }
    
    // Render transactions table
    function renderTransactionsTable() {
        const tbody = document.getElementById('transactionsBody');
        let html = '';
        
        todayTransactions.forEach((transaction, index) => {
            const timeParts = transaction.time.split(':');
            const timeClass = getTimeClass(timeParts[0]);
            const methodClass = transaction.method === 'Tunai' ? 'bg-success' : 
                               transaction.method === 'QRIS' ? 'bg-primary' : 'bg-purple';
            
            html += `
                <tr class="transaction-row">
                    <td>${index + 1}</td>
                    <td>
                        <span class="time-badge ${timeClass}">
                            <i class="bi bi-clock me-1"></i>${transaction.time}
                        </span>
                    </td>
                    <td>
                        <strong>${transaction.invoice}</strong>
                    </td>
                    <td>
                        <span class="badge bg-secondary">${transaction.items} items</span>
                    </td>
                    <td>
                        <strong>${formatCurrency(transaction.total)}</strong>
                    </td>
                    <td>
                        <span class="badge ${methodClass}">${transaction.method}</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="showTransactionDetail(${transaction.id})">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        
        tbody.innerHTML = html;
    }
    
    // Show transaction detail modal
    function showTransactionDetail(transactionId) {
        const transaction = todayTransactions.find(t => t.id === transactionId);
        if (!transaction) return;
        
        const modalContent = document.getElementById('transactionDetailContent');
        
        // Build items list
        let itemsHtml = '';
        let itemsTotal = 0;
        transaction.details.forEach(item => {
            const subtotal = item.qty * item.price;
            itemsTotal += subtotal;
            itemsHtml += `
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <span class="fw-bold">${item.name}</span>
                        <br>
                        <small class="text-muted">${item.qty} x ${formatCurrency(item.price)}</small>
                    </div>
                    <div class="fw-bold">
                        ${formatCurrency(subtotal)}
                    </div>
                </div>
            `;
        });
        
        const detailHtml = `
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">${transaction.invoice}</h6>
                    <span class="badge ${transaction.status === 'completed' ? 'bg-success' : 'bg-warning'}">
                        ${transaction.status === 'completed' ? 'Selesai' : 'Pending'}
                    </span>
                </div>
                <small class="text-muted">
                    <i class="bi bi-clock me-1"></i>${transaction.time} • 
                    <i class="bi bi-cash-coin me-1"></i>${transaction.method}
                </small>
            </div>
            
            <hr>
            
            <h6 class="mb-3">Items:</h6>
            ${itemsHtml}
            
            <hr>
            
            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total:</span>
                <span class="text-primary">${formatCurrency(transaction.total)}</span>
            </div>
            
            <div class="mt-3">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Transaksi ini tercatat dalam sistem hari ini
                </small>
            </div>
        `;
        
        modalContent.innerHTML = detailHtml;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('transactionDetailModal'));
        modal.show();
    }
    
    // Print receipt
    function printReceipt() {
        alert('Fitur cetak struk akan membuka jendela print...');
        window.print();
    }
    
    // Export today's transactions
    document.getElementById('exportTodayBtn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Exporting...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
            
            if (todayTransactions.length === 0) {
                alert('Tidak ada data transaksi hari ini untuk diexport');
                return;
            }
            
            // Create CSV content
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "No,Invoice,Waktu,Items,Total,Metode\n";
            
            todayTransactions.forEach((transaction, index) => {
                csvContent += `${index + 1},${transaction.invoice},${transaction.time},${transaction.items},${transaction.total},${transaction.method}\n`;
            });
            
            // Create download link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `transaksi_hariini_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }, 1000);
    });
    
    // Print today's summary
    document.getElementById('printTodayBtn').addEventListener('click', function() {
        if (todayTransactions.length === 0) {
            alert('Tidak ada transaksi hari ini untuk dicetak');
            return;
        }
        
        // Open print dialog
        window.print();
    });
    
    // Update current time
    function updateCurrentTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit'
        });
        document.getElementById('lastUpdate').textContent = timeString;
        
        // Update shift display
        const hour = now.getHours();
        const shiftElement = document.getElementById('currentShift');
        
        if (hour >= 8 && hour < 16) {
            shiftElement.textContent = 'Pagi (08-16)';
        } else if (hour >= 16 && hour < 20) {
            shiftElement.textContent = 'Siang (16-20)';
        } else {
            shiftElement.textContent = 'Malam (20-04)';
        }
    }
    
    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Load today's transactions
        loadTodayTransactions();
        
        // Update time
        updateCurrentTime();
        setInterval(updateCurrentTime, 60000); // Update every minute
        
        // Get cashier name from localStorage
        const rememberedUser = localStorage.getItem('rememberedUser');
        if (rememberedUser) {
            document.getElementById('cashierName').textContent = rememberedUser;
        } else {
            document.getElementById('cashierName').textContent = 'Kasir';
        }
        
        // Simulate new transaction every 2 minutes (for demo)
        setInterval(() => {
            // In real app, this would check server for new transactions
            console.log('Checking for new transactions...');
        }, 120000);
    });
</script>
@endsection