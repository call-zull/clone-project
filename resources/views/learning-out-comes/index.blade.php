<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Learning Outcomes (CPL)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('bacth.index') }}">Batch</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('bacth.cpl.index', ['batch' => $batch]) }}">Position</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">cpl</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            @if (auth()->user()->role == 'admin')
                <div class="mb-3">
                    <a href="{{ route('learning-outcomes.create', ['batch' => $batch, 'position' => $position]) }}"
                        class="btn btn-primary">Tambah CPL</a>
                </div>
            @endif
            <div class="row">
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>code</th>
                                    <th>Name</th>
                                    <th style="width: 18%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($learningOutcomes as $learningOutcome)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $learningOutcome->code }}</td>
                                        <td>{{ $learningOutcome->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm me-1">Deatil</a>
                                            <a href="{{ route('learning-outcomes.edit', [$learningOutcome->id, 'batch' => $batch, 'position' => $position]) }}"
                                                class="btn btn-warning btn-sm me-1">Edit</a>
                                            <form
                                                action="{{ route('learning-outcomes.destroy', $learningOutcome->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-1"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layouts>
