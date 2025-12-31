@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Relawan</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/staff/dashboard') }}">Dashboard</a></li>
                    <li class="active">Relawan</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Data Pendaftar Relawan</h3>
                    <p class="text-muted m-b-30">Berikut adalah daftar masyarakat yang mendaftar melalui form relawan.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Relawan</th>
                                    <th>WhatsApp</th>
                                    <th>Program Event</th>
                                    <th>Motivasi / Alasan</th>
                                    <th>Tanggal Daftar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($volunteers as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="font-bold">{{ $row->nama }}</td>
                                    <td>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $row->whatsapp) }}" target="_blank" class="text-success fw-bold">
                                            <i class="fa fa-whatsapp"></i> {{ $row->whatsapp }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="label label-info" style="border-radius: 4px;">
                                            {{ $row->event->title ?? 'Program Umum' }}
                                        </span>
                                    </td>
                                    <td style="max-width: 250px; white-space: normal;">
                                        <small>{{ $row->alasan }}</small>
                                    </td>
                                    <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('staff.volunteers.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-outline">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fa fa-users fa-3x m-b-10"></i>
                                            <p>Belum ada relawan yang terdaftar.</p>
                                        </div>
                                    </td>
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