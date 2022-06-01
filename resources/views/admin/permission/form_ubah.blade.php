@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Permissions Management</h1>
                <p class="text-medium-emphasis">Add Permission</p>
                <form action="{{route ('permission.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg></span>
                        <input class="form-control" type="text" placeholder="Name" name="name" value="{{$permission->name}}" required>
                    </div>

                    <button class="btn btn-primary mt-3" name="submit" type="submit">Ubah Data</button>
                    <a href="{{route('permission.index')}}" class="btn btn-danger mt-3 ml-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
