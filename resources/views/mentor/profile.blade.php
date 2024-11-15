<x-app-layouts>
    @if (Auth::user()->role == 'mentor')
        <div class="container-fluid">
            <div class="my-4" style="background-color: #f2f2f2;">
                <div class="app-content-header">
                    <div class="py-6" style="border-radius: 10px;">
                        <div class="container-fluid">
                            <div class="app-content">
                                <div>
                                    <span>Setting</span>
                                    <h1 class="fw-bold">Setting</h1>
                                </div>
                                <div class="card mt-4"
                                    style="border-top-left-radius: 20px; border-top-right-radius: 20px">
                                    <div class="card-body p-0 position-relative">
                                        <img src="{{ asset('assets/image/profile-bg.png') }}" alt="Profile Background"
                                            style="border-top-left-radius: 20px; border-top-right-radius: 20px; height: 203px"
                                            class="w-100">
                                        <div style="margin: 0px 32px; top: 116px" class="position-absolute">
                                            <div class="d-flex flex-column position-relative" style="width: 146px">
                                                <img src="https://ui-avatars.com/api/?name=John+Doe&length=1&size=146&rounded=true"
                                                    alt="">
                                                <div style="background-color: #2820FD; align-self: flex-start"
                                                    class="position-absolute bottom-0 end-0 rounded-circle border border-5 border-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" viewBox="0 0 24 24">
                                                        <path fill="white"
                                                            d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-pills gap-2" style="margin: 110px 32px 0 32px" id="pills-tab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-profile-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                                    role="tab" aria-controls="pills-profile" aria-selected="true"
                                                    style="border-radius: 20px; padding: 8px 40px;">Profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-home" type="button" role="tab"
                                                    aria-controls="pills-home" aria-selected="false"
                                                    style="border-radius: 20px; padding: 8px 40px;">Password &
                                                    Security</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent" style="margin:32px">
                                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <div class="row" id="show-profile">
                                                    <div class="col-12 col-md-6 d-flex flex-column" style="gap: 32px">
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">Username</span>
                                                            <span style="font-size: 20px" class="fw-bold">Delicious
                                                                Burger</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">Program Studi</span>
                                                            <span style="font-size: 20px" class="fw-bold">Teknologi
                                                                Informasi</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">Phone Number</span>
                                                            <span style="font-size: 20px" class="fw-bold">+62 815 4667
                                                                8977</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-4 mt-md-0 d-flex flex-column"
                                                        style="gap: 32px">
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">NIM</span>
                                                            <span style="font-size: 20px"
                                                                class="fw-bold">1910812710344</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">Posisi yang dipilih</span>
                                                            <span style="font-size: 20px"
                                                                class="fw-bold">Programmer</span>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span style="font-size: 14px">E-Mail</span>
                                                            <span style="font-size: 20px"
                                                                class="fw-bold">Faidrahman1811@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-none" id="show-edit-profile">
                                                    <div class="col-12 col-md-6 d-flex flex-column" style="gap: 32px">
                                                        <div class="d-flex flex-column gap-4">
                                                            <div>
                                                                <label for="old_password"
                                                                    class="form-label">Username</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Masukkan Username">
                                                            </div>
                                                            <div>
                                                                <label for="old_password" class="form-label">Program
                                                                    Studi</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Masukkan Program Studi">
                                                            </div>
                                                            <div>
                                                                <label for="old_password" class="form-label">Phone
                                                                    Number</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Masukkan Phone Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mt-4 mt-md-0 d-flex flex-column"
                                                        style="gap: 32px">
                                                        <div class="d-flex flex-column gap-4">
                                                            <div>
                                                                <label for="old_password"
                                                                    class="form-label">NIM</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Masukkan NIM">
                                                            </div>
                                                            <div>
                                                                <label for="old_password" class="form-label">Posisi
                                                                    Yang Dipilih</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Enter Old Password">
                                                            </div>
                                                            <div>
                                                                <label for="old_password"
                                                                    class="form-label">E-Mail</label>
                                                                <input id="old_password" type="old_password"
                                                                    class="form-control" name="old_password" required
                                                                    autocomplete="old_password" autofocus
                                                                    placeholder="Enter Old Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end" style="margin-top: 46px">
                                                    <button id="btn_edit_profile" type="button"
                                                        class="btn btn-primary"
                                                        style="border-radius: 8px;padding: 8px 40px">Edit
                                                        Profile</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="d-flex flex-column gap-4">
                                                    <div>
                                                        <label for="old_password" class="form-label">Old
                                                            Password</label>
                                                        <input id="old_password" type="old_password"
                                                            class="form-control" name="old_password" required
                                                            autocomplete="old_password" autofocus
                                                            placeholder="Enter Old Password">
                                                    </div>
                                                    <div>
                                                        <label for="new_password" class="form-label">New
                                                            Password</label>
                                                        <input id="new_password" type="new_password"
                                                            class="form-control" name="new_password" required
                                                            autocomplete="new_password" autofocus
                                                            placeholder="Enter new Password">
                                                    </div>
                                                    <div>
                                                        <label for="confirm_password" class="form-label">Confirm
                                                            Password</label>
                                                        <input id="confirm_password" type="confirm_password"
                                                            class="form-control" name="confirm_password" required
                                                            autocomplete="confirm_password" autofocus
                                                            placeholder="Enter Confirm Password">
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-primary"
                                                            style="border-radius: 8px;padding: 8px 40px">Reset
                                                            Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

            $('#btn_edit_profile').on('click', function() {
                const showProfile = $('#show-profile');
                const showEditProfile = $('#show-edit-profile');
                const btnEditProfile = $('#btn_edit_profile');
                showProfile.addClass('d-none');
                showEditProfile.removeClass('d-none');
                btnEditProfile.text('Update Profile');
            });
        });
    </script>
</x-app-layouts>
