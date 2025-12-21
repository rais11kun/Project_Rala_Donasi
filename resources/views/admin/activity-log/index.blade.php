@extends('admin.layouts.app')

@section('title', 'Activity Log')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">

            <div class="card-header pb-0">
                <h6>Activity Log Admin</h6>
                <p class="text-sm text-muted">
                    Riwayat aktivitas penting dalam sistem
                </p>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Aksi</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>
                                        <strong>{{ $log->user->name }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-gradient-info">
                                            {{ $log->action }}
                                        </span>
                                    </td>
                                    <td>{{ $log->description }}</td>
                                    <td class="text-sm text-muted">
                                        {{ $log->created_at->format('d M Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-3 mt-3">
                    {{ $logs->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
