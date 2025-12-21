<x-app-layout>
    <div class="container py-5">
        <h2>Daftar Donasi</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Kategori</th> {{-- 🔥 --}}
                    <th>Judul</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donations as $donation)
                    <tr>
                        <td>{{ $donation->user->name }}</td>

                        <td>
                            {{ $donation->category->name ?? '-' }}
                        </td>

                        <td>{{ $donation->title }}</td>
                        <td>Rp {{ number_format($donation->amount) }}</td>
                        <td>
                            <span class="badge bg-warning">
                                {{ $donation->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada donasi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
