@extends('layouts.manage')

@section('title', 'Permissions Management')
@section('name-manage', 'Permissions')
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
                        <a href="{{route('permission.create')}}" class="btn btn-primary btn-md"> Add Permissions</a>
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
                  <th>Permission Name   </th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              @foreach($permissions as $r)
              <tbody>
                <tr>
                  <td class="">
                    <div>{{ $r->name }}</div>
                  </td>
                  <td class="text-center">
                    <form action="{{route ('permission.destroy', $r->id)  }}" method="POST">
                        @can('Permissions edit')
                        <a href="{{ route ('permission.edit', $r->id) }}" class="btn btn-primary mr-2">Edit</a>
                        @endcan
                            @csrf
                        @method('DELETE')
                        @can('Permissions delete')
                        <Button class="btn btn-danger">Delete</Button>
                        @endcan
                    </form>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        {{ $permissions->links() }}
    </div>
@endsection
