@extends('staff.layouts.app')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="white-box">
            <h3 class="box-title">Edit Kategori</h3>
            <form action="{{ route('staff.donations.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <label>Gambar Saat Ini</label><br>
                    <img src="{{ asset('asset-landing/img/'.$category->image) }}" width="100" class="m-b-10">
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning">Update Data</button>
            </form>
        </div>
    </div>
</div>
@endsection