@extends('layouts.app')

@section('title', 'Credential OAuth')

@section('content')
    <div class="container">
        <div class="card" >
            <div class="card-header py-3">
                <h2>{{ __('Clients') }}</h2>
            </div>
            <div class="card-body py-3">
                @can('OAuth create')
                <form action="/oauth/clients" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="redirect" placeholder="Redirect" aria-label="default">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
                @endcan
                    @can('OAuth access')
                 <div class="table-responsive">
                     <table class="table table-striped">
                         <thead>
                         <tr>
                             <th scope="col">Client Name</th>
                             <th scope="col">Client ID</th>
                             <th scope="col">Client Secret</th>
                             <th scope="col">Action</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($clients as $c)
                             <tr>
                                 <td>{{$c->name }}</td>
                                 <td>{{$c->id}}</td>
                                 <td>{{$c->secret}}</td>
                                 <td>
                                     <form action="{{route ('client.destroy', $c->id)  }}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <button type="button" data-id="{{$c->id}}" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop-{{ $c->id }}">
                                             View
                                         </button>
                                         @can('OAuth delete')
                                             <button class="btn btn-danger" value="submit">
                                                 Delete
                                             </button>
                                         @endcan
                                     </form>


                                     <!-- Modal View Key -->
                                     <div class="modal fade" id="staticBackdrop-{{ $c->id }}" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                             <div class="modal-content modal-fullscreen-sm-down">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="staticBackdropLabel">Client Detail</h5>
                                                 </div>
                                                 <div class="modal-body ">
                                                     <table class="table table-striped">
                                                         <thead>
                                                         <tr>
                                                             <th scope="col">Client ID</th>
                                                             <th scope="col">Client Secret</th>
                                                             <th scope="col">Action</th>
                                                         </tr>
                                                         </thead>
                                                         <tbody>
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
                 </div>

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
