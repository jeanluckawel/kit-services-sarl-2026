@extends('layoutsddd.app')

@section('title','Create User - KIT SERVICES')

@section('content')

    <div class="container p-5">

        <div class="card shadow" style="border-radius:0;">

            <!-- HEADER -->
            <div class="card-header text-white" style="background-color:#FF6600;border-radius:0;">
                <h5 class="mb-0">Create User</h5>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- BASIC INFO -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Name <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   style="border-radius:0;"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   style="border-radius:0;"
                                   required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Password <span class="text-danger">*</span></label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   style="border-radius:0;"
                                   required>
                        </div>


                    <hr class="my-4">


                    <!-- ROLE  -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="fw-bold">Role</label>
                                <select name="role" class="form-select" style="border-radius:0;">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="text-end">
                        <button type="submit"
                                class="btn text-white"
                                style="background-color:#FF6600;border-color:#FF6600;">
                            Save
                        </button>
                    </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
