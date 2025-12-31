@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Kelola Kategori Donasi</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                <a href="{{ route('staff.donations.create') }}" class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
                    <i class="fa fa-plus m-r-5"></i> Tambah Kategori
                </a>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title m-b-0">DAFTAR KATEGORI DONASI AKTIF</h3>
            <p class="text-muted m-b-30">Pantau progres dan kelola detail kampanye donasi Anda.</p>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Gambar</th>
                            <th>Info Program</th>
                            <th>Target & Terkumpul</th>
                            <th>Progres</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $cat)
                            @php
                                $percent = ($cat->goal > 0) ? ($cat->raised / $cat->goal) * 100 : 0;
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('asset-landing/img/' . $cat->image) }}" alt="img" width="80" class="img-rounded shadow-sm">
                                </td>
                                <td>
                                    <strong class="text-dark">{{ $cat->name }}</strong><br>
                                    <span class="label label-info">{{ $cat->label }}</span><br>
                                    <small class="text-muted">{{ Str::limit($cat->description, 50) }}</small>
                                </td>
                                <td>
                                    <small class="text-muted">Goal:</small> <strong>${{ number_format($cat->goal) }}</strong><br>
                                    <small class="text-muted">Raised:</small> <strong class="text-success">${{ number_format($cat->raised) }}</strong>
                                </td>
                                <td style="vertical-align: middle; width: 150px;">
                                    <div class="progress m-b-0" style="height: 10px; background: #eee;">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{ $percent > 100 ? 100 : $percent }}%;"></div>
                                    </div>
                                    <small class="fw-bold">{{ round($percent) }}% Terpenuhi</small>
                                </td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="{{ route('staff.donations.edit', $cat->id) }}" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('staff.donations.destroy', $cat->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data donasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection