@extends('layouts.app')

@section('title', 'Create employee - KIT SERVICES')

@section('content')

    <div class="card mb-4 m-5">

        <div class="card-header ">
            <h3 class="card-title">Employee List</h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-lte-toggle="card-collapse"
                    title="Collapse"
                ></button>

                <button
                    type="button"
                    class="btn btn-tool"
                    title="add new employee"
                    style="
                    background:#FF6600;
                    color:#fff;
                    width:40px;
                    height:40px;
                "
                >
                    <a href="{{ route('employee.create') }}" class="text-decoration-none" style="color: white; font-size: 20px">
                        <i class="bi bi-plus-lg"></i>
                    </a>


                </button>

            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <!-- TABLE RESPONSIVE -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Hire Date</th>
                        <th>Contract</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img
                                        src="https://ui-avatars.com/api/?name=Jean+Luc&background=FF6600&color=fff"
                                        alt="Employee Photo"
                                        class="rounded-circle"
                                        width="45"
                                        height="45"
                                    >
                                    <div>
                                        <strong>{{ $employee->first_name }}</strong><br>
                                        <small class="text-muted">{{ $employee->employee_id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $employee->address->address ?? 'N/A' }}</td>
                            <td>
                                {{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->age : '-' }}
                            </td>
                            <td><strong>1,200 USD</strong></td>
                            <td>15/03/2021</td>
                            <td><span class="badge text-bg-success">CDI</span></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>

    </div>

@endsection
