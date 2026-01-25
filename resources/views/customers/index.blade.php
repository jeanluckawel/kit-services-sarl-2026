@extends('layouts.app')

@section('title', 'Customers - KIT SERVICES')

@section('content')
    <div class="container-fluid mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h3 class="text-orange">Customers List</h3>
            <a href="{{ route('customer.create') }}" class="btn btn-primary">+ Add Customer</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="bg-orange text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>RCCM</th>
                        <th>NIF</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->rccm }}</td>
                            <td>{{ $customer->nif }}</td>
                            <td>{{ $customer->ville }}</td>
                            <td>{{ $customer->telephone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this customer?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="p-3">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
