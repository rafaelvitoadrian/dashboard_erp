@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card" >
            <div class="card-header">
                <h2>{{ __('Clients') }}</h2>
            </div>
            <div class="card-body">
                <h2>List Your Client</h2>
                @foreach($clients as $c)
                    <h3>{{ $c->name }}</h3>
                    <p>{{$c->redirect}}</p>
                @endforeach
            </div>
        </div>
@endsection
