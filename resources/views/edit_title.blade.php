@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-5">
                <form method="post" role="form">
                    <label>Website title</label>
                    <input type="text" class="form-control" name="title" placeholder="new website title"><br>
                    <input type="submit" class="btn btn-primary" value="save">
                </form>
            </div>
        </div>
    </div>
@endsection

