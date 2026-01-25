@foreach($employees as $employee)
    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('storage/', $employee->photo) }}"
                     class="rounded-circle"
                     width="45" height="45">

                <div>
                    <strong>{{ $employee->first_name }}</strong><br>
                    <small>{{ $employee->employee_id }}</small>
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
            <a href="{{ route('employee.view',$employee->id) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-eye"></i>
            </a>

            <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-sm btn-outline-warning">
                <i class="bi bi-pencil-square"></i>
            </a>

            <button
                class="btn btn-sm btn-outline-danger"
                title="Disable"
                data-bs-toggle="modal"
                data-bs-target="#disableEmployeeModal"
                data-employee-id="{{ $employee->id }}"
            >
                <i class="bi bi-trash"></i>
            </button>


        </td>
    </tr>
@endforeach
