@extends('layouts.manage')
@section('title', 'Roles Management')
@section('name-manage', 'Roles')
@section('breadcumb')
  <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2 pt-2">
              <h3>Roles Management</h3>
            </ol>
            <ol class="breadcrumb my-0 ms-2 mb-2">
              <p class="text-medium-emphasis">Manage Roles</p>
            </ol>
            <ol class="breadcrumb my-0 ms-2 mb-2">
              <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
                <div class="col-12">
                    <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="Search Roles" value="{{ $cari }}">
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{route('role.create')}}" class="btn btn-primary btn-md"> Add Roles</a>
                </div>
              </form>
            </ol>
          </nav>
        </div>
@endsection

@section('content')
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead class="fw-semibold">
                <tr class="align-middle">
                  <th class="text-center">Role</th>
                  <th>Permission Access</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              @foreach($roles as $r)
              <tbody>
                <tr >
                  <td class="text-center">
                    <div class="mt-2">{{ $r->name }}</div>
                  </td>
                  <td>
                    @foreach($r->permissions as $p)
                        <button  class="btn btn-primary btn-sm mt-2 ml-2 r-2" disabled>{{$p->name}}</button>
                    @endforeach
                  </td>
                  <td class="text-center">
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
              </tbody>
              @endforeach
            </table>
          </div>
        {{ $roles->links() }}
    </div>
@endsection

