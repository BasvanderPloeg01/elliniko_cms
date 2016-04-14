@extends('layouts.cms')
<?php
    $user = Auth::user();
    $admin = $user['attributes']['admin'];
?>

@section('content')
    <div class="container content">
        <div class="row">
            <?php if ($admin) { ?>
                <div class="col-md-10 col-md-offset-1">
                    <h1>Stylesheets: </h1>
                    <?php foreach($CSSfiles as $file) { ?>
                          <a href="{{ url('edit_code?page='.$file) }}" class="list-group-item">
                              <?= $file ?>
                          </a>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger col-lg-12">
                    You have no permission to edit stylesheets
                </div>
            <?php } ?>
        </div>
    </div>
@endsection

