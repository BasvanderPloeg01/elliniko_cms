@extends('layouts.cms')
<?php
    $user = Auth::user();
    $admin = $user['attributes']['admin'];
?>
@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="post" role="form">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user) { ?>
                            <tr>
                                <th><?= $user->id ?></th>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= ($user->admin) ? 'Admin' : 'Moderator' ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
