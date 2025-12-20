<x-app-layout>
    <div class="container py-5">
        <h2>Daftar Donasi</h2>

        <table border="1" cellpadding="10">
            <tr>
                <th>User</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
                <th>Bukti</th>
            </tr>

            @foreach ($donations as $donation)
                <tr>
                    <td>{{ $donation->user->name }}</td>
                    <td>{{ $donation->title }}</td>
                    <td>{{ number_format($donation->amount) }}</td>
                    <td>{{ $donation->status }}</td>
                    <td>
                        @if ($donation->status === 'pending')
                            <form method="POST" action="{{ route('admin.donations.approve', $donation->id) }}" style="display:inline">
                                @csrf
                                @method('PATCH')
                                <button>Approve</button>
                            </form>

                            <form method="POST" action="{{ route('admin.donations.reject', $donation->id) }}" style="display:inline">
                                @csrf
                                @method('PATCH')
                                <button>Reject</button>
                            </form>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($donation->proof_image)
                            <a href="{{ asset('storage/' . $donation->proof_image) }}" target="_blank">
                                Lihat
                            </a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
