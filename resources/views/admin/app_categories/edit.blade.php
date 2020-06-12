@extends('layouts.admin')


@section('page-title')
    Edit Application Category
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">.</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/app_categories/{{$appCategory->id}}">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        @include('partials.form_error')

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" value="{{ $appCategory->name }}" name="name" id="name" placeholder="Application Category Name...">
                        </div>

                        <div class="row">
                            <input type="submit" name="submit" value="Save Application Category" class="btn btn-primary btn-sm btn-block">
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection