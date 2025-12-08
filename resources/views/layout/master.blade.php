<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APLIKASI POS KASIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            height: calc(100vh - 60px);
            background-color: #0d324b;
        }
        .sidebar a {
            color: #fff;
            padding: 18px;
            display: block;
            font-size: 1.2rem;
            text-decoration: none;
        }
        .sidebar a.active {
            background-color: #3c627d;
        }
        .sidebar a:hover {
            background-color: #244861;
        }
        .content-area {
            background-color: #e6e6e6;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }
        .navbar-custom {
            height: 60px;
            background-color: #333c42;
        }
        .navbar-brand {
            color: white !important;
            font-size: 1.5rem;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-custom d-flex justify-content-center">
        <span class="navbar-brand mb-0">APLIKASI POS KASIR</span>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="/">Dashboard</a>
            <a href="/produk">Product</a>
            <a href="/transaksi">Transaksi Baru</a>
            <a href="/riwayat">Riwayat Transaksi</a>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 content-area p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
