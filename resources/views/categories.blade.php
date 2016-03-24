@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" role="form">
                    <h1>Categories
                        <a href="{{ url('add_categories') }}">
                            <input type="button" class="btn btn-primary" value="add category"/>
                        </a>
                        <?php if (!empty($categories)) { ?>
                             <input type="submit" class="btn btn-danger" value="delete category"/>
                        <?php } ?>
                    </h1>
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $cat) { ?>
                            <a href="" class="list-group-item">
                                <?php echo str_replace('"', "", $cat); ?>
                                <input name="delete_<?php echo str_replace('"', "", $cat); ?>" type="checkbox" class="pull-right"/>
                                <input type="hidden" name="file_<?php echo str_replace('"', "", $cat); ?>" value="file_<?php echo str_replace('"', "", $cat); ?>">
                            </a>
                        <?php }
                    } else { ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                No categories found
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
@endsection

