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

                                {{-- modal --}}
                                <x-modal.activity.modal-activity id="addActivityModal">
                                    <form action="{{ route('activity.report.store') }}" method="POST"
                                        onsubmit="return validateContent()">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="date" class="form-control" id="report_date"
                                                name="report_date" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="project_id" class="form-label">Projek</label>
                                            <select class="form-select" id="project_id" name="project_id">
                                                <option value="">-- Pilih Projek --</option>
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
                                            class="btn btn-primary w-100">Save
                                            Activity</button>
                                    </form>
                                </x-modal.activity.modal-activity>
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
                                                    @forelse ($activities as $activity)
                                                        <tr class="align-middle">
                                                            <td>{{ $activity->report_date }}</td>
                                                            <td>{{ $activity->cpl ? $activity->cpl->name : '-' }}</td>
                                                            <td>{{ $activity->project->name ?? '-' }}</td>
                                                            <td
                                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
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
                                                                        data-bs-target="#revisiModal{{ $activity->id }}">edit</button>
                                                                @elseif ($activity->status == 2)
                                                                    <button class="btn btn-danger text-nowrap"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#revisiModal{{ $activity->id }}">Revisi</button>
                                                                @elseif ($activity->status == 3)
                                                                    <button class="btn btn-success text-nowrap"
                                                                        style="cursor: default">approve</button>
                                                                @else
                                                                    Unknown
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <!-- Modal for each activity -->
                                                        <x-modal.activity.modal-activity
                                                            id="revisiModal{{ $activity->id }}"
                                                            title="Update Log Activity">
                                                            <form
                                                                action="{{ route('activity.report.update', $activity->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="mb-3">
                                                                    <input type="date" class="form-control"
                                                                        id="activityDate" name="activity_date"
                                                                        value="{{ $activity->report_date }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="project_id"
                                                                        class="form-label">Projek</label>
                                                                    <select class="form-select" id="project_id"
                                                                        name="project_id">
                                                                        <option value="{{ $activity->project_id }}"
                                                                            {{ old('project_id', $activity->project_id) == $activity->project_id ? 'selected' : '' }}>
                                                                            {{ $activity->project->name }}
                                                                        </option>
                                                                        @foreach ($projects as $project)
                                                                            @continue($project->id == $activity->project_id)
                                                                            <option value="{{ $project->id }}"
                                                                                {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                                                {{ $project->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="activityDescription"
                                                                        class="form-label">Aktivitas Hari Ini</label>
                                                                    <div class="p-2 my-2 border">
                                                                        <label for="activity">Activity</label>

                                                                        <input id="editor-content-{{ $activity->id }}"
                                                                            type="hidden" name="activity"
                                                                            value="{!! $activity->activity !!}">
                                                                    </div>
                                                                    <trix-editor
                                                                        input="editor-content-{{ $activity->id }}"></trix-editor>
                                                                    <div id="word-count-error"
                                                                        class="mt-2 text-danger"
                                                                        style="display: none;">
                                                                        <span>The activity must contain at least 10
                                                                            words.</span>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="revisiMessage"
                                                                        class="form-label">Pesan Revisi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="revisiMessage"
                                                                        value="{{ $activity->rejected_reason }}"
                                                                        disabled>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-warning w-100">Save Revisi</button>
                                                            </form>
                                                        </x-modal.activity.modal-activity>

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
                                    @forelse ($activities as $item)
                                        <div class="mb-3 card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <span><strong>Date:</strong> {{ $item->report_date }}</span>
                                                    <span><strong>Project:</strong>
                                                        {{ $item->project->name ?? '-' }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span><strong>Task:</strong> {!! $item->activity !!}</span>
                                                    <span><strong>Checked By:</strong>
                                                        {{ $item->checker->name ?? '-' }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span><strong>Status:</strong>
                                                        @if ($item->status == '' || $item->status == 1)
                                                            Pending
                                                        @elseif ($item->status == 2)
                                                            Revisi
                                                        @elseif ($item->status == 3)
                                                            Approved
                                                        @else
                                                            Unknown
                                                        @endif
                                                    </span>
                                                    <span>
                                                        @if ($item->status == '' || $item->status == 1)
                                                            <button class="btn btn-warning text-nowrap"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#revisiModalmobile{{ $item->id }}">edit</button>
                                                        @elseif ($item->status == 2)
                                                            <button class="btn btn-danger text-nowrap"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#revisiModalmobile{{ $item->id }}">Revisi</button>
                                                        @elseif ($item->status == 3)
                                                            <button class="btn btn-success text-nowrap"
                                                                style="cursor: default">approve</button>
                                                        @else
                                                            Unknown
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for each activity -->
                                        <x-modal.activity.modal-activity id="revisiModalmobile{{ $item->id }}"
                                            title="Update Log Activity">
                                            <form action="{{ route('activity.report.update', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <input type="date" class="form-control" id="activityDate"
                                                        name="activity_date" value="{{ $activity->report_date }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="project_id" class="form-label">Projek</label>
                                                    <select class="form-select" id="project_id" name="project_id">
                                                        <option value="{{ $activity->project_id }}"
                                                            {{ old('project_id', $activity->project_id) == $activity->project_id ? 'selected' : '' }}>
                                                            {{ $activity->project->name }}
                                                        </option>
                                                        @foreach ($projects as $project)
                                                            @continue($project->id == $activity->project_id)
                                                            <option value="{{ $project->id }}"
                                                                {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                                                {{ $project->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="activityDescription" class="form-label">Aktivitas Hari
                                                        Ini</label>
                                                    <div class="p-2 my-2 border">
                                                        <label for="activity">Activity</label>

                                                        <input id="editor-content-{{ $activity->id }}" type="hidden"
                                                            name="activity" value="{!! $activity->activity !!}">
                                                    </div>
                                                    <trix-editor
                                                        input="editor-content-{{ $item->id }}"></trix-editor>
                                                    <!-- Error Message -->
                                                    <div id="word-count-error" class="mt-2 text-danger"
                                                        style="display: none;">
                                                        <span>The activity must contain at least 10
                                                            words.</span>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="revisiMessage" class="form-label">Pesan Revisi</label>
                                                    <input type="text" class="form-control" id="revisiMessage"
                                                        value="{{ $item->rejected_reason }}" disabled>
                                                </div>
                                                <button type="submit" class="btn btn-warning w-100">Save
                                                    Revisi</button>
                                            </form>
                                        </x-modal.activity.modal-activity>
                                    @empty
                                        <div class="text-center">No activity found.</div>
                                    @endforelse

                                </div>

                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm justify-content-center m-0">
                                        {{ $activities->withQueryString()->links() }}
                                    </ul>
                                </div>

                            </div>
                        </div>
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
