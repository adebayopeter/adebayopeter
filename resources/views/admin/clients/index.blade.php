@extends('layouts.admin')

@section('page-title')
    Clients
@endsection

@section('content')

    @if(session()->has('client_created'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('client_created') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('client_saved'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('client_saved') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('client_deleted'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('client_deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="row">

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">.</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/clients">

                        {{ csrf_field() }}

                        @include('partials.form_error')

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Client's Name..." required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="address" placeholder="https:// or http://" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="phone1" id="phone1" placeholder="Mobile" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="phone2" id="phone2" placeholder="Phone">
                        </div>

                        <div class="btn-user btn-block">
                            <input type="submit" name="submit" value="Create Client" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="">View Client</a></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                            @if($clients)

                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->phone1 }}</td>
                                        <td>{{ $client->created_at ? $client->created_at->diffForHumans() : 'no date' }}</td>
                                        <td>{{ $client->updated_at ? $client->updated_at->diffForHumans() : 'no date' }}</td>
                                        <td><a href="{{ route('clients.edit', $client->id) }}">edit</a> | <a href="{{ route('clients.show', $client->id) }}">view</a></td>
                                    </tr>
                                @endforeach

                            @endif

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection