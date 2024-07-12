@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                           Create Donor
                            </h3>
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
                <div class="alert alert-success alert-dismissible" role="alert">
                    <p>{{ session('error') }}</p>

                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
                        <div class="card-body">
                            <form action="{{ route('donor-create-save') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label f class="form-label">Name<strong style="color:red">*</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="please enter Name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                  </div>
                                <div class="mb-3">
                                  <label  class="form-label">Email </label>
                                  <input type="email" name="email" class="form-control" placeholder="please enter Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Phone</label>
                                  <input type="text" name="phone_number" placeholder="please enter password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CNIC</label>
                                    <input type="text" name="cnic" placeholder="please enter CNIC" class="form-control" id="exampleInputPassword1">
                                  </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Payment<strong style="color:red">*</strong></label>
                                  <input type="number" name="payment" placeholder="please enter Payment" class="form-control" id="exampleInputPassword1" required>
                                </div>
                                <div class="mb-3 ">
                                    <label for="exampleInputPassword1" class="form-label">Address</label>

                                    <input type="text" name="address" placeholder="please enter Address(if any)" class="form-control" id="exampleInputPassword1">

                                </div>
                              
                                  <button type="submit" class="btn btn-info add-list my-3 mx-1 ">
                                    Create Donor
                                </button>
                                </form>
                        </div>
                        <div class="card-footer text-end">
                    
                        </div>
                   
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
