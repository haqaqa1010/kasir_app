<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'POS Kasir')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Navbar */
        .navbar-admin {
            background: linear-gradient(135deg, #2b2d42 0%, #1a1c2b 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }
        
        .navbar-brand .logo-icon {
            font-size: 1.8rem;
            color: #4cc9f0;
            margin-right: 10px;
        }
        
        /* Main Content */
        .main-content {
            padding: 20px;
            margin-top: 20px;
        }
        
        /* Cards */
        .dashboard-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items-center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        
        /* Stats Cards */
        .stats-card-1 .card-icon { background-color: rgba(67, 97, 238, 0.1); color: #4361ee; }
        .stats-card-2 .card-icon { background-color: rgba(40, 167, 69, 0.1); color: #28a745; }
        .stats-card-3 .card-icon { background-color: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .stats-card-4 .card-icon { background-color: rgba(220, 53, 69, 0.1); color: #dc3545; }
        
        /* Table */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #dee2e6;
        }
        
        /* Buttons */
        .btn-admin {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
        
        .btn-admin:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        /* Footer */
        .admin-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 20px;
            margin-top: 40px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-admin">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin/dashboard">
                <i class="bi bi-speedometer2 logo-icon"></i>
                <span>Admin POS</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white @if(Request::is('admin/dashboard')) active @endif" 
                           href="/admin/dashboard">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(Request::is('admin/products*')) active @endif" 
                           href="/admin/products">
                            <i class="bi bi-box-seam me-1"></i>Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if(Request::is('admin/reports*')) active @endif" 
                           href="/admin/reports">
                            <i class="bi bi-graph-up me-1"></i>Laporan
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">
                        <i class="bi bi-person-circle me-1"></i>Admin
                    </span>
                    <a href="/pos" class="btn btn-outline-light btn-sm me-2">
                        <i class="bi bi-cash-register me-1"></i>Ke Kasir
                    </a>
                   <!-- Di dalam navbar admin -->
<a href="/logout" class="btn btn-outline-danger btn-sm">
    <i class="bi bi-box-arrow-right me-1"></i>Logout
</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid main-content">
        @yield('content')
        
        <!-- Footer -->
        <footer class="admin-footer">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">
                        &copy; 2024 POS Kasir System v2.0
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">
                        <i class="bi bi-server me-1"></i> Status: 
                        <span class="text-success">Online</span> 
                        | Terakhir update: <span id="lastUpdate">{{ date('H:i:s') }}</span>
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Update last update time
        function updateLastUpdateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('lastUpdate').textContent = timeString;
        }
        
        // Update every minute
        setInterval(updateLastUpdateTime, 60000);
    </script>
    
    @yield('scripts')
</body>
</html>