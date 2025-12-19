<x-app-layout>
    <div class="container py-5">
        <h2>Buat Donasi</h2>

        <form method="POST" action="{{ route('donasi.store') }}">
            @csrf

            <div>
                <label>Judul Donasi</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label>Jumlah Donasi</label>
                <input type="number" name="amount" required>
            </div>

            <div>
                <label>Catatan</label>
                <textarea name="note"></textarea>
            </div>

            <button type="submit">Kirim Donasi</button>
        </form>
    </div>
</x-app-layout>
