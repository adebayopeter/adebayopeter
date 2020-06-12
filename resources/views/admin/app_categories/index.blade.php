@extends('layouts.admin')

@section('page-title')
    Application Categories    
@endsection

@section('content')
    
    @if(session()->has('app_category_created'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('app_category_created') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('app_category_saved'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Alert</strong><i class="fas fa-exclamation"></i> {{ session('app_category_saved') }}
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
                    <form method="post" action="/admin/app_categories">

                        {{ csrf_field() }}

                        @include('partials.form_error')

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Application Category Name..." required>
                        </div>

                        <div class="btn-user btn-block">
                            <input type="submit" name="submit" value="Create Application Category" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="">View Application Categories</a></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                            @if($appCategories)

                                @foreach ($appCategories as $appCategory)
                                    <tr>
                                        <td>{{ $appCategory->id }}</td>
                                        <td>{{ $appCategory->name }}</td>
                                        <td>{{ $appCategory->created_at ? $appCategory->created_at->diffForHumans() : 'no date' }}</td>
                                        <td>{{ $appCategory->updated_at ? $appCategory->updated_at->diffForHumans() : 'no date' }}</td>
                                        <td><a href="{{ route('app_categories.edit', $appCategory->id) }}">edit</a> | <a href="{{ route('app_categories.show', $appCategory->id) }}">view</a></td>
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