@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h1>User Management</h1>
            <p class="text-medium-emphasis">Add User</p>
        </div>
            <div class="card-body py-3">
                <form action="{{route('user.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-12">
                    <label for="name" class="form-label"><strong>Name</strong></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" value="{{old('name')}}"  name="name" placeholder="Name" required>
                      @error('name')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label for="email" class="form-label"><Strong>Email</Strong></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" name="email" placeholder="Email" required>
                      @error('email')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label"><strong>Passowrd</strong></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                      @error('password')
                      <div class="valid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="col-md-6 mb-1">
                    <label for="role" class="form-label"><Strong>Role</Strong></label>
                    <select id="role" name="roles[]" class="form-select">
                      @foreach($roles as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label"><Strong>Profile</Strong></label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 ">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}" id="image" onchange="previewImage()">
                        @error('image')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
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
