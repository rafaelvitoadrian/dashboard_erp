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
                    <a href="{{route('user.create')}}" class="btn btn-primary btn-md"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 17">
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
                  <th class="text-center">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                    </svg>
                  </th>
                  <th>Name User</th>
                  <th>Email</th>
                  <th>Status</th>
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
                          @if($u->gender=="male")
                              <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('assets/img/avatars/11.svg')}}" alt="Profile Picture">
                                  @if($u->status=='pending')
                                      <span class="avatar-status bg-warning"></span>
                                  @elseif($u->status=='active')
                                      <span class="avatar-status bg-success"></span>
                                  @else
                                      <span class="avatar-status bg-danger"></span>
                                  @endif
                              </div>
                          @elseif($u->gender=="female")
                              <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('assets/img/avatars/10.svg')}}" alt="Profile Picture">
                                  @if($u->status=='pending')
                                      <span class="avatar-status bg-warning"></span>
                                  @elseif($u->status=='active')
                                      <span class="avatar-status bg-success"></span>
                                  @else
                                      <span class="avatar-status bg-danger"></span>
                                  @endif
                              </div>
                          @else
                              <div class="avatar avatar-md"><img class="avatar-img" src="{{asset('assets/img/avatars/12.svg')}}" alt="Profile Picture">
                                  @if($u->status=='pending')
                                      <span class="avatar-status bg-warning"></span>
                                  @elseif($u->status=='active')
                                      <span class="avatar-status bg-success"></span>
                                  @else
                                      <span class="avatar-status bg-danger"></span>
                                  @endif
                              </div>
                          @endif
                      @endif
                  </td>
                  <td>
                    <div>{{ $u->name }}</div>
                     <div class="small text-medium-emphasis">{{ $u->username }}</div>
                  </td>
                  <td>{{ $u->email }}</td>
                    <td>
                        @if($u->status=="active")
                            <button class="btn btn-outline-success btn-sm" disabled>{{$u->status}}</button>
                        @elseif($u->status=="pending")
                            <button class="btn btn-outline-warning btn-sm" disabled>{{$u->status}}</button>
                        @else
                            <button class="btn btn-outline-danger btn-sm" disabled>{{$u->status}}</button>
                        @endif
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
                        <Button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
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
        {{-- {{ $user->links() }} --}}
        {!! $user->appends(Request::except('page'))->render() !!}
    </div>
@endsection
