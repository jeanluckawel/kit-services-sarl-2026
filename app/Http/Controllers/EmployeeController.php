<?php

namespace App\Http\Controllers;

use App\Models\Employee\Address;
use App\Models\Employee\Children;
use App\Models\Employee\Company;
use App\Models\Employee\Emergency;
use App\Models\Employee\Employee;
use App\Models\Employee\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // 1️⃣ Employee validation
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'middle_name'=> 'nullable|string',
            'gender'     => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'number_card'   => 'nullable|string',
            'pays'          => 'nullable|string',
            'marital_status'=> 'nullable|string',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2️⃣ Address validation
        $addressData = $request->validate([
            'employee_number' => 'required|string',
            'employee_city'   => 'required|string',
            'employee_province' => 'required|string',
            'employee_phone'  => 'required|string',
            'employee_email'  => 'required|email',
            'employee_emergency_phone' => 'nullable|string',
        ]);
        $addressData = [
            'number' => $addressData['employee_number'],
            'city' => $addressData['employee_city'],
            'province' => $addressData['employee_province'],
            'phone' => $addressData['employee_phone'],
            'email' => $addressData['employee_email'],
            'emergency_phone' => $addressData['employee_emergency_phone'] ?? null,
        ];

        // 3️⃣ Company validation
        $companyData = $request->validate([
            'job_title' => 'required|string',
            'department'=> 'required|string',
            'section'   => 'required|string',
            'contract_type' => 'required|in:CDI,CDD,Stage,Consultant',
            'hire_date' => 'required|date',
            'end_contract_date' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    if (in_array($request->contract_type, ['CDD','Stage','Consultant']) && empty($value)) {
                        $fail('End contract date is required for this contract type.');
                    }
                },
            ],
            'work_location' => 'required|string',
            'supervisor' => 'required|string',
            'employee_type' => 'required|in:Full Time,Part Time',
        ]);

        // 4️⃣ Salary validation
        $salaryRequest = $request->validate([
            'salary_base_salary' => 'nullable|numeric',
            'salary_category'    => 'nullable|string',
            'salary_echelon'     => 'nullable|string',
            'salary_currency'    => 'required|in:USD,CDF',
        ]);
        $salaryData = [
            'base_salary' => $salaryRequest['salary_base_salary'] ?? 0,
            'category'    => $salaryRequest['salary_category'] ?? null,
            'echelon'     => $salaryRequest['salary_echelon'] ?? null,
            'currency'    => $salaryRequest['salary_currency'],
        ];

        // 5️⃣ Emergency validation
        $emergencyRequest = $request->validate([
            'emergency_relationship' => 'nullable|string',
            'emergency_full_name'    => 'nullable|string',
            'emergency_phone'        => 'nullable|string',
            'emergency_address'      => 'nullable|string',
        ]);
        $emergencyData = [
            'relationship' => $emergencyRequest['emergency_relationship'] ?? null,
            'full_name'    => $emergencyRequest['emergency_full_name'] ?? null,
            'phone'        => $emergencyRequest['emergency_phone'] ?? null,
            'address'      => $emergencyRequest['emergency_address'] ?? null,
        ];

        // 6️⃣ Children validation (outside $emergencyData)
        $childrenRequest = $request->validate([
            'children.*.full_name'     => 'required|string',
            'children.*.date_of_birth' => 'required|date',
            'children.*.gender'        => 'required|in:M,F',
        ]);

        // 7️⃣ Photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // 8️⃣ Database Transaction
        DB::transaction(function () use ($validated, $addressData, $companyData, $salaryData, $emergencyData, $childrenRequest) {

            // Create employee_id
            $latest = Employee::latest('id')->first();
            $nextId = $latest ? $latest->id + 1 : 1;
            $validated['employee_id'] = 'KAM_KIT' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
            $validated['status'] = 1;

            // Create Employee
            $employee = Employee::create($validated);

            // Create Address
            Address::create(array_merge($addressData, [
                'employee_id' => $employee->employee_id,
            ]));

            // Create Company
            Company::create(array_merge($companyData, [
                'employee_id' => $employee->employee_id,
            ]));

            // Create Salary
            Salary::create(array_merge($salaryData, [
                'employee_id' => $employee->employee_id,
            ]));

            // Create Emergency
            if (array_filter($emergencyData)) {
                Emergency::create(array_merge($emergencyData, [
                    'employee_id' => $employee->employee_id,
                ]));
            }

            // Create Children
            if (!empty($childrenRequest['children'])) {
                foreach ($childrenRequest['children'] as $child) {
                    Children::create([
                        'employee_id'   => $employee->employee_id,
                        'full_name'     => $child['full_name'],
                        'date_of_birth' => $child['date_of_birth'],
                        'gender'        => $child['gender'],
                    ]);
                }
            }
        });

        return redirect()
            ->route('employee.list')
            ->with('success', 'Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function list()
    {
        $employees = Employee::where('status', 1)
            ->latest('id')
            ->take(10)
            ->get();

        return view('Employee.list', compact('employees'));
    }
}
