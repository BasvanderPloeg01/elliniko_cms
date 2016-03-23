@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" role="form">
                    <label>Category name!</label><input type="text" class="form-control" name="c_name" required="true"/><br>
                    <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="add category"/>
                </form>
            </div>
        </div>
    </div>
@endsection
