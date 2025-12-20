<x-app-layout>
    <div class="container py-5">
        <h2>Daftar Donasi</h2>

        <table border="1" cellpadding="10">
            <tr>
                <th>User</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>

            @foreach($donations as $donasi)
            <tr>
                <td>{{ $donasi->user->name ?? 'Guest' }}</td>
                <td>{{ $donasi->title }}</td>
                <td>Rp {{ number_format($donasi->amount) }}</td>
                <td>{{ $donasi->status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
