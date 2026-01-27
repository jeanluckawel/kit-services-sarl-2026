@extends('layoutsddd.app')

@section('title', 'Create Employee - KIT SERVICES')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .select2-container .select2-results__option img {
            width: 20px;
            height: 15px;
            margin-right: 8px;
        }

        .select2-container .select2-selection__rendered img {
            width: 20px;
            height: 15px;
            margin-right: 8px;
        }
    </style>


    <div class="card mb-4 m-5 border-0" style="border-radius:0;">
        <!-- Header -->
        <div class="card-header d-flex align-items-center"
             style="background-color: #FF6600; color: #fff; border-radius:0;">
            <h3 class="card-title mb-0">Add New Employee</h3>
            <nav aria-label="breadcrumb" class="ms-auto">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee.list') }}" class="text-white">Employee</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>

        <!-- Form -->
        <div class="card-body">
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <!-- Tabs nav -->
                <ul class="nav nav-tabs mb-4" id="employeeTab" role="tablist" style="border-radius:0;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal" type="button" role="tab"
                                style="color:#FF6600; font-weight:500; border-radius:0;">
                            <i class="bi bi-person-fill me-1"></i> Personal
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                                type="button" role="tab" style="color:#FF6600; font-weight:500; border-radius:0;">
                            <i class="bi bi-geo-alt-fill me-1"></i> Address
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo"
                                type="button" role="tab" style="color:#FF6600; font-weight:500; border-radius:0;">
                            <i class="bi bi-camera-fill me-1"></i> Photo
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company"
                                type="button" role="tab" style="color:#ff6600; font-weight:500;">
                            <i class="bi bi-briefcase-fill me-1"></i> Company
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education"
                                type="button" role="tab" style="color:#ff6600; font-weight:500;">
                            <i class="bi bi-book-fill me-1"></i> children
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dependants-tab" data-bs-toggle="tab" data-bs-target="#dependants"
                                type="button" role="tab" style="color:#ff6600; font-weight:500;">
                            <i class="bi bi-people-fill me-1"></i> Dependants
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="emergency-tab" data-bs-toggle="tab" data-bs-target="#emergency"
                                type="button" role="tab" style="color:#ff6600; font-weight:500;">
                            <i class="bi bi-telephone-fill me-1"></i> Emergency
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary"
                                type="button" role="tab" style="color:#ff6600; font-weight:500;">
                            <i class="bi bi-cash-stack me-1"></i> Salary
                        </button>
                    </li>
                </ul>


                <!-- Tabs content -->
                <div class="tab-content" id="employeeTabContent">

                    <!-- Personal Info -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">
                                    First Name   <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="first_name" class="form-control" placeholder="Jean Luc"
                                         autocomplete="off" style="border-radius:0;">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Last Name   </label>
                                <input type="text" name="last_name" class="form-control" placeholder="Kawel"
                                       autocomplete="off" style="border-radius:0;">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" placeholder="A Mbumb"
                                       autocomplete="off" style="border-radius:0;">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Gender  </label>
                                <select name="gender"   class="form-select" style="border-radius:0;">
                                    <option value="">Select</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Date of Birth <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth"   class="form-control"
                                       style="border-radius:0;">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Number Card   </label>
                                <input type="text" name="number_card"   class="form-control"
                                       placeholder="NN338638245 / OP87974" autocomplete="off" style="border-radius:0;">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Country   </label>
                                <select name="pays" id="country" class="form-select"   style="border-radius:0;">
                                    <option value="">Select Country</option>
                                </select>
                            </div>


                            <div class="col-md-4">
                                <label class="form-label fw-bold">Marital Status <span
                                        class="text-danger">*</span></label>
                                <select name="marital_status"   class="form-select" style="border-radius:0;">
                                    <option value="">Select</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Address  -->
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Number   </label>
                                <input type="text" name="employee_number" class="form-control" placeholder="6"
                                       autocomplete="off"   style="border-radius:0;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">City   </label>
                                <input type="text" name="employee_city" class="form-control" placeholder="Manika"
                                       autocomplete="off"   style="border-radius:0;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Province   </label>
                                <input type="text" name="employee_province" class="form-control" placeholder="Lualaba"
                                       autocomplete="off"   style="border-radius:0;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone   </label>
                                <input type="text" name="employee_phone" class="form-control"
                                       placeholder="+243 974 453 545" autocomplete="off"
                                       style="border-radius:0;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Emergency Phone</label>
                                <input type="text" name="employee_emergency_phone" class="form-control"
                                       placeholder="+243 830 835 071" autocomplete="off" style="border-radius:0;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email   </label>
                                <input type="email" name="employee_email" class="form-control"
                                       placeholder="jeanluckawel45@mail.com" autocomplete="off"
                                       style="border-radius:0;">
                            </div>
                        </div>
                    </div>


                    <!-- Company  -->
                    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <div class="row g-3 mt-3">

                            <!-- Job Title -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Job Title
                                </label>
                                <select name="job_title" class="form-select"   style="border-radius:0;">
                                    <option value="">Select Job Title</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="HR Officer">HR Officer</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="IT Support">IT Support</option>
                                    <option value="Manager">Manager</option>
                                </select>
                            </div>

                            <!-- Department -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Department
                                </label>
                                <select name="department" class="form-select"   style="border-radius:0;">
                                    <option value="">Select Department</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="IT">IT</option>
                                    <option value="Operations">Operations</option>
                                    <option value="Administration">Administration</option>
                                </select>
                            </div>

                            <!-- Section -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Section
                                </label>
                                <select name="section" class="form-select"   style="border-radius:0;">
                                    <option value="">Select Section</option>
                                    <option value="Payroll">Payroll</option>
                                    <option value="Recruitment">Recruitment</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Security">Security</option>
                                </select>
                            </div>

                            <!-- Contract Type -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Contract Type
                                </label>
                                <select name="contract_type" id="contract_type" class="form-select"
                                          style="border-radius:0; color:#ff6600;">
                                    <option value="">Select Contract Type</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="Stage">Stage</option>
                                    <option value="Consultant">Consultant</option>
                                </select>
                            </div>

                            <!-- Hire Date -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Hire Date
                                </label>
                                <input type="date" name="hire_date" class="form-control"
                                         style="border-radius:0;">
                            </div>

                            <!-- End Contract Date -->
                            <div class="col-md-6 d-none" id="endContractWrapper">
                                <label class="form-label fw-bold">
                                    End Contract Date
                                </label>
                                <input type="date" name="end_contract_date"
                                       class="form-control" style="border-radius:0;">
                            </div>

                            <!-- Work Location -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Work Location
                                </label>
                                <select name="work_location" class="form-select"  style="border-radius:0;">
                                    <option value="">Select Work Location</option>
                                    <option value="Head Office">Head Office</option>
                                    <option value="Site A">Site A</option>
                                    <option value="Site B">Site B</option>
                                    <option value="Remote">Remote</option>
                                </select>
                            </div>

                            <!-- Supervisor -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Supervisor
                                </label>
                                <select name="supervisor" class="form-select"
                                         style="border-radius:0;">
                                    <option value="">Select Supervisor</option>
                                    <option value="HR Manager">HR Manager</option>
                                    <option value="Operations Manager">Operations Manager</option>
                                    <option value="Finance Director">Finance Director</option>
                                </select>
                            </div>

                            <!-- Employee Type -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    Employee Type
                                </label>
                                <select name="employee_type" class="form-select"
                                         style="border-radius:0; color:#ff6600;">
                                    <option value="">Select Employee Type</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <div class="row g-3 mt-3">

                            <div id="childrenContainer">
                                <div class="row g-3 child-row mb-2 align-items-end">
                                    <!-- Child Full Name -->
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Full Name</label>
                                        <input type="text" name="children[0][full_name]" class="form-control"
                                               placeholder="Full Name" autocomplete="off" style="border-radius:0;">
                                    </div>

                                    <!-- Child Date of Birth -->
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Date of Birth</label>
                                        <input type="date" name="children[0][date_of_birth]" class="form-control"
                                               style="border-radius:0;">
                                    </div>

                                    <!-- Child Gender -->
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Gender</label>
                                        <select name="children[0][gender]" class="form-select"
                                                style="border-radius:0; color:#ff6600;">
                                            <option value="">Select Gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>


                                    <div class="col-md-1 d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger btn-sm removeChild"
                                                style="border-radius:0;">&times;
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="button" id="addChildBtn" class="btn btn-outline-warning"
                                        style="border-radius:0;">
                                    + Add Child
                                </button>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="emergency" role="tabpanel" aria-labelledby="emergency-tab">
                        <div class="row g-3 mt-3">

                            <div class="col-md-3">
                                <label class="form-label fw-bold">Relationship</label>
                                <select name="emergency_relationship" class="form-select" style="border-radius:0;">
                                    <option value="">Select Relationship</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="emergency_full_name" class="form-control"
                                       placeholder="Full Name" autocomplete="off" style="border-radius:0;">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="emergency_phone" class="form-control"
                                       placeholder="+123456789" autocomplete="off" style="border-radius:0;">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-bold">Address</label>
                                <input type="text" name="emergency_address" class="form-control"
                                       placeholder="Address" autocomplete="off" style="border-radius:0;">
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="dependants" role="tabpanel">
                        <div class="row g-3 mt-3">

                            <div id="dependantsContainer">

                                <!-- FIRST DEPENDANT -->
                                <div class="row g-3 mb-2 dependant-row">
                                    <div class="col-md-3">
                                        <select name="dependants[0][relationship]" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" name="dependants[0][full_name]" class="form-control"
                                               placeholder="Full Name">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" name="dependants[0][phone]" class="form-control"
                                               placeholder="Phone">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" name="dependants[0][address]" class="form-control"
                                               placeholder="Address">
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <button type="button" id="addDependant" class="btn btn-outline-warning"
                                        style="border-radius:0;">
                                    + Add Dependant
                                </button>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                        <div class="row g-3 mt-3">
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Base Salary</label>
                                <input type="number" step="0.01" name="salary_base_salary" class="form-control"
                                       placeholder="0.00" autocomplete="off" style="border-radius:0;">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label fw-bold">Category</label>
                                <select name="salary_category" class="form-select"
                                        style="border-radius:0; color:#ff6600;">
                                    <option value="">Select Category</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                </select>
                            </div>


                            <div class="col-md-3">
                                <label class="form-label fw-bold">Echelon</label>
                                <select name="salary_echelon" class="form-select"
                                        style="border-radius:0; color:#ff6600;">
                                    <option value="">Select Echelon</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                </select>
                            </div>


                            <div class="col-md-3">
                                <label class="form-label fw-bold">Currency</label>
                                <select name="salary_currency" class="form-select"
                                        style="border-radius:0; color:#ff6600;">
                                    <option value="USD">USD</option>
                                    <option value="CDF">CDF</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Photo -->
                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Upload Photo</label>
                                <input type="file" name="photo" class="form-control" id="photoInput" accept="image/*"
                                       style="border-radius:0;">
                                <div class="mt-2">
                                    <img id="photoPreview" src="#" alt="Preview" class="img-fluid d-none"
                                         style="max-height: 150px; border: 1px solid #FF6600;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>


            </form>
        </div>
    </div>

    <script>
        document.getElementById('photoInput').addEventListener('change', function (event) {
            const [file] = event.target.files;
            const preview = document.getElementById('photoPreview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        });

        let childIndex = 1;

        document.getElementById('addChildBtn').addEventListener('click', function () {
            const container = document.getElementById('childrenContainer');

            const childRow = document.createElement('div');
            childRow.classList.add('row', 'g-3', 'child-row', 'mb-2');
            childRow.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="children[${childIndex}][full_name]" class="form-control" placeholder="Full Name" autocomplete="off" style="border-radius:0;">
            </div>
            <div class="col-md-4">
                <input type="date" name="children[${childIndex}][date_of_birth]" class="form-control" style="border-radius:0;">
            </div>
            <div class="col-md-3">
                <select name="children[${childIndex}][gender]" class="form-select" style="border-radius:0; color:#ff6600;">
                    <option value="">Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm removeChild" style="border-radius:0;">&times;</button>
            </div>
        `;
            container.appendChild(childRow);
            childIndex++;
        });


        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeChild')) {
                e.target.closest('.child-row').remove();
            }
        });


        let dependantIndex = 1;

        document.getElementById('addDependant').addEventListener('click', function () {
            const container = document.getElementById('dependantsContainer');

            const row = document.createElement('div');
            row.className = 'row g-3 mb-2 dependant-row';

            row.innerHTML = `
        <div class="col-md-3">
            <select name="dependants[${dependantIndex}][relationship]" class="form-select">
                <option value="">Select</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Spouse">Spouse</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
            </select>
        </div>

        <div class="col-md-3">
            <input type="text" name="dependants[${dependantIndex}][full_name]" class="form-control" placeholder="Full Name">
        </div>

        <div class="col-md-3">
            <input type="text" name="dependants[${dependantIndex}][phone]" class="form-control" placeholder="Phone">
        </div>

        <div class="col-md-2">
            <input type="text" name="dependants[${dependantIndex}][address]" class="form-control" placeholder="Address">
        </div>

        <div class="col-md-1">
            <button type="button" class="btn btn-danger btn-sm removeDependant">X</button>
        </div>
    `;

            container.appendChild(row);
            dependantIndex++;

            row.querySelector('.removeDependant').onclick = () => row.remove();
        });


        //     == country

        $(document).ready(function () {
            const $select = $('#country');

            fetch('https://countriesnow.space/api/v0.1/countries/flag/images')
                .then(response => response.json())
                .then(data => {
                    if (!data.error) {


                        const rdcOption = new Option("RD Congo", "Democratic Republic of the Congo", false, false);
                        $(rdcOption).attr('data-flag', "https://flagcdn.com/w20/cd.png");
                        $select.append(rdcOption);

                        data.data.forEach(country => {

                            if (country.name === "Democratic Republic of the Congo") return;

                            const option = new Option(country.name, country.name, false, false);
                            $(option).attr('data-flag', country.flag);
                            $select.append(option);
                        });


                        $select.select2({
                            templateResult: formatCountry,
                            templateSelection: formatCountry,
                            width: '100%'
                        });
                    }
                })
                .catch(error => console.error('Error fetching countries:', error));


            function formatCountry(country) {
                if (!country.id) return country.text;
                const flagUrl = $(country.element).attr('data-flag');
                if (flagUrl) {
                    return $(
                        `<span style="display:flex; align-items:center;">
                    <img src="${flagUrl}" srcset="${flagUrl.replace('w20', 'w40')} 2x" width="20" style="margin-right:8px;" alt="${country.text}" />
                    ${country.text}
                </span>`
                    );
                }
                return country.text;
            }
        });


        // company
        document.getElementById('contract_type').addEventListener('change', function () {
            const endWrapper = document.getElementById('endContractWrapper');
            const endInput = document.getElementById('end_contract_date');

            if (['CDD', 'Stage', 'Consultant'].includes(this.value)) {
                endWrapper.classList.remove('d-none');
                endInput.setAttribute('', ' ');
            } else {
                endWrapper.classList.add('d-none');
                endInput.removeAttribute('');
                endInput.value = '';
            }
        });


    </script>

@endsection
