@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header py-3">
                <h1>Permissions Management</h1>
                {{-- <p>Test</p> --}}
                <p class="text-medium-emphasis">Add Permission</p>
            </div>
            <div class="card-body px-4">
                <form action="{{route ('permission.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"> <strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Permission Name">
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit">Add</button>
                    <a href="{{route('permission.index')}}" class="btn btn-danger ml-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
