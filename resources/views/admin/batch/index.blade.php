<x-app-layouts>
    @if (auth()->check())
        @auth
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Batch</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Batch
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4 shadow-sm card">
                                <div class="text-white card-header bg-primary">
                                    <h5 class="mb-0">Batch List</h5>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-striped table-hover">
                                            <thead class="table-light">
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
                                                            <button class="btn btn-info btn-sm me-1">View</button>
                                                            <button class="btn btn-warning btn-sm me-1">Edit</button>
                                                            <button class="btn btn-danger btn-sm">Delete</button>
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
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <small>Showing 1 to 10 of 50 entries</small>
                                    <nav aria-label="Batch list pagination">
                                        <ul class="mb-0 pagination pagination-sm">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endauth
    @else
        @guest
            <script>
                window.location.href = "{{ route('login') }}";
            </script>
        @endguest
    @endif
</x-app-layouts>
