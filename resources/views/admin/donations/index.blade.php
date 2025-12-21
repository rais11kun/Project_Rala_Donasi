@extends('admin.layouts.app')

@section('title', 'Daftar Donasi')

@section('content')
<div class="row mb-4">
    <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm hover-shadow">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle me-3">
                        <i class="material-icons opacity-10">filter_list</i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="mb-0">Filter Donasi</h6>
                        <small class="text-muted">Berdasarkan Kategori</small>
                    </div>
                </div>

                <form method="GET"
                      action="{{ route('admin.donations.index') }}"
                      class="mt-3">

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

<div class="row">
    <div class="col-12">
        <div class="card mb-4">

            {{-- HEADER CARD --}}
            <div class="card-header pb-0">
                <h6 class="mb-0">Daftar Donasi</h6>
                <p class="text-sm mb-0 text-muted">
                    Semua donasi yang masuk ke sistem
                </p>
            </div>

            {{-- BODY --}}
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    User
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Kategori
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Judul
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jumlah
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($donations as $donation)
                                <tr>
                                    {{-- USER --}}
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="https://ui-avatars.com/api/?name={{ $donation->user->name }}"
                                                     class="avatar avatar-sm me-3"
                                                     alt="user">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
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
                                    <td>
                                        <p class="text-sm mb-0">
                                            {{ $donation->title }}
                                        </p>
                                    </td>

                                    {{-- JUMLAH --}}
                                    <td>
                                        <span class="text-sm font-weight-bold">
                                            Rp {{ number_format($donation->amount) }}
                                        </span>
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        @if ($donation->status === 'pending')
                                            <span class="badge bg-gradient-warning">
                                                Pending
                                            </span>
                                        @elseif ($donation->status === 'approved')
                                            <span class="badge bg-gradient-success">
                                                Approved
                                            </span>
                                        @else
                                            <span class="badge bg-gradient-danger">
                                                Rejected
                                            </span>
                                        @endif
                                    </td>

                                    {{-- AKSI --}}
                                    <td class="align-middle text-center">

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
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <span class="text-secondary">
                                            Belum ada data donasi
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @foreach ($donations as $donation)
<div class="modal fade"
     id="donationDetail{{ $donation->id }}"
     tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title">
                    Detail Donasi
                </h5>
                <button type="button" class="btn-close text-white"
                        data-bs-dismiss="modal"></button>
            </div>

            {{-- BODY --}}
            <div class="modal-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>User</strong>
                        <p class="mb-0">{{ $donation->user->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Kategori</strong>
                        <p class="mb-0">{{ $donation->category->name ?? '-' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Judul</strong>
                        <p class="mb-0">{{ $donation->title }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Jumlah</strong>
                        <p class="mb-0">
                            Rp {{ number_format($donation->amount) }}
                        </p>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Status</strong><br>
                    @if ($donation->status === 'pending')
                        <span class="badge bg-gradient-warning">Pending</span>
                    @elseif ($donation->status === 'approved')
                        <span class="badge bg-gradient-success">Approved</span>
                    @else
                        <span class="badge bg-gradient-danger">Rejected</span>
                    @endif
                </div>

                <div class="mb-3">
                    <strong>Bukti Transfer</strong><br>

                    @if ($donation->proof_image)
                        <img src="{{ asset('storage/' . $donation->proof_image) }}"
                             class="img-fluid rounded shadow mt-2"
                             style="max-height: 300px;">
                    @else
                        <p class="text-muted mb-0">Tidak ada bukti</p>
                    @endif
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer">
                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>
@endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
