@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">

            <div class="card-body">
                <form action="{{route ('role.store')}}" method="post">
                    @csrf
                    <ul class="list-group">
                        <h1>Role</h1>
                        <p class="text-medium-emphasis">Add Role</p>
                        <div class="row mb-3">
                            <label for="namerole" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="namerole">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Permissions</legend>
                            <div class="col-sm-10">
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" id="gridRadios1" value="{{$permission->id}}">
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                    <button class="btn btn-success" name="submit" type="submit">Add</button>
                    <a href="{{route('role.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
