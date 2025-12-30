@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Saluran & Berita</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <form action="{{ route('staff.campaigns.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul Kampanye/Event</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="type" class="form-control">
                                <option value="donation">Donasi (Kategori Donasi)</option>
                                <option value="event">Event (Kegiatan)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Target Dana (Opsional untuk Event)</label>
                            <input type="number" name="goal_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Unggah Gambar</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a href="{{ route('staff.campaigns.index') }}" class="btn btn-default">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection