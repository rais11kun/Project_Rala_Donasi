@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-lg-6 mx-auto">

            <div class="card shadow-sm">
                <div class="card-header bg-gradient-warning">
                    <h5 class="text-white mb-0">Edit Staff</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Staff</label>
                            <input type="text" name="name"
                                class="form-control"
                                value="{{ $staff->name }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control"
                                value="{{ $staff->email }}"
                                required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('staff.index') }}" class="btn btn-light me-2">
                                Kembali
                            </a>
                            <button class="btn bg-gradient-warning">
                                Update Staff
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
