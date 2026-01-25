@extends('layoutsddd.app')

@section('title','Create Customer - KIT SERVICES')

@section('content')

    <div class="container  p-5">

        <div class="card shadow" style="border-radius:0;">

            <!-- HEADER -->
            <div class="card-header text-white"
                 style="background-color:#FF6600;border-radius:0;">
                <h5 class="mb-0">Create Customer</h5>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf

                    <!-- BASIC INFO -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Customer Name <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   style="border-radius:0;"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">National ID</label>
                            <input type="text"
                                   name="id_nat"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">RCCM</label>
                            <input type="text"
                                   name="rccm"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">NIF</label>
                            <input type="text"
                                   name="nif"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>
                    </div>

                    <hr>

                    <!-- ADDRESS -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Province</label>
                            <input type="text"
                                   name="province"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">City</label>
                            <input type="text"
                                   name="ville"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">Commune</label>
                            <input type="text"
                                   name="commune"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="fw-bold">District</label>
                            <input type="text"
                                   name="quartier"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">Avenue</label>
                            <input type="text"
                                   name="avenue"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">Number</label>
                            <input type="text"
                                   name="numero"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>
                    </div>

                    <hr>

                    <!-- CONTACT -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="fw-bold">Phone</label>
                            <input type="text"
                                   name="telephone"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   style="border-radius:0;">
                        </div>
                    </div>

                    <!-- ACTION -->
                    <div class="text-end">
                        <button type="submit"
                                class="btn text-white"
                                style="background-color:#FF6600;border-color:#FF6600;">
                            Save
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
