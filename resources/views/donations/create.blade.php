<x-app-layout>
    <div class="container py-5">
        <h2>Buat Donasi</h2>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('donasi.store') }}"
              enctype="multipart/form-data">
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

            <div>
                <label>Bukti Donasi</label>
                <input type="file" name="proof_image" accept="image/*">
            </div>

            <button type="submit">Kirim Donasi</button>
        </form>
    </div>
</x-app-layout>
