@extends('layouts.app')

@section('title', 'Permissions Management')

@section('content')
    <div class="container">
        <div class="card mb-5">
        <div class="card-header py-3">
            <h1>Permissions Management</h1>
            <p class="text-medium-emphasis">Manage Permissions</p>
        </div>
            <div class="card-body px-4">
                <div class="row mb-3">
                    @can('Permissions create')
                    <div class="col-md-3">
                            <a href="{{route('permission.create')}}" class="btn btn-primary"> Tambah</a>
                        </div>
                    </div>
                @endcan
                @can('Permissions access')
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach($permissions as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>
                                <ul class="nav">
                                    <form action="{{route ('permission.destroy', $p->id)  }}" method="POST">
                                        @can('Permissions edit')
                                        <a href="{{ route ('permission.edit', $p->id) }}" class="btn btn-primary mr-2">Edit</a>
                                        @endcan
                                            @csrf
                                        @method('DELETE')
                                        @can('Permissions delete')
                                        <Button class="btn btn-danger">Delete</Button>
                                        @endcan
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @endcan
            </div>
        </div>
    </div>
@endsection
