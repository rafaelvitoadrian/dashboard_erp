@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="sign-up-form form" action="{{route('user.store')}}" method="POST">
                    @csrf
                    <h1>Account</h1>
                    <p class="text-medium-emphasis">Add Account</p>
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg></span>
                        <input class="form-control" type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                      </svg></span>
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                      </svg></span>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                      </svg></span>
                        <select class="form-select" id="inputGroupSelect01" name="roles[]">
                            <option selected>Role</option>
                            @foreach($roles as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">Create</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
