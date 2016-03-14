@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" role="form">
                    <h1>Pages
                        <a href="{{ url('add_page') }}">
                            <input type="button" class="btn btn-primary" value="add page"/>
                        </a>
                        <input type="submit" class="btn btn-danger" value="delete page(s)"/>
                    </h1>
                    <div class="list-group">
                        <?php foreach($files as $file) { ?>
                            <a href="{{ url('edit_page?page='.$file) }}" class="list-group-item">
                                <?php echo $file; ?>
                                <input name="delete_<?php echo $file; ?>" type="checkbox" class="pull-right"/>
                                <input type="hidden" name="file'_<?php echo $file; ?>" value="file_<?php echo $file ?>">
                            </a>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
