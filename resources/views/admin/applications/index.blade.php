@extends('layouts.admin')

@section('page-title')
    Applications
@endsection

@section('content')

    @if(session()->has('application_created'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('application_created') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('application_saved'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('application_saved') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('application_deleted'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('application_deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('applications.create') }}">Create Application</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Application Name</th>
                        <th>Client</th>
                        <th>Category</th>              
                        <th>Web Address</th>
                        {{-- <th>Description</th> --}}
                        <th>Created at</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                        @if($applications)

                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td><img src="{{ $application->photo ? $application->photo->file . $application->photo->file1 : 'http://placehold.it/400x400' }}" alt="" width="70px" height="70px" class="img-profile img-thumbnail"></td>
                                    <td>{{ $application->name }}</td>
                                    <td>{{ $application->client ? $application->client->name : '' }}</td>
                                    <td>{{ $application->appcategory ? $application->appcategory->name : '' }}</td>
                                    <td>{{ $application->webaddress }}</td>
                                    {{-- <td>{{ Str::limit($application->description, 20) }}</td> --}}
                                    <td>{{$application->created_at->diffForHumans()}}</td>
                                    <td>{{$application->updated_at->diffForHumans()}}</td>
                                    <td><a href="{{route('applications.edit', $application->id)}}">edit</a> | <a href="{{route('applications.show', $application->id)}}">view</a></td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection