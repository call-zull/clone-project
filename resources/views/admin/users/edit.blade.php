<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="shadow-sm card">
                    <div class="text-center card-header">
                        <h5 class="mb-0">Edit Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi (biarkan kosong jika tidak ingin diubah)</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Peran</label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="mentor" {{ $user->role == 'mentor' ? 'selected' : '' }}>Mentor</option>
                                    <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="position_id" class="form-label">Posisi</label>
                                <select name="position_id" class="form-select @error('position_id') is-invalid @enderror">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ $user->position_id == $position->id ? 'selected' : '' }}>
                                            {{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
