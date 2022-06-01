@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Permissions Management</h1>
                <div class="row mt-2 mb-2">
                    <div class="col-md-3">
                            <a href="{{route('permission.create')}}" class="btn btn-primary"> Tambah</a>
                        </div>
                    </div>
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
                                        <a href="{{ route ('permission.edit', $p->id) }}" class="btn btn-primary mr-2">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <Button class="btn btn-danger">Delete</Button>
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
