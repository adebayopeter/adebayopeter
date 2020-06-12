@extends('layouts.admin')

@section('page-title')
    View Application Category
@stop

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" value="{{ $appCategory->name }}" disabled>
                        </div>

                        <a href="{{ route('app_categories.edit', $appCategory->id) }}" class="btn btn-primary btn-sm btn-block">Edit Application Category</a>

                        <a href="{{ route('app_categories.index') }}" class="btn btn-primary btn-sm btn-block">View All Application Category</a>

                    </form>


                </div>
            </div>
        </div>
    </div>

@stop