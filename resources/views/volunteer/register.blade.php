<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Relawan - GIVEHOPE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .btn-primary-custom {
            background-color: #fbb034;
            border: none;
            color: white;
            transition: 0.3s;
        }
        .btn-primary-custom:hover {
            background-color: #e69a1f;
            color: white;
        }
        .text-teal {
            color: #126d61;
        }
        .bg-teal {
            background-color: #126d61;
        }
        .form-control:focus {
            border-color: #126d61;
            box-shadow: 0 0 0 0.25rem rgba(18, 109, 97, 0.1);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mx-auto mb-4" style="max-width: 550px;">
        <a href="{{ url('/') }}" class="text-decoration-none fw-bold text-teal">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
        <h5 class="fw-bold mb-0 text-teal">GIVEHOPE</h5>
    </div>

    <div class="card border-0 shadow-sm mx-auto" style="max-width: 550px; border-radius: 24px; overflow: hidden;">
        <div class="py-2 bg-teal"></div>
        
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <h3 class="fw-bold">Daftar Relawan</h3>
                <p class="text-muted small">Isi data diri Anda untuk bergabung dalam gerakan kebaikan ini.</p>
            </div>

            <form action="{{ route('relawan.simpan') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $id ?? '' }}">

                <div class="mb-3">
                    <label class="form-label fw-bold small">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control py-2" 
                           placeholder="Masukkan nama sesuai KTP" required style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Nomor WhatsApp</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light" style="border-radius: 10px 0 0 10px;">+62</span>
                        <input type="tel" name="whatsapp" class="form-control py-2" 
                               placeholder="8123456789" required style="border-radius: 0 10px 10px 0;">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small">Mengapa Anda ingin bergabung?</label>
                    <textarea name="alasan" class="form-control" rows="3" 
                              placeholder="Ceritakan singkat motivasi Anda..." style="border-radius: 10px;"></textarea>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary-custom fw-bold py-3" style="border-radius: 12px; font-size: 1rem;">
                        Kirim Pendaftaran
                    </button>
                </div>

                <p class="text-center text-muted" style="font-size: 0.75rem;">
                    Dengan mendaftar, Anda setuju untuk dihubungi oleh tim koordinator GIVEHOPE melalui WhatsApp atau Email.
                </p>
            </form>
        </div>
    </div>

    <div class="text-center mt-5">
        <p class="text-muted small">&copy; 2025 GIVEHOPE Foundation. All Rights Reserved.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>