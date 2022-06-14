@extends('layouts.app')

@section('title', 'Settings')

@section('content')

{{-- <div class="container"> --}}
    <div class="card ms-2 me-2 ">
        <div class="card-header mb-2 py-3 ">
            <p class="h2">Settings</p>
        </div>
        <div class="card-body mt-2">
            <h6 class="title">General</h6>
            <hr class="line mt-2">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                <div class="row justify-content-start">
                    <div class="col-sm-4 title mt-0">Language</div>
                        <dd class="col-sm-4">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Choose Language</option>
                                <option value="1">English</option>
                                <option value="2">Indonesia</option>
                                <option value="3">Arabia</option>
                            </select>
                        </dd>
                    </div>
                </div>
                    @canany('Users access','Users add','Users edit','Users delete')
                    <h6 class="title mt-2">Users</h6>
                    <hr class="line mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body px-0 pt-0 py-4">
                                <div class="ms-3">
                                    <svg class="action-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                    </svg>
                                    0 Portal User</div>
                                    <a href="{{ Route('user.index') }}" class="mini ms-5 ">>Manage user</a>
                                {{-- <p class="mini ms-5" href="user.index">< Manage users</p> --}}
                            </div>
                        </div>
                        @endcan
                        @canany('Roles access','Roles add','Roles edit','Roles delete')
                        <div class="col-sm-4">
                            <div class="card-body start px-0 pt-0 py-1">
                                <div class="ms-3">
                                    <svg class="action-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                    </svg>
                                    0 Portal Role</div>
                                    <a href="{{ Route('role.index') }}" class="mini ms-5 ">>Manage role</a>
                                {{-- <p class="mini ms-5 " href="role.index">> Manage role</p> --}}
                            </div>
                        </div>
                        @endcan
                        @canany('Permissions access','Permissions add','Permissions edit','Permissions delete')
                        <div class="col-sm-4">
                            <div class="card-body start px-0 pt-0 py-1">
                                <div class="ms-3">
                                    <svg class="action-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                    </svg>
                                    0 Portal Permission</div>
                                {{-- <p class="mini ms-5" href="permission.index">> Manage permission</p> --}}
                                <a href="{{ Route('permission.index') }}" class="mini ms-5 ">>Manage permission</a>
                            </div>
                        </div>
                    </div>
                    @endcan
                    <h6 class="title mt-2">Notification</h6>
                    <hr class="line mt-2">
                    <div class="title mt-3" href="#">Notification history</div>
                    <div class="title mt-2 mb-4" href="#">Do not disturb</div>
                    <h6 class="title mt-3">Profile</h6>
                    <hr class="line mt-2">
                    <div class="title mt-3" href="#">Change Passwords</div>
                    <div class="mini" href="#">Change</div> 
            </div>
        </div>
        </div>
    </div>
@endsection