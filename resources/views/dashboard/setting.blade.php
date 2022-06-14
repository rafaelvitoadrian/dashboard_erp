@extends('layouts.app')

@section('title', 'Settings')

@section('content')

{{-- <div class="container"> --}}
    <div class="card ms-2 me-2">
        <div class="card-header mb-2 py-3">
            <p class="h2">Settings</p>
        </div>
        <div class="card-body mt-2">
                    <h6 class="title">General</h6>
                    <hr class="line mt-2">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                        <div class="row justify-content-start">
                            <div class="col-sm-4 py-2"><p class="text-medium-emphasis">Language</p></div>
                                <dd class="col-sm-4">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choose Language</option>
                                        <option value="1">English</option>
                                        <option value="2">Indonesia</option>
                                    </select>
                                </dd>
                            </div>
                        </div>
                            <h6 class="title mt-2">Users</h6>
                            <hr class="line mt-2">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <div class="card-body px-0 pt-0 py-2">
                                        <div class="ms-3">
                                            <svg class="action-icon">
                                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                            </svg>
                                            1 internal Users</div>
                                            <p class ="mini ms-5">> Manage Users</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 ">
                                    <div class="card-body start px-0 pt-0 p-2">
                                        <div class="ms-3">
                                            <svg class="action-icon">
                                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                            </svg>
                                            0 Portal Users</div>
                                        <p class ="mini ms-5">> Manage Users</p>   
                                    </div>
                                </div>
                            </div>
                            <h6 class="title mt-3">Notification</h6>
                            <hr class="line mt-2">
                            <div class="title mt-3" href="#">Notification history</div>
                            <div class="title mt-2 mb-4" href="#">Do not disturb</div>
                            <h6 class="title mt-3">Profile</h6>
                            <hr class="line mt-2">
                            <div class="title mt-3" href="#">Change Passwords</div>
                            <div class="mini" href="#">Change</div>
                        </div> 
                    </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="row justify-content-evenly">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-4">
                                            Gambar
                                    </div>
                                    <div class="cod-md-8">
                                            Manage User
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-">
                                <div class="row">
                                    <div class="col-md-4">
                                            Gambar
                                    </div>
                                    <div class="cod-md-8">
                                            Manage User
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    </div>
</div>

@endsection