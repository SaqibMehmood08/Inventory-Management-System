@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">Update Donor</h3>
                        </div>
                        <div class="card-actions btn-actions">
                            <x-action.close route="{{ route('donor.index') }}"/>
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h3 class="mb-1">Success</h3>
                        <p>{{ session('success') }}</p>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <p>{{ session('error') }}</p>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('donor.edit.save', $result->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name<strong style="color:red">*</strong></label>
                                <input type="text" name="name" class="form-control" placeholder="Please enter Name" value="{{ old('name', $result->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Please enter Email" value="{{ old('email', $result->email) }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Please enter Phone" value="{{ old('phone_number', $result->phone_number) }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">CNIC</label>
                                <input type="text" name="cnic" class="form-control" placeholder="Please enter CNIC" value="{{ old('cnic', $result->cnic) }}">
                            </div>
                            <div class="mb-3">
                                <label for="payment" class="form-label">Payment<strong style="color:red">*</strong></label>
                                <input type="number" name="payment" class="form-control" placeholder="Please enter Payment" value="{{ old('payment', $result->payment) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Please enter Address (if any)" value="{{ old('address', $result->address) }}">
                            </div>
                          
                            <button type="submit" class="btn btn-success add-list my-3 mx-1">Update Donor</button>
                        </form>
                    </div>
                    <div class="card-footer text-end"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
