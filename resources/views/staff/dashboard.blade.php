@extends('staff.layouts.app')

@section('content')
<style>
    /* 1. PERBAIKAN LAYOUT UTAMA */
    #page-wrapper {
        margin-left: 240px !important; 
        background-color: #f8fbfd;
        min-height: 100vh;
        padding-bottom: 50px;
    }

    .container-fluid { padding: 35px !important; }

    /* 2. TYPOGRAPHY & HEADER */
    .main-title {
        font-size: 26px;
        font-weight: 800;
        color: #2d3436;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* 3. WIDGET STATISTIK MODERN */
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card:hover { transform: translateY(-5px); }
    
    .stat-card .box-title {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #b2bec3 !important;
        margin-bottom: 8px;
        display: block;
    }

    .stat-card .counter {
        font-size: 34px !important; /* Angka diperbesar */
        font-weight: 900 !important;
        line-height: 1;
    }

    .stat-icon-bg {
        position: absolute;
        right: -10px;
        bottom: -10px;
        font-size: 80px;
        color: rgba(0,0,0,0.03);
    }

    /* 4. DONATION CARD LIST (PENGGANTI TABEL) */
    .card-list-container { margin-top: 20px; }

    .donation-item {
        background: #fff;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        border-left: 5px solid #2ecc71; /* Aksen warna approved */
    }

    .donation-info { display: flex; align-items: center; }

    .category-avatar {
        width: 55px; height: 55px;
        background: #f0fff4;
        color: #2ecc71;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-right: 18px;
    }

    .donation-text h5 { margin: 0; font-weight: 800; font-size: 17px; color: #2d3436; }
    .donation-text p { margin: 2px 0 0; font-size: 13px; color: #95a5a6; font-weight: 600; }

    .donation-value { text-align: right; }
    .val-amount { display: block; font-weight: 800; font-size: 20px; color: #2d3436; }
    .status-pill {
        display: inline-block;
        padding: 4px 12px;
        background: #e6fffa;
        color: #38b2ac;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 800;
        margin-top: 5px;
    }

    /* 5. RELAWAN SIDEBAR */
    .volunteer-box {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
    }

    .v-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f8f9fa;
    }

    .v-item img { width: 48px; height: 48px; border-radius: 50%; margin-right: 15px; border: 2px solid #fff; box-shadow: 0 3px 10px rgba(0,0,0,0.1); }
    .v-name { font-weight: 800; color: #2d3436; font-size: 15px; display: block; }
    .v-program { font-size: 12px; color: #b2bec3; font-weight: 600; }

    .btn-kelola {
        background: #3498db;
        color: #fff;
        border-radius: 10px;
        font-weight: 700;
        padding: 12px;
        margin-top: 20px;
        transition: all 0.3s;
    }
    .btn-kelola:hover { background: #2980b9; color: #fff; transform: translateY(-2px); }
</style>

<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="main-title">Staff Operasional Overview</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <span class="box-title">TOTAL DONASI</span>
                    <span class="counter text-success">Rp {{ number_format($total_donations ?? 0) }}</span>
                    <i class="fa fa-heart stat-icon-bg"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <span class="box-title">RELAWAN AKTIF</span>
                    <span class="counter text-info">{{ $total_volunteers ?? 0 }}</span>
                    <i class="fa fa-users stat-icon-bg"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <span class="box-title">PESAN BARU</span>
                    <span class="counter text-warning">{{ $total_contacts ?? 0 }}</span>
                    <i class="fa fa-envelope stat-icon-bg"></i>
                </div>
            </div>
        </div>

        <div class="row card-list-container">
            <div class="col-lg-8">
                <h4 style="font-weight: 800; color: #636e72; margin-bottom: 20px;">Donasi Terbaru (List Card)</h4>
                
                @forelse($recent_donations as $donation)
                <div class="donation-item">
                    <div class="donation-info">
                        <div class="category-avatar">
                            <i class="fa fa-hand-holding-heart"></i>
                        </div>
                        <div class="donation-text">
                            {{-- Mengatasi kategori kosong --}}
                            <h5>{{ $donation->category ?? 'Donasi Umum' }}</h5>
                            <p><i class="fa fa-calendar-o"></i> {{ $donation->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                    <div class="donation-value">
                        <span class="val-amount">Rp {{ number_format($donation->amount) }}</span>
                        <span class="status-pill">APPROVED</span>
                    </div>
                </div>
                @empty
                <div class="stat-card text-center">Belum ada donasi yang masuk.</div>
                @endforelse
            </div>

            <div class="col-lg-4">
                <div class="volunteer-box">
                    <h4 style="font-weight: 800; font-size: 18px; margin-bottom: 20px;">Relawan Terbaru</h4>
                    <div class="v-list">
                        @foreach($recent_volunteers as $volunteer)
                        <div class="v-item">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($volunteer->nama) }}&background=random" alt="user">
                            <div>
                                <span class="v-name">{{ $volunteer->nama }}</span>
                                <span class="v-program">{{ $volunteer->event->title ?? 'Program Pendidikan' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('staff.volunteers.index') }}" class="btn btn-kelola btn-block">
                        KELOLA SEMUA RELAWAN
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection