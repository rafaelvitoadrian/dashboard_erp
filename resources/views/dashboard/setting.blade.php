@extends('layouts.app')

@section('title', 'Settings')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-center mb-2 py-3">
            <p class="h2">Settings</p>
        </div>
        <div class="card-body mt-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-coreui-toggle="tab" data-coreui-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><p class="text-medium-emphasis">General</p></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-coreui-toggle="tab" data-coreui-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><p class="text-medium-emphasis">Users</p></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-coreui-toggle="tab" data-coreui-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><p class="text-medium-emphasis">Roles</p></button>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="row justify-content-start">
                            <div class="col-sm-4 py-2"><p class="text-medium-emphasis">Langguage</p></div>
                            <dd class="col-sm-4">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Choose Langguage</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </dd>
                        </div>
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