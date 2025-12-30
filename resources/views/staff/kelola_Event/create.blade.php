@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Event Baru</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-30">Detail Kegiatan / Event</h3>
                    <form action="{{ route('staff.events.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Judul Event</label>
                            <div class="col-md-12">
                                <input type="text" name="title" class="form-control" placeholder="Masukkan judul kegiatan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tanggal Pelaksanaan</label>
                            <div class="col-md-12">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <textarea name="description" class="form-control" rows="5" placeholder="Jelaskan detail kegiatan..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Banner Event</label>
                            <div class="col-md-12">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Publikasikan Event</button>
                                <a href="{{ route('staff.events.index') }}" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection