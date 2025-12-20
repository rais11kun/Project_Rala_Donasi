<x-admin-layout>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Kategori Donasi</h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Tambah</a>
    </div>

    <div class="card-body">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>

            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $category) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</x-admin-layout>
