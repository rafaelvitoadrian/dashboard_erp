@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header py-3">
                <h1>Role Management</h1>
                {{-- <p>Test</p> --}}
                <p class="text-medium-emphasis">Add Role</p>
            </div>
            <div class="card-body py-3">
                <form action="{{route ('role.update',$role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label"> <strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$role->name}}" placeholder="Permission Name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"> <strong>Permissions</strong></label>
                        @foreach($permissions as $permission)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" id="gridRadios1" value="{{$permission->id}}" @if(count($role->permissions->where('id',$permission->id)))
                                            checked @endif>
                                            {{ $permission->name }}
                                            </label>
                                        </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit">Update</button>
                    <a href="{{route('role.index')}}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
