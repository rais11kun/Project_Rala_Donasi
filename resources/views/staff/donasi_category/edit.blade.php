@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="white-box">
            <h3 class="box-title m-b-30">Edit Data Donasi</h3>
            <form action="{{ route('staff.donations.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama Program</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <div class="form-group">
                    <label>Label Kategori</label>
                    <input type="text" name="label" class="form-control" value="{{ $category->label }}">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Target Goal ($)</label>
                        <input type="number" name="goal" class="form-control" value="{{ $category->goal }}">
                    </div>
                    <div class="col-md-6">
                        <label>Terkumpul (Raised) ($)</label>
                        <input type="number" name="raised" class="form-control" value="{{ $category->raised }}">
                    </div>
                </div>

                <div class="form-group m-t-20">
                    <label>Gambar Saat Ini</label><br>
                    <img src="{{ asset('asset-landing/img/' . $category->image) }}" width="150" class="m-b-10 img-thumbnail">
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">Perbarui Data</button>
                <a href="{{ route('staff.donations.index') }}" class="btn btn-default">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection