@extends('layouts.app')

@section('title', 'Create Customer - KIT SERVICES')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    <div class="card mb-1 m-4  border-0" style="border-radius:0;">
        <!-- Header -->
        <div class="card-header d-flex align-items-center" style="background-color: #FF6600; color: #fff; border-radius:0;">
            <h3 class="card-title mb-0">Add New Customer</h3>
            <nav aria-label="breadcrumb" class="ms-auto">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customer.index') }}" class="text-white">Customers</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>

        <!-- Form -->
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Customer Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Customer Name" required style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">ID Nat</label>
                        <input type="text" name="id_nat" class="form-control" placeholder="ID National" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">RCCM</label>
                        <input type="text" name="rccm" class="form-control" placeholder="RCCM" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">NIF</label>
                        <input type="text" name="nif" class="form-control" placeholder="NIF" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Province</label>
                        <input type="text" name="province" class="form-control" placeholder="Province" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">City</label>
                        <input type="text" name="ville" class="form-control" placeholder="City" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Commune</label>
                        <input type="text" name="commune" class="form-control" placeholder="Commune" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Quartier</label>
                        <input type="text" name="quartier" class="form-control" placeholder="Quartier" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Avenue</label>
                        <input type="text" name="avenue" class="form-control" placeholder="Avenue" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Number</label>
                        <input type="text" name="numero" class="form-control" placeholder="Numero" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Telephone</label>
                        <input type="text" name="telephone" class="form-control" placeholder="+243 9xx xxx xxx" style="border-radius:0;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" style="border-radius:0;">
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

@endsection
