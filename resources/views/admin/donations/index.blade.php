@extends('admin.layouts.app')

@section('title', 'Daftar Donasi')

@section('content')

{{-- FILTER --}}
<div class="row mb-4">
    <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex align-items-center mb-2">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle me-3">
                        <i class="material-icons opacity-10">filter_list</i>
                    </div>
                    <div>
                        <h6 class="mb-0">Filter Donasi</h6>
                        <small class="text-muted">Berdasarkan Kategori</small>
                    </div>
                </div>

                <form method="GET" action="{{ route('admin.donations.index') }}">
                    <select name="category_id"
                            class="form-control form-control-sm"
                            onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="row">
    <div class="col-12">
        <div class="card mb-4">

            <div class="card-header pb-0">
                <h6 class="mb-0">Daftar Donasi</h6>
                <p class="text-sm text-muted mb-0">
                    Semua donasi yang masuk ke sistem
                </p>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">

                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse ($donations as $donation)
                            <tr>

                                {{-- USER --}}
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($donation->user->name) }}"
                                             class="avatar avatar-sm me-3">
                                        <div>
                                            <h6 class="mb-0 text-sm">
                                                {{ $donation->user->name }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>

                                {{-- KATEGORI --}}
                                <td>
                                    <span class="badge bg-gradient-info">
                                        {{ $donation->category->name ?? '-' }}
                                    </span>
                                </td>

                                {{-- JUDUL --}}
                                <td>{{ $donation->title }}</td>

                                {{-- JUMLAH --}}
                                <td>
                                    Rp {{ number_format($donation->amount) }}
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    @if ($donation->status === 'pending')
                                        <span class="badge bg-gradient-warning">Pending</span>
                                    @elseif ($donation->status === 'approved')
                                        <span class="badge bg-gradient-success">Approved</span>
                                    @else
                                        <span class="badge bg-gradient-danger">Rejected</span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">

                                    {{-- DETAIL --}}
                                    <button class="btn btn-sm btn-info"
                                            data-bs-toggle="modal"
                                            data-bs-target="#donationDetail{{ $donation->id }}">
                                        <i class="material-icons text-sm">visibility</i>
                                    </button>

                                    {{-- APPROVE --}}
                                    <form method="POST"
                                          action="{{ route('admin.donations.approve', $donation->id) }}"
                                          class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-success">
                                            <i class="material-icons text-sm">check</i>
                                        </button>
                                    </form>

                                    {{-- REJECT --}}
                                    <form method="POST"
                                          action="{{ route('admin.donations.reject', $donation->id) }}"
                                          class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="material-icons text-sm">close</i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            {{-- MODAL DETAIL --}}
                            <div class="modal fade"
                                 id="donationDetail{{ $donation->id }}"
                                 tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header bg-gradient-primary text-white">
                                            <h5 class="modal-title">Detail Donasi</h5>
                                            <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <p><strong>User:</strong> {{ $donation->user->name }}</p>
                                            <p><strong>Kategori:</strong> {{ $donation->category->name ?? '-' }}</p>
                                            <p><strong>Judul:</strong> {{ $donation->title }}</p>
                                            <p><strong>Jumlah:</strong> Rp {{ number_format($donation->amount) }}</p>

                                            <strong>Status:</strong><br>
                                            @if ($donation->status === 'pending')
                                                <span class="badge bg-gradient-warning">Pending</span>
                                            @elseif ($donation->status === 'approved')
                                                <span class="badge bg-gradient-success">Approved</span>
                                            @else
                                                <span class="badge bg-gradient-danger">Rejected</span>
                                            @endif

                                            <hr>

                                            <strong>Bukti Transfer</strong><br>
                                            @if ($donation->proof_image)
                                                <img src="{{ asset('storage/' . $donation->proof_image) }}"
                                                     class="img-fluid rounded mt-2"
                                                     style="max-height:300px;">
                                            @else
                                                <p class="text-muted">Tidak ada bukti</p>
                                            @endif

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Belum ada data donasi
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $donations->links('pagination::bootstrap-5') }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<style>
    .page-link {
        border-radius: 50px !important;
        margin: 0 4px;
        font-size: 0.85rem;
    }
    .page-item.active .page-link {
        background: linear-gradient(310deg, #2152ff, #21d4fd);
        border: none;
    }
</style>
@endsection
