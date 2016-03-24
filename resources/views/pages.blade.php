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
                        <?php if (!empty($files)) { ?>
                            <input type="submit" class="btn btn-danger" value="delete page(s)"/>
                        <?php } ?>
                    </h1>
                    <div class="list-group">
                        <?php if (!empty($files)) { ?>
                            <?php foreach($files as $file) { ?>
                                <a href="{{ url('edit_page?page='.$file) }}" class="list-group-item">
                                    <?php echo $file; ?>
                                    <input name="delete_<?php echo $file; ?>" type="checkbox" class="pull-right"/>
                                    <input type="hidden" name="file'_<?php echo $file; ?>" value="file_<?php echo $file ?>">
                                </a>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    No pages found
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
