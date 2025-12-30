@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Kategori Donasi</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-30">Form Input Kategori</h3>
                    <form action="{{ route('staff.donations.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Nama Kategori</label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama kategori (ex: Pendidikan)" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Gambar/Icon Kategori</label>
                            <div class="col-md-12">
                                <input type="file" name="image" class="form-control" required>
                                <span class="help-block"><small>Gambar akan disimpan di: public/asset-landing/img/</small></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                                <a href="{{ route('staff.donations.index') }}" class="btn btn-default">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection