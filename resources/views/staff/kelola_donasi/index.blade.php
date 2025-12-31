@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Verifikasi Donasi Masuk</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/staff/dashboard') }}">Dashboard</a></li>
                    <li class="active">Kelola Donasi</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Daftar Konfirmasi Donasi Guest</h3>
                    <p class="text-muted m-b-30">Silakan cek mutasi bank sebelum melakukan verifikasi.</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Donatur</th>
                                    <th>Program Kategori</th>
                                    <th>Nominal</th>
                                    <th>Tanggal Konfirmasi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donations as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->donator_name }}</td>
                                    <td>{{ $row->category->name }}</td>
                                    <td class="font-bold text-success">Rp {{ number_format($row->amount, 0, ',', '.') }}</td>
                                    <td>{{ $row->created_at->format('d M Y, H:i') }}</td>
                                    <td>
                                        @if($row->status == 'pending')
                                            <span class="label label-warning">PENDING</span>
                                        @else
                                            <span class="label label-success">TERVERIFIKASI</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($row->status == 'pending')
                                            <form action="{{ route('staff.incoming.verify', $row->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Yakin sudah cek uang masuk?')">
                                                    <i class="fa fa-check"></i> Verifikasi
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-default btn-sm" disabled>
                                                <i class="fa fa-check-circle"></i> Selesai
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada donasi yang perlu diverifikasi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection