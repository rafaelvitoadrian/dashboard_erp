@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ubah Data User</h3>
            </div>
            <div class="card-body">
                <a href="{{route ('role.index')}}" class="btn btn-primary mb-2">Kembali</a>
                <form action="{{route ('role.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <ul class="list-group">
                        Nama <input type="text" name="name" required value="{{$role->name}}">
                        Permission @foreach($permissions as $permission)
                            <div class="flex flex-col justify-cente">
                                <div class="flex flex-col">
                                    <label class="inline-flex items-center mt-3">
                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"  @if(count($role->permissions->where('id',$permission->id)))
                                        checked
                                            @endif
                                        ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <button class="btn btn-primary mt-3" name="submit" type="submit">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>

@endsection
