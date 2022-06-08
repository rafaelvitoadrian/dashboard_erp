@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h1>User Management</h1>
            <p class="text-medium-emphasis">Update User</p>
        </div>    
            <div class="card-body py-3">
                <form action="{{route('user.update', $user->id)}}" method="POST" class="row g-3">
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
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                  </div>
                </form>
            </div>
        </div>
    </div>

@endsection
