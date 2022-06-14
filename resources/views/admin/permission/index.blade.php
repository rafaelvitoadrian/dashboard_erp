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
                <p class="text-medium-emphasis">Manage Permissions</p>
            </ol>
            <ol class="breadcrumb my-0 ms-2 mb-2">
                <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Search Permissions" value="{{ $cari }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="{{route('permission.create')}}" class="btn btn-primary btn-md"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 17">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                          </svg></a>
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
                        <a href="{{ route ('permission.edit', $r->id) }}" class="btn btn-primary mr-2"><svg class="action-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                        </svg></a>
                        @endcan
                            @csrf
                        @method('DELETE')
                        @can('Permissions delete')
                        <Button class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                          </svg></Button>
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
