@extends('layouts.admin')


@section('page-title')
    Edit Client
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">.</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/clients/{{$client->id}}">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="PUT">

                        @include('partials.form_error')

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" value="{{ $client->name }}" name="name" id="name" placeholder="Client's Name...">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  value="{{ $client->address }}" name="address" placeholder="https:// or http://" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  value="{{ $client->phone1 }}" name="phone1" id="phone1" placeholder="Mobile" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"  value="{{ $client->phone2 }}" name="phone2" id="phone2" placeholder="Phone">
                        </div>

                        <div class="row">
                            <input type="submit" name="submit" value="Save Client" class="btn btn-primary btn-sm btn-block">
                        </div>

                    </form>
                    {{-- <br>
                    <form action="/admin/clients/{{$client->id}}" method="post">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="DELETE">

                        <div class="row">
                            <input type="submit" value="Delete Category" class="btn btn-danger btn-sm btn-block">
                        </div>

                    </form> --}}
                </div>
            </div>
        </div>

    </div>
    
@endsection