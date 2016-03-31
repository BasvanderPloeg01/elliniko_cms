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
                  <div class="table-responsive">
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th>Username</th>
                                  <th>Role</th>
                              </tr>
                          </thead>
                          <?php foreach($users as $user) { ?>
                                <tr>
                                    <td><?= $user->name ?></td>
                                    
                                    <?php if ($user->name) { ?>
                                        <td>
                                            <select>
                                                <option>admin</option>
                                                <option>moderator</option>
                                            </select>
                                        </td>
                                    <?php } else { ?>
                                        <td><?= ($user->admin) ? 'admin' : 'moderator' ?></td>
                                    <?php } ?>
                                </tr>
                          <?php } ?>
                      </table>
                      <input type="submit" class="btn btn-primary" value="save">
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection
