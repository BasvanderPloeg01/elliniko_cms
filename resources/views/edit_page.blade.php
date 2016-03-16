@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Edit <?php echo $page ?></h1>
                <form method="post" role="form">
                    <label>Page Content!</label>
                    <textarea rows="10" name="page_content" title="content" required="true">
                        <?php echo $file ?>
                    </textarea><br>
                    <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="edit page"/>
                </form>
            </div>
        </div>
    </div>
@endsection