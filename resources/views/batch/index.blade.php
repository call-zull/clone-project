<x-app-layouts>
    <div class="app-content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Daftar Batch</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Batch
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="p-0 card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Batch Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            {{-- <th>Total Students</th> --}}
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($batch as $batch)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $batch->name }}</td>
                                <td>{{ $batch->start_date }}</td>
                                <td>{{ $batch->end_date }}</td>
                                {{-- <td>100</td> --}}
                                <td>
                                    <a href="{{ route('bacth.cpl.index', $batch->id) }}" class="btn btn-info btn-sm me-1">CPL</a>

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
</x-app-layouts>
