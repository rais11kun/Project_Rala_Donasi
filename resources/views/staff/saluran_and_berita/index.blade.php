@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Saluran & Berita</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('staff.campaigns.create') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Tambah Baru</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campaigns as $item)
                                <tr>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset('asset-landing/img/'.$item->image) }}" 
                                                width="80" 
                                                alt="Image: {{ $item->image }}" 
                                                onerror="this.onerror=null;this.src='https://via.placeholder.com/80?text=Error+Path';">
                                        @else
                                            <span class="label label-default">No Image Name</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if($item->category)
                                            <span class="label label-{{ $item->category == 'donation' ? 'info' : 'success' }}">
                                                {{ ucfirst($item->category) }}
                                            </span>
                                        @else
                                            <span class="label label-warning">Kategori Kosong</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection