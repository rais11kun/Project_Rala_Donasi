@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="card shadow-sm">
                <div class="card-header bg-gradient-primary">
                    <h5 class="text-white mb-0">Tambah Staff</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Staff</label>
                            <input type="text" name="name"
                                class="form-control"
                                placeholder="Masukkan nama staff"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control"
                                placeholder="staff@email.com"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control"
                                placeholder="Minimal 6 karakter"
                                required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('staff.index') }}" class="btn btn-light me-2">
                                Batal
                            </a>
                            <button class="btn bg-gradient-primary">
                                Simpan Staff
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
