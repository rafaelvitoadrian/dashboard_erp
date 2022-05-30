@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="card" >
            <div class="card-header">
                <h2>{{ __('Clients') }}</h2>
            </div>
            <div class="card-body">
                @foreach($clients as $c)
                    <h3><b>Client Name :</b>{{$c->name }}</h3>
                    <p><b>Client ID :</b>{{$c->id}}</p>
                    <p><b>Client Redirect :</b>{{$c->redirect}}</p>
                    <p><b>Client Secret</b>{{$c->secret}}</p>
                @endforeach
            </div>
            <div class="card-body">
                <form action="/oauth/clients" method="post">
                    @csrf
                    Nama
                    <input type="text" name="name">
                    Redirect
                    <input type="text" name="redirect">
                    <input type="submit" value="Buat">
                </form>
            </div>
        </div>
@endsection
