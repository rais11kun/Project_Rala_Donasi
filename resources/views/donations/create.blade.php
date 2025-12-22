<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Donasi - Bersama Untuk Hari Esok</title>
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

        .form-wrapper { width: 100%; max-width: 500px; }

        .accent-line { width: 60px; height: 4px; background: var(--primary-orange); margin-bottom: 20px; border-radius: 2px; }

        /* Label Design Menarik */
        .form-label {
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-teal);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .form-label::before {
            content: ""; width: 5px; height: 5px; background: var(--primary-orange); border-radius: 50%; display: inline-block;
        }

        .form-control, .form-select {
            padding: 12px 15px; border-radius: 12px; border: 1px solid #eee; background-color: #fcfcfc; transition: 0.3s;
        }

        .form-control:focus { box-shadow: 0 0 0 4px rgba(251, 176, 52, 0.1); border-color: var(--primary-orange); background: #fff; }

        .btn-submit {
            background-color: var(--primary-orange); border: none; padding: 16px; border-radius: 12px;
            font-weight: 800; color: white; width: 100%; transition: 0.3s;
            text-transform: uppercase; letter-spacing: 1.5px; margin-top: 10px;
        }

        .btn-submit:hover { background-color: #e59f2d; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(251, 176, 52, 0.25); }

        /* Desain Notifikasi Sukses */
        .alert-success-custom {
            background-color: #e7f3f2;
            border: none;
            border-left: 5px solid var(--primary-teal);
            color: var(--primary-teal);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
        }

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
            
            @if (session('success'))
                <div class="alert alert-success-custom shadow-sm mb-4 animate__animated animate__fadeIn">
                    <div class="me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Donasi Berhasil Terkirim!</h6>
                        <small>Terima kasih atas kebaikan Anda. Tim kami akan segera memprosesnya.</small>
                    </div>
                </div>
            @endif

            <div class="accent-line"></div>
            <h2 class="fw-bold mb-4">Formulir Donasi</h2>

            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm mb-4 small">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Program Donasi</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Bantuan Pendidikan Anak" required>
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
                        <input type="number" name="amount" class="form-control" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Catatan / Doa Baik</label>
                    <textarea name="note" class="form-control" rows="3" placeholder="Tuliskan harapan Anda..."></textarea>
                </div>

                <div class="mb-5">
                    <label class="form-label">Bukti Transfer</label>
                    <input type="file" name="proof_image" class="form-control" accept="image/*" style="border: 2px dashed #ddd; background: #fafafa;">
                </div>

                <button type="submit" class="btn btn-submit shadow-sm">
                    Konfirmasi Donasi
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>