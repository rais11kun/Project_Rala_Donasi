@extends('admin.layouts.app')

@section('title','Data Donasi')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">

      <div class="card-header pb-0">
        <h6>Daftar Donasi</h6>
      </div>

      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">

          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th>User</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Bukti</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($donations as $donation)
              <tr>

                <td>{{ $donation->user->name }}</td>
                <td>{{ $donation->title }}</td>
                <td>Rp {{ number_format($donation->amount) }}</td>

                <td>
                  <span class="badge bg-{{ 
                    $donation->status == 'approved' ? 'success' :
                    ($donation->status == 'rejected' ? 'danger' : 'warning') 
                  }}">
                    {{ ucfirst($donation->status) }}
                  </span>
                </td>

                <td>
                  @if ($donation->proof_image)
                    <a href="{{ asset('storage/'.$donation->proof_image) }}" target="_blank">Lihat</a>
                  @else
                    -
                  @endif
                </td>

                <td>
                  @if ($donation->status === 'pending')
                    <form method="POST" action="{{ route('admin.donations.approve', $donation->id) }}" class="d-inline">
                      @csrf @method('PATCH')
                      <button class="btn btn-success btn-sm">Approve</button>
                    </form>

                    <form method="POST" action="{{ route('admin.donations.reject', $donation->id) }}" class="d-inline">
                      @csrf @method('PATCH')
                      <button class="btn btn-danger btn-sm">Reject</button>
                    </form>
                  @else
                    -
                  @endif
                </td>

              </tr>
              @endforeach
            </tbody>

          </table>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection
