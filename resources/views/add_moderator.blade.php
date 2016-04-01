@extends('layouts.cms')
<?php
    $user = Auth::user();
    $admin = $user['attributes']['admin'];
?>

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-lg-5">
                <?php if ($admin) { ?>
                    <h1>Add moderator</h1><br>
                    <form method="post" role="form">
                        <label>Username:</label><input type="text" name="username" class="form-control"><br>
                        <label>Email:</label><input type="email" name="email" class="form-control"><br>
                        <label>Password:</label><input type="password" name="password" class="form-control"><br>
                        <label>Is Admin:</label><br><input type="checkbox" name="isadmin"><br><br>
                        <input type="submit" class="btn btn-primary" value="Add moderator"/>
                    </form>
                <?php } else { ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            You have no permission to add moderators
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
@endsection
