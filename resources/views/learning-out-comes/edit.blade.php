<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Edit CPL</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('bacth.index') }}">Batch</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('bacth.cpl.index', ['batch' => $batch]) }}">Position</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('bacth.cpl.show', ['batch' => $batch, 'position' => $position]) }}">cpl</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit CPL</li>
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
                        <h5 class="mb-0">Edit CPL</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('learning-outcomes.update', [$learning_outcome->id, 'batch' => $batch, 'position' => $position]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="code" class="form-label">Code CPL</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $learning_outcome->code }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama CPL</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $learning_outcome->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
