@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="container-fluid">
@if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                 @if(!\Illuminate\Support\Facades\Auth::user()->image)
                    @if(\Illuminate\Support\Facades\Auth::user()->gender=="male")
                        <label for="image">
                            <img class="avatar-profile-settings" src="{{asset('assets/img/avatars/11.svg')}}"  alt="user@email.com"><span class="avatar-status bg-success"></span>
                        </label>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->gender=="female")
                        <label for="image">
                            <img class="avatar-profile-settings" src="{{asset('assets/img/avatars/10.svg')}}"  alt="user@email.com"><span class="avatar-status bg-success"></span>
                        </label>
                    @else
                        <label for="image">
                            <img class="avatar-profile-settings" src="{{asset('assets/img/avatars/12.svg')}}"  alt="user@email.com"><span class="avatar-status bg-success"></span>
                        </label>
                    @endif
                @else
                    <label for="image">
                        <img class="avatar-profile-settings" src="{{ asset('storage/'. \Illuminate\Support\Facades\Auth::user()->image) }}" alt="user@email.com"><span class="avatar-status bg-success"></span>
                    </label>
                @endif
            </div>
            <form action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="p-2"><input type="file" class="btn btn-primary" name="image">
                        <input type="hidden" name="oldImage" value="{{$user->image}}">
                    </div>
                </div>
                <div class="col-md-12 d-flex mb-3 justify-content-center">
                    <div class="p-2">
                        <button type="submit" class="btn btn-primary">Update Image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}"  class="row g-3">
                @csrf
                <hr>
                <h4>Information </h4>
                {{-- First Name --}}
                <div class="col-md-6">
                    <label for="FirstName" class="form-label">First Name</label>
                    <input type="text" value="{{ $user->first_name }}" name="first_name" class="form-control" id="FirstName">
                </div>
                <div class="col-md-6">
                    <label for="LastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" id="LastName">
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
                    <input type="text" name="state" class="form-control" value="{{ $profile->state }}" id="inputCity">
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="number" name="zip" class="form-control" value="{{ $profile->zip }}" id="inputZip">
                </div>
                <hr>

                {{-- <h4>Work Information</h4> --}}
                {{-- Work Mobile --}}
                {{-- <div class="col-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Mobile</label>
                </div>
                <div class="col-md-3">
                    <input type="number" name="work_mobile" class="form-control"value="{{ $profile->work_mobile }}"  id="inputEmail4">
                </div> --}}
                {{-- Work Phone --}}
                {{-- <div class="col-md-2 offset-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Phone</label>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="work_phone" value="{{ $profile->work_phone }}"  id="inputEmail4">
                </div> --}}
                {{-- Work Email --}}
                {{-- <div class="col-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Email</label>
                </div>
                <div class="col-md-3">
                    <input type="email" class="form-control" name="work_email" value="{{ $profile->work_email }}"  id="inputEmail4">
                </div> --}}
                {{-- Work Loaction --}}
                {{-- <div class="col-md-2 offset-md-2">
                    <label for="inputEmail4" class="col-form-label">Work Location</label>
                </div>
                <div class="col-md-3">
                    <input type="text" name="work_location" class="form-control" value="{{ $profile->work_location }}"  id="inputEmail4">
                </div>
                <hr>
                 --}}

                <div class="col-12 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
