@extends('layouts.master')

@section('title', 'Add New Member')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('members.store')}}" method="POST">
                    @csrf

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="first_name" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" name="last_name">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPhone">Phone</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="ex: 081904xxxxxx" name="phone">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" required placeholder="ex: example@gmail.com" name="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="ex: Jl. Kalisombo" name="address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPostalCode">Postal Code</label>
                        <input type="text" class="form-control" id="inputPostalCode" placeholder="ex: 50773" name="postal_code">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Member</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
