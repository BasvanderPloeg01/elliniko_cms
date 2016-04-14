@extends('layouts.cms')
<?php
    $user = Auth::user();
    $admin = $user['attributes']['admin'];
?>

@section('content')
    <div class="container content">
        <div class="row">
            <?php if ($admin) { ?>
                 <div class="col-md-10 col-md-offset-1 col-lg-5">
                    <h1>Add moderator</h1><br>
                    <form method="post" role="form">
                        <label>Username:</label><input type="text" name="username" class="form-control"><br>
                        <label>Email:</label><input type="email" name="email" class="form-control"><br>
                        <label>Password:</label><input type="password" name="password" class="form-control"><br>
                        <label>Is Admin:</label><br><input type="checkbox" name="isadmin"><br><br>
                        <input type="submit" class="btn btn-primary" value="Add moderator"/>
                    </form>
                 </div>
            <?php } else { ?>
                <div class="alert alert-danger col-lg-12">
                    You have no permission to add moderators
                </div>
            <?php } ?>
        </div>
    </div>
@endsection
