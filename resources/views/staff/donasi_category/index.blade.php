@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Kategori Donasi</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                <a href="{{ route('staff.donations.create') }}" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Tambah Kategori</a>
            </div>
        </div>
        
        <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 150px;">Gambar</th>
                <th>Nama Kategori</th>
                <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>
                    <img src="{{ asset('asset-landing/img/' . $cat->image) }}" 
                         width="80" class="img-thumbnail" 
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/80?text=No+Img';">
                </td>
                
                <td style="vertical-align: middle;">{{ $cat->name }}</td>
                
                <td class="text-center" style="vertical-align: middle;">
                    <a href="{{ route('staff.donations.edit', $cat->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('staff.donations.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">
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