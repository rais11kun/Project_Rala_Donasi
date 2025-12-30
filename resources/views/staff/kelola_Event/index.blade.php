@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Kelola Kegiatan / Event</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                <a href="{{ route('staff.events.create') }}" class="btn btn-info pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Tambah Event Baru</a>
            </div>
        </div>

        <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 150px;">Banner</th>
                <th>Judul Event</th>
                <th>Tanggal</th>
                <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>
                    <img src="{{ asset('asset-landing/img/' . $event->image) }}" 
                         width="100" class="img-rounded"
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/100?text=No+Banner';">
                </td>
                <td style="vertical-align: middle;">{{ $event->title }}</td>
                <td style="vertical-align: middle;">{{ $event->date }}</td>
                <td class="text-center" style="vertical-align: middle;">
                    <a href="{{ route('staff.events.edit', $event->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('staff.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus event ini?')">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
@endsection