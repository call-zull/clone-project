<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Daftar Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="{{ route('users.create') }}" class="mb-3 btn btn-primary">Tambah Pengguna</a>
        <div class="p-0 card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Posisi</th> <!-- Mengubah kolom header menjadi 'Posisi' -->
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->position ? $user->position->name : 'Tidak ada' }}</td> <!-- Menampilkan nama posisi -->
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layouts>
