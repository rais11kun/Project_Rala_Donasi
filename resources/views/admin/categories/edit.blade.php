@extends('admin.layouts.app')

@section('title', 'Edit Kategori Donasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">

        <div class="card shadow-lg border-radius-xl">
            {{-- HEADER --}}
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">
                    Edit Kategori Donasi
                </h5>
                <p class="text-sm mb-0 opacity-8">
                    Perbarui data kategori donasi
                </p>
            </div>

            {{-- BODY --}}
            <div class="card-body">

                {{-- ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="alert alert-danger text-white">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('admin.categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- NAMA KATEGORI --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Kategori
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $category->name) }}"
                               required>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi
                        </label>
                        <textarea name="description"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Opsional">{{ old('description', $category->description) }}</textarea>
                    </div>

                    {{-- ACTION --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.categories.index') }}"
                           class="btn btn-outline-secondary">
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
