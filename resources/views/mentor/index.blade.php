<x-app-layouts>
    @if (Auth::user()->role == 'mentor')
        <div class="container-fluid">
            <div class="py-4" style="background-color: #f2f2f2;">
                <div class="app-content-header">
                    <div class="p-4" style="background-color: #ffffff; border-radius: 10px;">
                        <div class="container-fluid">
                            <div class="app-content">
                                <div class="mb-4 card">
                                    <div class="card-body">
                                        <div class="p-3 rounded-sm d-flex justify-content-between align-items-center"
                                            style="background-color: #D9D9D9; border-radius: 10px;">
                                            <span class="m-0 card-title fw-bold text-dark fs-4">Log Activity</span>

                                            <form action="" method="GET" class="d-flex">
                                                <select name="" id="" class="form-select me-2">
                                                    <option value="">2024</option>
                                                    <option value="">All</option>
                                                    <option value="">Today</option>
                                                    <option value="">This Week</option>
                                                    <option value="">This Month</option>
                                                </select>
                                                <select name="" id="" class="form-select">
                                                    <option value="">October</option>
                                                    <option value="">All</option>
                                                    <option value="">Category 1</option>
                                                    <option value="">Category 2</option>
                                                    <option value="">Category 3</option>
                                                </select>

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="mx-auto table-responsive">
                                            <table class="table text-center table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">Date</th>
                                                        <th>Cpl</th>
                                                        <th>Project</th>
                                                        <th>Task</th>
                                                        <th>Checked By: (mentor)</th>
                                                        <th>Status</th>
                                                        <th style="width: 40px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-nowrap">
                                                    @foreach ($reports as $report)
                                                        <tr class="align-middle">
                                                            <td>{{ \Carbon\Carbon::parse($report->report_date)->format('d F Y ') }}</td> <!-- Format Tanggal -->
                                                            <td>{{  $report->cpl ? : '-' }}</td> <!-- Aktivitas -->
                                                            <td>{{ $report->project->name ?? 'No Project' }}</td> <!-- Nama Proyek -->
                                                            <td>{!! $report->activity !!}</td> <!-- Task (aktivitas) dengan HTML render -->
                                                            <td>{{ $report->cheked_by ? $report->checker->name : '-' }}</td> <!-- Mentor yang memeriksa -->
                                                            <td>{{ $report->status? : '-' }}</td> <!-- Status laporan -->
                                                            <td>
                                                                <button class="btn btn-secondary text-nowrap ms-3"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#revisiModal">Revisi</button>
                                                                <button class="btn btn-success text-nowrap ms-3"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#approveModal">Approve</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="clearfix card-footer">
                                        <ul class="m-0 pagination pagination-sm justify-content-center">
                                            <li class="page-item"><a class="page-link" href="#">&laquo;</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="revisiModalLabel">Add Revisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="activityCategories" class="form-label">Revisi</label>
                            <textarea class="form-control" id="activityCategories" name="activity_categories" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100">Send Revisi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="activityCategories" class="form-label">CPL</label>
                            <select class="js-example-basic-multiple form-select" name="states[]" id="cpl" multiple="multiple" style="width: 100%;">
                                <option value="Category 1">cpl 1</option>
                                <option value="Category 2">cpl 2</option>
                                <option value="Category 3">cpl 3</option>
                                <option value="Category 4">cpl 4</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#approveModal').on('shown.bs.modal', function () {
                $('#cpl').select2({
                    dropdownParent: $('#approveModal') 
                });
            });
        });
    </script>
</x-app-layouts>
