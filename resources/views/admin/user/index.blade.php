@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>User Management</h1>
                <p class="text-medium-emphasis">Manage User</p>
                @can('Users create')
                <div class="row">
                    <div class="col-md-12 mb-2 ml-4">
                        <a href="{{route('user.create')}}" class="btn btn-primary btn-md"> Add User</a>
                    </div>
                </div>
                @endcan
                @can('Users access')
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                        @foreach($user as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    @foreach($u->roles as $role)
                                        <span> {{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($u->status=='pending')
                                    <button class="btn btn-outline-warning">{{$u->status}}</button>
                                    @elseif($u->status=='active')
                                    <button class="btn btn-outline-success">{{$u->status}}</button>
                                    @else
                                    <button class="btn btn-outline-danger">{{$u->status}}</button>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route ('user.destroy', $u->id)  }}" method="POST">
                                            @can('Users edit')
                                            <a href="{{ route ('user.edit', $u->id) }}" class="btn btn-primary mr-1">Edit</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('Users delete')
                                            <Button type="submit" class="btn btn-danger">Delete</Button>
                                            @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
                @endcan
            </div>
@endsection
