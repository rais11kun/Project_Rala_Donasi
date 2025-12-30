<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - GIVEHOPE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8f9fa; }
        .qr-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            max-width: 500px;
            margin: auto;
        }
        .amount-box {
            background-color: #f0f7f6;
            border: 2px dashed #126d61;
            border-radius: 15px;
            padding: 20px;
            color: #126d61;
        }
        .btn-finish {
            background-color: #fbb034;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 700;
            transition: 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-finish:hover { background-color: #e69d2a; color: white; }
        .qr-image {
            width: 100%;
            max-width: 250px;
            border: 10px solid #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="qr-card text-center">
        <div class="mb-4">
            <h4 class="fw-800 mb-1">Hampir Selesai!</h4>
            <p class="text-muted">Infaq/Donasi: <strong>{{ ucfirst($category) }}</strong></p>
        </div>

        <div class="amount-box mb-4">
            <p class="mb-1 small fw-bold text-uppercase" style="letter-spacing: 1px;">Total Pembayaran</p>
            <h2 class="fw-800 mb-0">Rp {{ number_format($amount, 0, ',', '.') }}</h2>
        </div>

        <div class="mb-4">
            <p class="small text-muted mb-3">Silakan scan kode QRIS di bawah ini melalui aplikasi e-wallet (OVO, Dana, GoPay) atau Mobile Banking Anda.</p>
            
            {{-- PERHATIKAN PATH GAMBAR INI --}}
            <img src="{{ asset('asset-landing/img/qr-givehope.png') }}" 
                 class="qr-image" 
                 alt="QRIS GIVEHOPE"
                 onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=GIVEHOPE-DONATION-{{ $amount }}';">
            
            <p class="mt-3 mb-0 fw-bold" style="color: #126d61;">GIVEHOPE FOUNDATION</p>
            <p class="text-muted small">NMID: ID1022233344455</p>
        </div>

        <div class="alert alert-warning py-2 mb-4" style="font-size: 12px; border-radius: 10px;">
            <i class="fas fa-info-circle me-1"></i> Jangan lupa simpan bukti transfer untuk divalidasi oleh staff kami.
        </div>

        <a href="{{ url('/') }}" class="btn-finish shadow-sm">
            Selesai & Kembali
        </a>
    </div>
</div>

</body>
</html>