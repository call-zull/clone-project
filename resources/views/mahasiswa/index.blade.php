<x-app-layouts>
    @if (Auth::user()->role == 'mahasiswa')
        <div class="px-0 container-fluid">
            <div class="py-sm-0 py-md-4" style="background-color: #f2f2f2;">
                <div class="app-content-header">
                    <div class="" style="background-color: #ffffff; border-radius: 10px;">
                        <div class="container-fluid">
                            <div class="app-content">
                                <div class="mb-4 card">
                                    <div class="card-body">
                                        <div class="p-3 rounded-sm d-flex flex-column flex-sm-row justify-content-between align-items-center"
                                            style="background-color: #D9D9D9; border-radius: 10px;">
                                            <span class="m-0 col-12 col-sm-5 card-title fw-bold text-dark fs-4">Log
                                                Activity</span>
                                            <div
                                                class="mt-3 d-flex flex-column flex-sm-row align-items-center mt-sm-0 w-100 w-sm-auto">
                                                <!-- Dropdown Filter (Baris Kedua pada Mobile) -->
                                                <div class="mb-3 d-flex w-100 w-sm-auto mb-sm-0">
                                                    <form action="" method="GET" class="d-flex w-100">
                                                        <select name="" id="" class="form-select me-2">
                                                            <option value="">2024</option>
                                                            <option value="">All</option>
                                                            <option value="">Today</option>
                                                            <option value="">This Week</option>
                                                            <option value="">This Month</option>
                                                        </select>
                                                        <select name="" id="" class="form-select me-2">
                                                            <option value="">October</option>
                                                            <option value="">All</option>
                                                            <option value="">Category 1</option>
                                                            <option value="">Category 2</option>
                                                            <option value="">Category 3</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary">Filter</button>
                                                    </form>
                                                </div>

                                                <!-- Add Activity Button (Mobile and Desktop) -->
                                                <div class="w-100 w-sm-auto text-end">
                                                    <button class="btn btn-primary text-nowrap" data-bs-toggle="modal"
                                                        data-bs-target="#addActivityModal"
                                                        style="background-color: #2820FD;">
                                                        Add Activity
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Add Activity -->
                                <div class="modal fade" id="addActivityModal" tabindex="-1"
                                    aria-labelledby="addActivityModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addActivityModalLabel">Add Log Activity</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('activity.report.store') }}" method="POST"
                                                    onsubmit="return validateContent()">
                                                    @csrf

                                                    <input type="hidden" name="batch_id"
                                                        value="{{ Auth::user()->batchUsers->batch_id }}">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="position_id"
                                                        value="{{ Auth::user()->position_id }}">

                                                    <div class="mb-3">
                                                        <input type="date" class="form-control" id="report_date"
                                                            name="report_date" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="project_id" class="form-label">Projek</label>
                                                        <select class="form-select" id="project_id" name="project_id">
                                                            @foreach ($projects as $project)
                                                                <option value="{{ $project->id }}"
                                                                    {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                                    {{ $project->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="activityDescription" class="form-label">Aktivitas
                                                            Hari Ini</label>
                                                        <div class="p-2 my-2 border">
                                                            <label for="activity">Activity</label>

                                                            <!-- Trix Editor -->
                                                            <input id="editor-content" type="hidden" name="activity">
                                                            <trix-editor input="editor-content"></trix-editor>

                                                            <!-- Error Message -->
                                                            <div id="word-count-error" class="mt-2 text-danger"
                                                                style="display: none;">
                                                                <span>The activity must contain at least 10
                                                                    words.</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" id="save-button" disabled
                                                        class="btn btn-primary w-100">Save Activity</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table for Desktop -->
                                <div class="d-none d-sm-block">
                                    <div class="card-body">
                                        <div class="mx-auto table-responsive">
                                            <table class="table text-center table-bordered text-nowrap">
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
                                                <tbody>
                                                    @forelse ($activity as $activity)
                                                        <tr class="align-middle">
                                                            <td>{{ $activity->report_date }}</td>
                                                            <td>{{ $activity->cpl ? $activity->cpl->name : '-' }}</td>
                                                            {{-- ganti nanti projek id ini dengan nama relation modelnya --}}
                                                            <td>{{ $activity->project->name ? $activity->project->name : '-' }}
                                                            </td>
                                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                                                {!! $activity->activity !!}
                                                            </td>

                                                            <td>{{ $activity->checker->name ?? '-' }}</td>
                                                            <td>
                                                                @if ($activity->status == '' || $activity->status == 1)
                                                                    Pending
                                                                @elseif ($activity->status == 2)
                                                                    Revisi
                                                                @elseif ($activity->status == 3)
                                                                    Approved
                                                                @else
                                                                    Unknown
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($activity->status == '' || $activity->status == 1)
                                                                    <button class="btn btn-warning text-nowrap"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#revisiModal">edit</button>
                                                                @elseif ($activity->status == 2)
                                                                    <button class="btn btn-danger text-nowrap"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#revisiModal">Revisi</button>
                                                                @elseif ($activity->status == 3)
                                                                    <button class="btn btn-success text-nowrap"
                                                                        style="cursor: default">approve</button>
                                                                @else
                                                                    Unknown
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-center">No data found.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cards for Mobile -->
                                <div class="d-block d-sm-none">
                                    <div class="mb-3 card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Date:</strong> 30 October 2024</span>
                                                <span><strong>Project:</strong> cpl 1</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Task:</strong> ngopi</span>
                                                <span><strong>Checked By:</strong> mentor</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Status:</strong> revision</span>
                                                <span><button class="btn btn-success text-nowrap"
                                                        style="cursor: default">Approve</button></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Date:</strong> 30 October 2024</span>
                                                <span><strong>Project:</strong> cpl 1</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Task:</strong> ngopi</span>
                                                <span><strong>Checked By:</strong> mentor</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span><strong>Status:</strong> revision</span>
                                                <span><button class="btn btn-danger text-nowrap"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#revisiModal">Revisi</button></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix card-footer">
                                    <ul class="m-0 pagination pagination-sm justify-content-center">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Revisi -->
        <div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="revisiModalLabel">Log Revisi Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <span><i class=""></i></span>
                                <input type="date" class="form-control" id="activityDate" name="activity_date">
                            </div>
                            <div class="mb-3">
                                <label for="activityCategory" class="form-label">Projek</label>
                                <select class="form-select" id="activityCategory" name="activity_category">
                                    <option value="Category 1">Projek 1</option>
                                    <option value="Category 2">Projek 2</option>
                                    <option value="Category 3">Projek 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="activityDescription" class="form-label">Aktivitas Hari Ini</label>
                                <textarea class="form-control" id="activityDescription" name="activity_description" rows="3">revisi dulu</textarea>
                            </div>
                            <!-- Input Revisi Pesan (disabled) -->
                            <div class="mb-3">
                                <label for="revisiMessage" class="form-label">Pesan Revisi</label>
                                <input type="text" class="form-control" id="revisiMessage"
                                    value="Tolong revisi aktivitas ini" disabled>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Save Revisi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById("report_date").value = today;
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const editorContent = document.querySelector("#editor-content");
                const errorElement = document.getElementById("word-count-error");
                const saveButton = document.getElementById("save-button");

                document.addEventListener("trix-change", function(event) {
                    validateContent();
                });

                window.validateContent = function() {
                    const content = editorContent.value.trim();
                    const wordCount = content.split(/\s+/).filter(word => word.length > 0).length;

                    if (wordCount < 3) {
                        errorElement.style.display = "block";
                        saveButton.disabled = true;
                        return false;
                    } else {
                        errorElement.style.display = "none";
                        saveButton.disabled = false;
                        return true;
                    }
                };
            });
        </script>
    @endpush
</x-app-layouts>
