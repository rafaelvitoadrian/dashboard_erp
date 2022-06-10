@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3>Profile</h3>
    </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}"  class="row g-3">
                @csrf

                <h4>Information </h4>
                {{-- First Name --}}
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">First Name</label>
                    <input type="text" value="{{ $profile->profile_name }}" name="profile_name" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $profile->address }}" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Address 2</label>
                    <input type="text" name="address2" class="form-control" value="{{ $profile->address2 }}" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{ $profile->city }}" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" name="state_id" class="form-select" value="{{ $profile->state_id }}">
                    <option selected>Choose...</option>
                    <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="number"  name="zip" class="form-control" value="{{ $profile->zip }}" id="inputZip">
                </div>

                <hr>
                
                <h4>Work Information</h4>
                {{-- Work Mobile --}}
                <div class="col-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Mobile</label>
                </div>
                <div class="col-md-3">
                    <input type="number" name="work_mobile" class="form-control"value="{{ $profile->work_mobile }}"  id="inputEmail4">
                </div>
                {{-- Work Phone --}}
                <div class="col-md-2 offset-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Phone</label>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="work_phone" value="{{ $profile->work_phone }}"  id="inputEmail4">
                </div>
                {{-- Work Email --}}
                <div class="col-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Email</label>
                </div>
                <div class="col-md-3">
                    <input type="email" class="form-control" name="work_email" value="{{ $profile->work_email }}"  id="inputEmail4">
                </div>
                {{-- Work Loaction --}}
                <div class="col-md-2 offset-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Location</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="work_location" class="form-control" value="{{ $profile->work_location }}"  id="inputEmail4">
                </div>
                <hr>
                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
