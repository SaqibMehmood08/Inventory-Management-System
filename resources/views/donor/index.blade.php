@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$donor_count)
            <x-empty title="No donors found" 
                     message="Try adjusting your search or filter to find what you're looking for."
                     button_label="{{ __('Add your first Donor') }}" 
                     button_route="{{ route('donor.create') }}" />
        @else
            <div class="container-xl">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h3 class="mb-1">Success</h3>
                        <p>{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <p>{{ session('error') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Donors</h3>
                        <div class="btn-group">
                            <a href="{{ route('donor.create') }}" class="btn btn-primary">Add Donor</a>
                            <a href="{{ route('donor.export') }}" class="btn mx-2 btn-success btn-sm">
                                <i class="fa-solid fa-file-export"></i> Export
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>CNIC</th>
                                    <th>Payment</th>
                                    <th>Address</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donor as $donor)
                                    <tr>
                                        <td>{{ $donor->id }}</td>
                                        <td>{{ $donor->name }}</td>
                                        <td>{{ $donor->email ?? 'N/A' }}</td>
                                        <td>{{ $donor->phone_number ?? 'N/A' }}</td>
                                        <td>{{ $donor->cnic ?? 'N/A' }}</td>
                                        <td>{{ $donor->payment ?? 'N/A' }}</td>
                                        <td>{{ $donor->address ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('donor.edit', $donor->id) }}" class=""><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('donor.delete', $donor->id) }}" class=""><i style="color:red" class="fa-sharp fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
