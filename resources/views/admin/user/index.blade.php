@extends('layouts.manage')

@section('title', 'User Management')
@section('name-manage', 'Users')
@section('breadcumb')
  <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2 pt-2">
              <h3>User Management</h3>
            </ol>
            <ol class="breadcrumb my-0 ms-2 mb-2">
              <p class="text-medium-emphasis">Manage Users</p>
            </ol>
            <ol class="breadcrumb my-0 ms-2 mb-2">
              <form method="GET" class="row row-cols-lg-auto g-3 align-items-center">
                <div class="col-12">
                    <div class="input-group">
                    <input type="text" class="form-control" name="cari" id="cari" autofocus="true" placeholder="Search Users" value="{{ $cari }}">
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{route('user.create')}}" class="btn btn-primary btn-md"> Add Users</a>
                </div>
              </form>
            </ol>
          </nav>
        </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead class="fw-semibold">
                <tr class="align-middle">
                  <th class="text-center">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                    </svg>
                  </th>
                  <th>Name User</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              @foreach($user as $u)
              <tbody>
                <tr class="align-middle">
                  <td class="text-center">
                      @if($u->image)
                          <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('storage/'. $u->image) }}" alt="user@email.com">
                              @if($u->status=='pending')
                                  <span class="avatar-status bg-warning"></span>
                              @elseif($u->status=='active')
                                  <span class="avatar-status bg-success"></span>
                              @else
                                  <span class="avatar-status bg-danger"></span>
                              @endif
                          </div>
                      @else
                          <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com">
                              @if($u->status=='pending')
                                  <span class="avatar-status bg-warning"></span>
                              @elseif($u->status=='active')
                                  <span class="avatar-status bg-success"></span>
                              @else
                                  <span class="avatar-status bg-danger"></span>
                              @endif
                          </div>
                      @endif
                  </td>
                  <td>
                    <div>{{ $u->name }}</div>
                     <div class="small text-medium-emphasis">{{ $u->email }}</div>
                  </td>
                  <td class="text-center">
                    @foreach($u->roles as $role)
                        <div> {{$role->name}}</div>
                    @endforeach
                  </td>
                  <td class="text-center">
                    <form action="{{route ('user.destroy', $u->id)  }}" method="POST">
                        @can('Users edit')
                        <a href="{{ route ('user.edit', $u->id) }}" class="btn btn-primary mr-1">
                            <svg class="action-icon">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                            </svg>
                        </a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('Users delete')
                        <Button type="submit" class="btn btn-danger">Delete</Button>
                        @endcan
                    </form>
                  </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        {{-- {{ $user->links() }} --}}
        {!! $user->appends(Request::except('page'))->render() !!}
    </div>
@endsection
