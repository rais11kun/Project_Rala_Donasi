<x-app-layout>
    <div class="container py-5">
        <h2>Buat Donasi</h2>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Donasi</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Donasi</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Donasi</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea name="note" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Bukti Donasi</label>
                <input type="file" name="proof_image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">
                Kirim Donasi
            </button>
        </form>
    </div>
</x-app-layout>
