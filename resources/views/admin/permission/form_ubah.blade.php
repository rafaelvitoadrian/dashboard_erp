@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
        <div class="card-header py-3">
            <h1>Permissions Management</h1>
            <p class="text-medium-emphasis">Add Permission</p>
        </div>
            <div class="card-body py-3">
                <form action="{{route ('permission.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        <div>
                            <label for="name" class="form-label"> <strong>Name</strong></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$permission->name  }}" placeholder="Permission Name">
                        </div>
                    <button class="btn btn-primary mt-3" name="submit" type="submit">Update</button>
                    <a href="{{route('permission.index')}}" class="btn btn-danger mt-3 ml-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
