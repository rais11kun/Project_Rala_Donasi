@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Contact</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/staff/dashboard') }}">Dashboard</a></li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Pesan Masuk (Contact Us)</h3>
                    <p class="text-muted m-b-30">Daftar pertanyaan atau pesan dari pengunjung website.</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pengirim</th>
                                    <th>Subjek</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <strong>{{ $row->name }}</strong><br>
                                        <small class="text-muted">{{ $row->email }}</small>
                                    </td>
                                    <td>{{ $row->subject }}</td>
                                    <td style="max-width: 300px; white-space: normal;">
                                        {{ $row->message }}
                                    </td>
                                    <td>{{ $row->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="mailto:{{ $row->email }}?subject=Re: {{ $row->subject }}" class="btn btn-info btn-sm btn-outline">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                            
                                            <form action="{{ route('staff.contacts.destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus pesan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-outline">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">Tidak ada pesan masuk.</td>
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