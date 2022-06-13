@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h1>User Management</h1>
            <p class="text-medium-emphasis">Update User</p>
        </div>
            <div class="card-body py-3">
                <form action="{{route('user.update', $user->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="col-md-12">
                    <label for="inputEmail4" class="form-label"><Strong>Name</Strong></label>
                    <input type="text" class="form-control" id="inputEmail4" value="{{$user->name}}" name="name" placeholder="Name" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputAddress" class="form-label"><Strong>Email</Strong></label>
                    <input type="email" value="{{$user->email}}" class="form-control" id="inputAddress" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-md-6 mb-1">
                    <label for="inputState" class="form-label"><Strong>Role</Strong></label>
                    <select id="inputState" name="roles[]" class="form-select">
                      @foreach($roles as $row)
                            <option value="{{$row->id}}" {{$row->id == $user->roles[0]->id ? 'Selected="Selected"' : ''}}>{{$row->name}}</option>
                            @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 mb-1">
                    <label for="inputState1" class="form-label"><Strong>Status</Strong></label>
                    <select id="inputState1" name="status" class="form-select">
                       @foreach(["active" => "Active", "pending" => "Pending","deactive" => "Deactive"] AS $statusWay => $statusLabel)
                                <option value="{{ $statusWay }}" {{ old("contact_way", $user->status) == $statusWay ? "selected" : "" }}>{{ $statusLabel }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="inputUsername" class="form-label"><Strong>Username</Strong></label>
                    <input type="text" class="form-control" id="inputUsername" value="{{$user->username}}" name="username" placeholder="Username">
                  </div>
                  <div class="col-md-6 mb-1">
                      <label for="inputState1" class="form-label"><Strong>Gender</Strong></label>
                      <select id="inputState1" name="gender" class="form-select">
                          @foreach(["male" => "Male", "female" => "Female"] AS $genderWay => $statusLabel)
                              <option value="{{ $genderWay }}" {{ old("contact_way", $user->gender) == $genderWay ? "selected" : "" }}>{{ $statusLabel }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label for="image" class="form-label"><Strong>Profile</Strong></label>
                      <input type="hidden" name="oldImage" value="{{$user->image}}">
                      @if($user->image)
                          <img class="img-preview img-fluid mb-3 col-sm-5 d-flex " src="{{ asset('storage/'.$user->image) }}">
                      @else
                          <img class="img-preview img-fluid mb-3 col-sm-5 ">
                      @endif

                      <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}" id="image" onchange="previewImage()">
                      @error('image')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFreader = new FileReader();
            oFreader.readAsDataURL(image.files[0]);

            oFreader.onload = function (oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
