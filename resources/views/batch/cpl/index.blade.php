<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Learning Outcomes {{ $batch->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('bacth.index') }}">Batch</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Position</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            @if (auth()->user()->role == 'admin')
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addPositionModal">
                        Tambah Position
                    </button>
                </div>
                <x-modal.modal-create id="addPositionModal" title="Tambah Position">
                    <form action="{{ route('position.store', ['batch' => $batch->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Position</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </x-modal.modal-create>
            @endif
            <div class="row">
                @foreach ($positions as $position)
                    <div class="mb-4 col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('bacth.cpl.show', ['batch' => $batch->id, 'position' => $position->id]) }}">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $position->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
</x-app-layouts>
