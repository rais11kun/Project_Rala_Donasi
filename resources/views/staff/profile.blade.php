@extends('staff.layouts.app')

@section('content')
<div id="page-wrapper" style="margin-left: 240px; background: #f8fbfd; min-height: 100vh; padding: 30px;">
    <div class="container-fluid">
        <h3 class="m-b-20" style="font-weight: 800; color: #2d3436;">PENGATURAN PROFIL</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="white-box text-center" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 30px; background: #fff;">
                    <img src="{{ Auth::user()->profile_photo ? asset('uploads/profile/'.Auth::user()->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" 
                         class="img-circle" style="width: 120px; height: 120px; border: 5px solid #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.1); object-fit: cover; border-radius: 50%;">
                    <h4 style="font-weight: 800; margin-top: 15px;">{{ Auth::user()->name }}</h4>
                    <span class="label label-info" style="background: #2cabe3;">{{ strtoupper(Auth::user()->role) }}</span>
                </div>
            </div>

            <div class="col-md-8">
                <div class="white-box" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 30px; background: #fff;">
                    <form action="{{ route('staff.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700;">NAMA LENGKAP</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" style="border-radius: 8px;">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700;">EMAIL</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" style="border-radius: 8px;">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700;">GANTI FOTO PROFIL</label>
                            <input type="file" name="photo" class="form-control">
                            <small class="text-muted">Maksimal 2MB (JPG/PNG)</small>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" style="font-weight: 700; padding: 12px; border-radius: 8px; margin-top: 20px; background: #2cabe3; border: none;">
                            SIMPAN PERUBAHAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection