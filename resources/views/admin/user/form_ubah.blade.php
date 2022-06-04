@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="sign-up-form form" action="{{route('user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1>Update Account</h1>
                    <p class="text-medium-emphasis">Update Account</p>
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg></span>
                        <input class="form-control" type="text" value="{{$user->name}}" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                      </svg></span>
                        <input class="form-control" type="email" name="email" value="{{$user->email}}" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                      </svg></span>
                        <select class="form-select" id="inputGroupSelect01" name="roles[]">
                            @foreach($roles as $row)
                            <option value="{{$row->id}}" {{$row->id == $user->roles[0]->id ? 'Selected="Selected"' : ''}}>{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                      </svg></span>
                        <select class="form-select" id="inputGroupSelect01" name="status">
                            @foreach(["active" => "Active", "pending" => "Pending","deactive" => "Deactive"] AS $statusWay => $statusLabel)
                                <option value="{{ $statusWay }}" {{ old("contact_way", $user->status) == $statusWay ? "selected" : "" }}>{{ $statusLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">Update</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
