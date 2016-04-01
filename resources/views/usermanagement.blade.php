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
                            <?php if ($admin) { ?>
                                <th>Is Admin</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) { ?>
                                <tr>
                                    <th><?= $user->id ?></th>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= ($user->admin) ? 'Admin' : 'Moderator' ?></td>
                                    <?php if ($admin) { ?>
                                        <td><input type="checkbox" name="isadmin_<?= $user->name ?>"
                                            <?= ($user->admin) ? 'checked' : '' ?> /></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if ($admin) { ?>
                        <input type="submit" class="btn btn-primary" value="save" />
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
@endsection
