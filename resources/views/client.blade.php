@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" >
            <div class="card-header">
                <h2>{{ __('Clients') }}</h2>
            </div>
            <div class="card-body">
                @can('Permissions create')
                <form action="/oauth/clients" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col mb-2">
                            <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default">
                        </div>
                        <div class="col mb-2">
                            <input class="form-control" type="text" name="redirect" placeholder="Redirect" aria-label="default">
                        </div>
                        <div class="col mb-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
                @endcan
                    @can('Permissions access')
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Client Name</th>
{{--                        <th scope="col">Client Redirect</th>--}}
                        <th scope="col">Client ID</th>
                        <th scope="col">Client Secret</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $c)
                        <tr>
                            <td>{{$c->name }}</td>
{{--                            <td>{{$c->redirect}}</td>--}}
                            <td>{{$c->id}}</td>
                            <td>{{$c->secret}}</td>
                            <td>

                                <form action="{{route ('client.destroy', $c->id)  }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-id="{{$c->id}}" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">
                                        View
                                    </button>
                                    @can('Permissions delete')
                                    <button class="btn btn-danger" value="submit">
                                        Delete
                                    </button>
                                    @endcan
                                </form>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Client Detail</h5>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Client ID</th>
                                                        <th scope="col">Client Secret</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($clients as $c)
                                                        <tr>
                                                            <td>
                                                                <input class="copy1" type="text" id="copy_{{ $c->id }}" value="{{ $c->id }}" >
                                                            </td>
                                                            <td>
                                                                <input class="copy1" type="text" id="copy_{{ $c->secret }}" value="{{ $c->secret }}">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-outline-primary" value="copy" onclick="copyToClipboard('copy_{{ $c->id }}')">Copy Id</button>
                                                                <button class="btn btn-outline-primary" value="copy" onclick="copyToClipboard('copy_{{ $c->secret }}')">Copy secret</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        @endcan
            </div>
        </div>

        <!-- <script src="js/clipboard.js"></script>-->
        <script>
            function copyToClipboard(id) {
                document.getElementById(id).select();
                document.execCommand('copy');
            }
        </script>

@endsection
