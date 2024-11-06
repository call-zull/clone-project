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
                                                        <th>Checked By: (dospem)</th>
                                                        <th>Revision</th>
                                                        <th style="width: 40px">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-nowrap">
                                                    <tr class="align-middle">
                                                        <td>30 October 2024 - 09:53</td>
                                                        <td>Update software</td>
                                                        <td>cpl 1</td>
                                                        <td>ngopi</td>
                                                        <td>mentor</td>
                                                        <td>my dospem</td>
                                                        <td>revision</td>
                                                        <td>
                                                            <a href="">revisi</a>
                                                            <a href="">setuju</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
        </div>
    @endif
</x-app-layouts>
