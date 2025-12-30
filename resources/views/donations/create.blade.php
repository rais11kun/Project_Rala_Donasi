<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Donasi - Bersama Untuk Hari Esok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
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
            margin: 0; padding: 0;
        }

        .split-screen { display: flex; flex-wrap: wrap; min-height: 100vh; }

        .left-side {
            flex: 1;
            background: linear-gradient(rgba(18, 109, 97, 0.85), rgba(18, 109, 97, 0.85)), 
                        url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&q=80');
            background-size: cover; background-position: center;
            display: flex; flex-direction: column; justify-content: center;
            padding: 60px; color: white;
        }

        .right-side {
            flex: 1; background: white;
            display: flex; align-items: center; justify-content: center;
            padding: 40px;
        }

        .form-wrapper { width: 100%; max-width: 550px; }

        .accent-line { width: 60px; height: 4px; background: var(--primary-orange); margin-bottom: 20px; border-radius: 2px; }

        .form-label {
            font-weight: 700; font-size: 0.75rem; text-transform: uppercase;
            letter-spacing: 1px; color: var(--primary-teal); display: flex;
            align-items: center; gap: 8px; margin-bottom: 10px;
        }

        .form-control, .form-select {
            padding: 12px 15px; border-radius: 12px; border: 1px solid #eee; background-color: #fcfcfc; transition: 0.3s;
        }

        .btn-submit {
            background-color: var(--primary-orange); border: none; padding: 16px; border-radius: 12px;
            font-weight: 800; color: white; width: 100%; transition: 0.3s;
            text-transform: uppercase; letter-spacing: 1.5px; margin-top: 10px;
        }

        .btn-submit:hover { background-color: #e59f2d; transform: translateY(-2px); }

        /* Step Logic */
        #step-2 { display: none; }
        .qris-box { border: 1px solid #eee; border-radius: 20px; padding: 20px; text-align: center; background: #fff; }

        @media (max-width: 992px) { .left-side { display: none; } }
    </style>
</head>
<body>

<div class="split-screen">
    <div class="left-side">
        <a href="{{ url('/') }}" style="color: white; text-decoration: none; font-weight: 600; margin-bottom: 40px; display: block;">
            ← Kembali ke Beranda
        </a>
        <h1 class="display-4 fw-bold mb-4">Together for a <br><span style="color: var(--primary-orange);">Better Tomorrow</span></h1>
        <p class="fs-5 opacity-75">Kebaikan Anda hari ini adalah senyum bagi mereka di masa depan.</p>
    </div>

    <div class="right-side">
        <div class="form-wrapper">
            
            <div class="accent-line"></div>
            <h2 class="fw-bold mb-4" id="form-title">Formulir Donasi</h2>

            <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data" id="donation-form">
                @csrf

                <div id="step-1">
                    <div class="mb-4">
                        <label class="form-label">Program Donasi</label>
                        <input type="text" name="title" id="input_title" class="form-control" placeholder="Contoh: Bantuan Pendidikan" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Pilih Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="" disabled selected>Pilih...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jumlah (Rp)</label>
                            <input type="number" name="amount" id="input_amount" class="form-control" placeholder="0" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Catatan / Doa Baik</label>
                        <textarea name="note" class="form-control" rows="3" placeholder="Tuliskan harapan Anda..."></textarea>
                    </div>

                    <button type="button" class="btn btn-submit shadow-sm" onclick="goToStep2()">
                        Lanjut ke Pembayaran
                    </button>
                </div>

                <div id="step-2">
                    <div class="text-center mb-4">
                        <p class="text-muted mb-1">Silakan scan & bayar tepat sejumlah:</p>
                        <h2 class="fw-800" id="display_amount" style="font-weight: 800; color: var(--primary-teal);"></h2>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-5">
                            <div class="qris-box shadow-sm border">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_QRIS.svg" height="20" class="mb-2">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=QRIS-DONASI-AYOBANTU" class="img-fluid mb-2">
                                <small class="text-muted d-block" style="font-size: 10px;">OVO | GOPAY | DANA | LINKAJA</small>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label class="form-label">Unggah Bukti Transfer</label>
                                <input type="file" name="proof_image" class="form-control" accept="image/*" required style="border: 2px dashed #fbb034; background: #fffaf0;">
                                <small class="text-muted mt-2 d-block">Mohon unggah screenshot/foto bukti bayar Anda.</small>
                            </div>
                            <div class="p-3 bg-light rounded-3">
                                <small class="fw-bold d-block mb-1">Cara Bayar:</small>
                                <ul class="small text-muted ps-3 mb-0">
                                    <li>Scan QRIS dengan aplikasi e-wallet</li>
                                    <li>Pastikan nominal sesuai</li>
                                    <li>Simpan bukti bayar & unggah di sini</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-submit shadow-sm">
                        Konfirmasi & Kirim Donasi
                    </button>
                    <button type="button" class="btn btn-link w-100 mt-2 text-muted text-decoration-none small" onclick="goToStep1()">
                        ← Ubah Data Donasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function goToStep2() {
        const title = document.getElementById('input_title').value;
        const amount = document.getElementById('input_amount').value;

        if(!title || !amount || amount < 1000) {
            alert('Mohon lengkapi data dan isi nominal minimal Rp 1.000');
            return;
        }

        // Format angka ke Rupiah
        const formattedAmount = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(amount);

        // Update UI
        document.getElementById('display_amount').innerText = formattedAmount;
        document.getElementById('form-title').innerText = "Konfirmasi Pembayaran";
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }

    function goToStep1() {
        document.getElementById('form-title').innerText = "Formulir Donasi";
        document.getElementById('step-1').style.display = 'block';
        document.getElementById('step-2').style.display = 'none';
    }
</script>

</body>
</html>