//views/pos/print
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 14px;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
        }
        
        @media print {
            body {
                max-width: 100% !important;
            }
        }
        
        .receipt-header {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        
        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .receipt-total {
            border-top: 1px dashed #000;
            margin-top: 10px;
            padding-top: 10px;
            font-weight: bold;
        }
        
        .text-center {
            text-align: center;
        }
        
        .thank-you {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Struk -->
    <div class="receipt">
        <div class="receipt-header">
            <h4 style="margin: 0;">TOKO MAKMUR JAYA</h4>
            <p style="margin: 5px 0; font-size: 12px;">
                Jl. Merdeka No. 123, Jakarta<br>
                Telp: 021-12345678
            </p>
            <p style="margin: 5px 0; font-size: 12px;">
                {{ date('d/m/Y H:i:s') }}
            </p>
        </div>

        <!-- Detail Transaksi -->
        <div style="margin-bottom: 15px;">
            <p style="margin: 5px 0;">
                <strong>No. Invoice:</strong> INV-2024-00123<br>
                <strong>Kasir:</strong> Admin
            </p>
        </div>

        <!-- Daftar Produk -->
        <div style="margin-bottom: 15px;">
            <div class="receipt-item">
                <span>Kopi Hitam (2x)</span>
                <span>RP 30,000</span>
            </div>
            <div class="receipt-item">
                <span>Teh Manis (1x)</span>
                <span>RP 10,000</span>
            </div>
        </div>

        <!-- Total -->
        <div class="receipt-total">
            <div class="receipt-item">
                <span>Total:</span>
                <span>RP 40,000</span>
            </div>
            <div class="receipt-item">
                <span>Tunai:</span>
                <span>RP 50,000</span>
            </div>
            <div class="receipt-item">
                <span>Kembali:</span>
                <span>RP 10,000</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="thank-you">
            <p>Terima kasih telah berbelanja</p>
            <p>Barang yang sudah dibeli<br>tidak dapat ditukar/dikembalikan</p>
        </div>
    </div>

    <!-- Tombol Print -->
    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer me-2"></i>Cetak Struk
        </button>
        <a href="/pos" class="btn btn-secondary ms-2">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <script>
        // Auto print saat halaman dimuat (opsional)
        window.onload = function() {
            // Uncomment baris berikut untuk auto print
            // window.print();
        };
    </script>
</body>
</html>
