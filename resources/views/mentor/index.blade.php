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
                                        <div class="p-3 rounded-sm d-flex flex-md-row flex-column justify-content-between align-items-center"
                                            style="background-color: #D9D9D9; border-radius: 10px;">
                                            <span class="m-0 card-title fw-bold text-dark fs-4">Log Activity</span>

                                            <form action="" method="GET" class="d-flex mt-md-0 mt-2">
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

                                                <button type="submit" class="btn btn-primary ms-2">Filter</button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- <div class="card-body">
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
                                    </div> --}}
                                    <div class="card-body d-flex flex-column gap-3">
                                        @foreach ($reports as $report)
                                            <div class="card shadow-none w-100 border-0 d-md-block d-none"
                                                style="background-color: #F1F5F9">
                                                <div class="card-body p-0">
                                                    <div class="d-flex justify-content-between"
                                                        style="padding: 16px 40px;border-bottom: 2px solid #E2E8F0">
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold">{{ $report->user->name }}</span>
                                                            <span
                                                                style="font-size: 14px; color: #94A3B8">{{ $report->user->position->name }}</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold">{{ $report->report_date }}</span>
                                                            <span style="font-size: 14px; color: #94A3B8">09:53</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold">CPL</span>
                                                            <span style="font-size: 14px; color: #94A3B8">CPL-04</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold">Project</span>
                                                            <span
                                                                style="font-size: 14px; color: #94A3B8">{{ $report->project->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between"
                                                        style="padding: 16px 40px">
                                                        <div class="d-flex flex-column">
                                                            <span class="fw-bold">
                                                                <img src="{{ asset('assets/image/file-icon.svg') }}"
                                                                    alt="File Icon">
                                                                Yang Dikerjakan
                                                            </span>
                                                            <span style="font-size: 14px; color: #94A3B8">
                                                                - testing
                                                                - testing aja
                                                            </span>
                                                        </div>
                                                        <div class="d-flex flex-column gap-3">
                                                            <span class="fw-bold">
                                                                <img src="{{ asset('assets/image/info-icon.svg') }}"
                                                                    alt="Info Icon">
                                                                Revisi
                                                            </span>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#revisiModal-{{ $report->id }}"
                                                                type="button" class="btn btn-warning text-white">+
                                                                Tambah
                                                                Catatan</button>
                                                        </div>
                                                        <div class="d-flex flex-column gap-3">
                                                            <span class="fw-bold">
                                                                <img src="{{ asset('assets/image/file-icon.svg') }}"
                                                                    alt="File Icon">
                                                                Status Checked
                                                            </span>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#statusChecked-{{ $report->id }}"
                                                                type="button" class="btn btn-warning text-white">+
                                                                Approved</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table d-md-none d-block table-borderless"
                                                style="border-bottom: 2px solid #E2E8F0">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold w-50">Nama</td>
                                                        <td class="w-50">{{ $report->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Posisi</td>
                                                        <td class="w-50">{{ $report->position->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Tanggal</td>
                                                        <td class="w-50">{{ $report->report_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">CPL</td>
                                                        <td class="w-50">CPL-04</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Project</td>
                                                        <td class="w-50">{{ $report->project->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Yang Dikerjakan</td>
                                                        <td class="w-50">-ini kerjaan <br>-ini juga kerjaan</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Revisi</td>
                                                        <td class="w-50">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#revisiModal-{{ $report->id }}"
                                                                type="button" class="btn btn-warning text-white">+
                                                                Tambah
                                                                Catatan</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold w-50">Status Checked</td>
                                                        <td class="w-50">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#statusChecked-{{ $report->id }}"
                                                                type="button" class="btn btn-warning text-white">+
                                                                Approved</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <x-modal.modal-mentor id="revisiModal-{{ $report->id }}"
                                                title="Tambah Catatan (revisi)">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Tanggal Hari Ini</span>
                                                        <span>{{ $report->report_date }}</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">CPL</span>
                                                        <span>CPL-04</span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold">Project</span>
                                                        <span>{{ $report->project->name }}</span>
                                                    </div>
                                                </div>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <div class="mb-3 mt-4">
                                                        <label for="activityCategories"
                                                            class="form-label">Revisi</label>
                                                        <textarea class="form-control" id="activityCategories" name="activity_categories" cols="30" rows="5"
                                                            required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary w-100">Send
                                                            Revisi</button>
                                                    </div>
                                                </form>
                                            </x-modal.modal-mentor>
                                            <x-modal.modal-mentor id="statusChecked-{{ $report->id }}"
                                                title="Status Checked">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <label for="Status">Status</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Pilih Status</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Approved</option>
                                                        <option value="3">Revision</option>
                                                    </select>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary w-100">Send
                                                            Revisi</button>
                                                    </div>
                                                </form>
                                            </x-modal.modal-mentor>
                                        @endforeach
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



    {{-- <div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel" aria-hidden="true">
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
                            <textarea class="form-control" id="activityCategories" name="activity_categories" cols="30" rows="5"
                                required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100">Send Revisi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel"
        aria-hidden="true">
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
                            <select class="js-example-basic-multiple form-select" name="states[]" id="cpl"
                                multiple="multiple" style="width: 100%;">
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
            $('#approveModal').on('shown.bs.modal', function() {
                $('#cpl').select2({
                    dropdownParent: $('#approveModal')
                });
            });
        });
    </script>
</x-app-layouts>
