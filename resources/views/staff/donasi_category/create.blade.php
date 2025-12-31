@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Tambah Program Donasi</h4>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title m-b-30">FORMULIR KATEGORI DONASI LENGKAP</h3>
            
            <form action="{{ route('staff.donations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="form-group @error('name') has-error @enderror">
                    <label class="control-label">Nama Program (Judul)</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Bantuan Makanan Balita" value="{{ old('name') }}" required>
                    @error('name') <span class="help-block text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('label') has-error @enderror">
                    <label class="control-label">Label Kategori</label>
                    <input type="text" name="label" class="form-control" placeholder="Contoh: Food, Health, atau Education" value="{{ old('label') }}">
                    <small class="text-muted">Muncul sebagai label kecil di landing page.</small>
                    @error('label') <span class="help-block text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label class="control-label">Deskripsi Singkat</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Jelaskan tujuan donasi ini secara ringkas...">{{ old('description') }}</textarea>
                    @error('description') <span class="help-block text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @error('goal') has-error @enderror">
                            <label class="control-label">Target Goal ($)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                <input type="number" name="goal" class="form-control" value="{{ old('goal', 0) }}" required min="0">
                            </div>
                            @error('goal') <span class="help-block text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group @error('raised') has-error @enderror">
                            <label class="control-label">Terkumpul (Raised) ($)</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-stats-up"></i></div>
                                <input type="number" name="raised" class="form-control" value="{{ old('raised', 0) }}" min="0">
                            </div>
                            @error('raised') <span class="help-block text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group @error('image') has-error @enderror">
                    <label class="control-label">Gambar Banner</label>
                    <input type="file" name="image" class="form-control" required accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, JPEG. Rekomendasi ukuran horizontal.</small>
                    @error('image') <span class="help-block text-danger">{{ $message }}</span> @enderror
                </div>

                <hr>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success waves-effect waves-light"> 
                        <i class="fa fa-check"></i> Simpan Program Donasi
                    </button>
                    <a href="{{ route('staff.donations.index') }}" class="btn btn-inverse waves-effect waves-light">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection