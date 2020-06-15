@extends('layouts.admin')

@section('page-title')
    View Application
@stop

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="card" style="width:25rem">
                <img src="{{ $application->photo ? $application->photo->file . $application->photo->file1 : 'http://placehold.it/400x400' }}" class="card-img-top" alt="">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-users"></i> {{ $application->name }}</li>
                    <li class="list-group-item"><i class="fas fa-users"></i> {{ $application->client->name }}</li>
                    <li class="list-group-item"><i class="fas fa-user-lock"></i> {{ $application->appcategory->name }}</li>
                    <li class="list-group-item"><i class="fas fa-envelope-open-text"></i> {!! Str::limit($application->description, 300) !!}</li>
                </ul>
                <div class="card-body">
                    
                    <form action="/admin/applications/{{$application->id}}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="DELETE">

                        <input type="submit" value="Delete" class="btn btn-danger btn-sm btn-block">

                        <a href="{{ route('applications.index') }}" class="btn btn-primary btn-sm btn-block">View All Applications</a>

                    </form>

                </div>
            </div>
        </div>
    </div>

@stop