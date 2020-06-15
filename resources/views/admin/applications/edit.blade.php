@extends('layouts.admin')

@section('page-title')
    Edit Application
@endsection

@section('content')

    @include('partials.tinyeditor')

    <div class="row">
        <div class="col-lg-6">

            @if(session()->has('image_error_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('image_error_msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">.</h6>
                </div>
                <div class="card-body">
                <form method="post" action="/admin/applications/{{ $application->id }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        @include('partials.form_error')

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" value="{{ old('name', $application->name) }}" id="name" placeholder="Application Name...">
                        </div>

                        <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" name="client_id" id="client_id" aria-placeholder="Select Client...">
                                <option value="">Select Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ ($client->id == old('client_id', $application->client_id)) ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="custom-select my-1 mr-sm-2" name="category_id" id="category_id" aria-placeholder="Select App Category...">
                                <option value="">Select App Category</option>
                                @foreach ($appCategories as $appCategory)
                                    <option value="{{ $appCategory->id }}" {{ ($appCategory->id == old('category_id', $application->category_id)) ? 'selected' : '' }}>{{ $appCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="url" class="form-control form-control-user" name="webaddress" value="{{ old('webaddress', $application->webaddress) }}" id="webaddress" placeholder="https:// or http://...">
                        </div>

                        <div class="form-group">
                            <input type="file" id="photo_id" name="photo_id[]" value="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" multiple>
                            <img src="{{ $application->photo ? $application->photo->file . $application->photo->file1 : 'http://placehold.it/400x400' }}" alt="" width="70px" height="70px" class="img-profile img-thumbnail">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control-user" name="description" placeholder="Description..." rows="10">{{ old('description', $application->description) }}</textarea>
                        </div>

                        <div class="btn-user btn-block">
                            <input type="submit" name="submit" value="Update Application" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
