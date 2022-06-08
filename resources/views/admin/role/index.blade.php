@extends('layouts.app')
@section('title', 'Role Management')
@section('content')
    <div class="container">
        <div class="card">
        <div class="card-header py-3">
            <h1>Roles Management</h1>
            <p class="text-medium-emphasis">Manage Roles</p>
        </div>
            <div class="card-body py-3">
                @can('Roles create')
                <div class="row">
                    <div class="col-md-12 mb-2 ml-4">
                        <a href="{{route('role.create')}}" class="btn btn-primary btn-md"> Add Role</a>
                    </div>
                </div>
                @endcan
                @can('Roles access')
                @can('Users access')
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Permissions Access</th>
                        <th>Action</th>
                    </tr>
                    @foreach($roles as $r)
                        <tr>
                            <td>{{ $r->name }}</td>
                            <td>
                                @foreach($r->permissions as $p)
                                    <button  class="btn btn-primary btn-sm mt-2 ml-2 r-2" disabled>{{$p->name}}</button>
                                @endforeach
                            </td>
                            <td>
                                    <form action="{{route ('role.destroy', $r->id)  }}" method="POST">
                                        @can('Roles edit')
                                            <a href="{{ route ('role.edit', $r->id) }}" class="btn btn-primary mr-1 mb-1">Edit</a>
                                        @endcan
                                            @csrf
                                        @method('DELETE')
                                            @can('Roles delete')
                                            <Button type="submit" class="btn btn-danger">Delete</Button>
                                                @endcan
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                    @endcan
                @endcan
            </div>
@endsection
