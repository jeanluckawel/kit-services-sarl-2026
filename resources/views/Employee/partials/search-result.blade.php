@foreach($employees as $employee)
    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>
            <div class="d-flex align-items-center gap-2">
                @php

                    $initials = strtoupper(substr($employee->first_name,0,1) . substr($employee->last_name,0,1));

                    $bgColor = '#ff7f00';
                @endphp

                @if($employee->photo)
                    <img src="{{ asset('storage/'.$employee->photo) }}"
                         alt="Photo"
                         class="rounded-circle"
                         width="45"
                         height="45">
                @else
                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                         style="width:45px; height:45px; background-color: {{ $bgColor }}; color:white; font-weight:bold; font-size:16px;">
                        {{ $initials }}
                    </div>
                @endif

                <div>
                    <strong>{{ $employee->first_name }}</strong><br>
                    <small>{{ $employee->employee_id }}</small>
                </div>
            </div>
        </td>

        <td>{{ $employee->company->department ?? 'N/A' }}</td>

        <td>
            {{ $employee->age >= 1 ? $employee->age . ' ' . ($employee->age > 1 ? 'ans' : 'an') : '-' }}
        </td>

        <td><strong>{{ number_format($employee->salaries->base_salary,2 ?? 'N/A' ) }}</strong></td>

        <td>{{ $employee->company->hire_date ?? 'N/A'}}</td>

        <td>
            @php
                $type = $employee->company->contract_type ?? '';
                $endDate = $employee->company->end_contract_date ?? null;
            @endphp

            @if(strtoupper($type) === 'CDD')
                <span class="badge" style="background-color: #ff7f00; color:white;">
            {{ $type }}
                    @if($endDate)
                        ({{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }})
                    @endif
        </span>
            @elseif(strtoupper($type) === 'CDI')
                <span class="badge" style="background-color: #dc3545; color:white;">
            {{ $type }}
        </span>
            @else
                <span>{{ $type }}</span>
            @endif
        </td>

        <td class="text-center">
            <div class="d-inline-flex gap-1">


                <a href="{{ route('employee.view', $employee->id) }}"
                   class="btn btn-sm btn-outline-primary"
                   title="View">
                    <i class="bi bi-eye"></i>
                </a>


                <a href="{{ route('employee.edit', $employee->id) }}"
                   class="btn btn-sm btn-outline-warning"
                   title="Edit">
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

            </div>
        </td>
    </tr>
@endforeach
