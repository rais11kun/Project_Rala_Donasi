<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi {{ ucfirst($category) }} - GIVEHOPE</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .donation-header {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        .header-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            margin-right: 20px;
        }
        .back-home {
            text-decoration: none;
            color: #126d61; /* Hijau Teal khas GIVEHOPE */
            font-weight: 700;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .back-home:hover { color: #fbb034; }
        
        /* Tombol Nominal Pills */
        .btn-check:checked + .btn-outline-custom {
            background-color: transparent !important;
            border-color: #fbb034 !important;
            color: #fbb034 !important;
            border-width: 2px;
            font-weight: 700;
        }
        .btn-outline-custom {
            border: 1px solid #dee2e6;
            border-radius: 50px;
            color: #495057;
            padding: 10px 15px;
            transition: 0.2s;
        }

        .donation-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }

        /* WARNA TOMBOL SENADA HOME PAGE (#fbb034) */
        .btn-submit {
            background-color: #fbb034; 
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 700;
            color: #fff;
            transition: 0.3s;
        }
        .btn-submit:hover { 
            background-color: #e69d2a; 
            color: #fff;
            transform: translateY(-2px); 
        }
    </style>
</head>
<body>

@php
    // Logika Pemetaan Gambar berdasarkan kategori
    $imageMap = [
        'food' => 'donation-1.jpg',
        'health' => 'donation-2.jpg',
        'education' => 'donation-3.jpg'
    ];
    $fileName = $imageMap[$category] ?? 'donation-1.jpg';
@endphp

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            
            <a href="{{ url('/') }}" class="back-home">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
            </a>

            <div class="donation-header">
                <img src="{{ asset('asset-landing/img/' . $fileName) }}" 
                     class="header-img" 
                     alt="Donasi {{ $category }}"
                     onerror="this.src='https://via.placeholder.com/150?text=GIVEHOPE';">
                <div>
                    <h5 class="fw-bold mb-1">Bersama #GIVEHOPE, Jadilah Kakak Asuh untuk Mereka!</h5>
                    <p class="mb-0 small text-muted">
                        <span style="color: #126d61;"><i class="fas fa-check-circle"></i> GIVEHOPE Foundation</span>
                        <i class="fas fa-certificate text-info ms-1 small"></i>
                    </p>
                </div>
            </div>

            <div class="donation-card">
                {{-- Ganti bagian ini di file Blade Anda --}}
                    <form id="donationForm" action="{{ route('category.donasi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="category" value="{{ $category }}">
                        {{-- Tambahkan ini agar ID Kampanye ikut tersimpan --}}
                        <input type="hidden" name="campaign_id" value="{{ request()->query('campaign_id') }}">

                        <div class="mb-4">
                            <label class="h6 fw-bold mb-1">Nominal</label>
                            <p class="text-muted small mb-3">Pilih nominal yang tersedia</p>
                            
                            <div class="row g-2">
                                @foreach(['30000', '50000', '75000', '100000'] as $val)
                                <div class="col-6 col-md-3">
                                    {{-- Gunakan name="nominal" --}}
                                    <input type="radio" class="btn-check" name="nominal" id="nom{{ $val }}" value="{{ $val }}">
                                    <label class="btn btn-outline-custom w-100" for="nom{{ $val }}">
                                        Rp{{ number_format($val, 0, ',', '.') }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="h6 fw-bold mb-3">Nominal Lainnya</label>
                            <div class="input-group border rounded-3 p-1">
                                <span class="input-group-text bg-white border-0 text-muted">Rp</span>
                                {{-- Gunakan name="custom_nominal" --}}
                                <input type="number" name="custom_nominal" class="form-control border-0 shadow-none" placeholder="0">
                            </div>
                            <p class="mt-2 text-muted" style="font-size: 12px;">Minimum donasi Rp 10.000</p>
                        </div>

                        <button type="submit" class="btn btn-submit w-100 mt-2 shadow-sm">
                            Selanjutnya
                        </button>
                    </form>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('donationForm').onsubmit = function(e) {
        e.preventDefault();
        
        // Cek apakah ada nominal yang dipilih/diisi
        const nominalChecked = document.querySelector('input[name="nominal"]:checked');
        const customNominal = document.querySelector('input[name="custom_nominal"]').value;

        if (!nominalChecked && !customNominal) {
            Swal.fire({
                title: 'Opps!',
                text: 'Silakan pilih atau masukkan nominal donasi.',
                icon: 'warning',
                confirmButtonColor: '#fbb034'
            });
            return;
        }

        // Tampilkan Notifikasi Berhasil
        Swal.fire({
            title: 'Donasi Berhasil Terkirim!',
            text: 'Terima kasih telah menjadi bagian dari perubahan.',
            icon: 'success',
            confirmButtonColor: '#126d61',
            confirmButtonText: 'Selesai'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Lanjutkan ke database
            }
        });
    };
</script>

</body>
</html>