@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Pages
                    <a href="{{ url('add_page') }}">
                        <input type="button" class="btn btn-primary" value="add page"/>
                    </a>
                </h1>
                <form method="get" role="form">
                    <div class="list-group">
                        <?php foreach($files as $file) { ?>
                            <a href="{{ url('edit_page?page='.$file) }}" class="list-group-item">
                                <?php echo $file; ?>
                            </a>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
