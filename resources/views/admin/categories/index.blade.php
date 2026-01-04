@extends('admin.layouts.app')

@section('title', 'Kategori Donasi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Kategori Donasi</h5>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
            + Tambah Kategori
        </a>
    </div>

    <div class="card-body">

        {{-- SEARCH --}}
        <form method="GET" action="{{ route('admin.categories.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control"
                        placeholder="Cari kategori..."
                        value="{{ request('search') }}"
                    >
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">Cari</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        {{-- TABLE --}}
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th width="50">#</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $index }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus kategori?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Data kategori tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
