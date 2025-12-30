<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Bersama Untuk Hari Esok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-orange: #fbb034;
            --primary-teal: #126d61;
            --bg-cream: #fdfaf5;
            --text-dark: #1a1a1a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-cream);
            color: var(--text-dark);
            padding: 40px 20px;
        }

        .confirmation-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        .qris-box {
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }

        .amount-display {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .label-custom {
            color: #888;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .info-value {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.1rem;
        }

        .instruction-step {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
        }

        .btn-download {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-download:hover { background-color: #5a6268; color: white; }
    </style>
</head>
<body>

<div class="confirmation-card">
    <div class="text-center mb-5">
        <h3 style="color: var(--primary-teal); font-weight: 800; letter-spacing: -1px;">ayobantu</h3>
        <p class="text-muted mb-1 mt-4">Nominal yang perlu dibayarkan sejumlah</p>
        <div class="amount-display">Rp{{ number_format($donation->amount, 0, ',', '.') }}</div>
    </div>

    <div class="row g-5">
        <div class="col-md-5">
            <div class="qris-box">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=ContohQRISDonasi" alt="QRIS Code" class="img-fluid mb-3">
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <span class="badge bg-light text-dark border">OVO</span>
                    <span class="badge bg-light text-dark border">GOPAY</span>
                    <span class="badge bg-light text-dark border">DANA</span>
                </div>
                <button class="btn btn-download w-100">Download QRIS</button>
            </div>
        </div>

        <div class="col-md-7">
            <div class="mb-4">
                <div class="label-custom">Campaign</div>
                <div class="info-value text-teal" style="color: var(--primary-teal)">{{ $donation->title }}</div>
            </div>

            <div class="mb-4">
                <div class="label-custom">Oleh</div>
                <div class="info-value d-flex align-items-center gap-2">
                    Bersama Kita Bisa 
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#0d6efd" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                </div>
            </div>

            <div class="mb-4">
                <div class="label-custom">Batas Akhir Pembayaran (GMT+7)</div>
                <div class="info-value">{{ now()->addDay()->translatedFormat('l, d F Y H:i') }} WIB</div>
            </div>

            <div class="instruction-step">
                <h6 class="fw-bold mb-3">Cara Bayar</h6>
                <ol class="small text-muted ps-3 mb-0" style="line-height: 1.8;">
                    <li>Buka aplikasi dompet digital Anda (Gopay/OVO/DANA/dll)</li>
                    <li>Pilih menu <strong>Scan / Bayar</strong></li>
                    <li>Scan <strong>Barcode QRIS</strong> yang tersedia</li>
                    <li>Konfirmasi nama dan nominal pembayaran</li>
                    <li>Masukkan <strong>PIN</strong> Anda</li>
                </ol>
            </div>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="text-decoration-none small fw-bold" style="color: var(--primary-teal)">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>