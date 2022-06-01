@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Role Management</h1>
                <div class="row">
                    <div class="col-md-12 mb-4 ml-4">
                        <a href="{{route('role.create')}}" class="btn btn-primary btn-md"> Add Role</a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Name Role</th>
                        <th>Permissions Access</th>
                        <th>Action</th>
                    </tr>
                    @foreach($roles as $r)
                        <tr>
                            <td>{{ $r->name }}</td>
                            <td>
                                @foreach($r->permissions as $p)
                                    <button  class="btn btn-secondary btn-sm mt-2 ml-2 r-2" disabled>{{$p->name}}</button>
                                @endforeach
                            </td>
                            <td>
                                    <form action="{{route ('role.destroy', $r->id)  }}" method="POST">
                                            <a href="{{ route ('role.edit', $r->id) }}" class="btn btn-primary mr-1 mb-1">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                            <Button type="submit" class="btn btn-danger">Delete</Button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
@endsection