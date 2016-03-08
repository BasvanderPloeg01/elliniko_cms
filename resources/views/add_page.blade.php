@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Add a new page!</h1>
                <form method="post" role="form">
                    <label>Page name!</label><input type="text" class="form-control"/><br>
                    <textarea rows="10"></textarea><br>
                    <input type="submit" class="btn btn-primary" value="add page"/>
                </form>
            </div>
        </div>
    </div>
@endsection