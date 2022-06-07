@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h1>User Management</h1>
            <p class="text-medium-emphasis">Add User</p>
        </div>    
            <div class="card-body px-4">
                <form action="{{route('user.store')}}" method="POST" class="row g-3">
                  @csrf
                  <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Name" required>
                  </div>
                  <div class="col-md-12">
                    <label for="inputAddress" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputAddress" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-md-6">
                    <label for="inputCity" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputCity" name="password" placeholder="Password" required>
                  </div>  
                  <div class="col-md-6">
                    <label for="inputState" class="form-label">Role</label>
                    <select id="inputState" name="roles[]" class="form-select">
                      <option selected>Role</option>
                      @foreach($roles as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
                </form>
            </div>
        </div>
    </div>

@endsection
