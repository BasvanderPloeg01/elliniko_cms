@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <h1><?= $page ?></h1>

                <form method="post" role="form">
                   <textarea id="code" name="code">
                       <?= $file ?>
                   </textarea><br>
                   <input type="hidden" value="<?= $dir ?>" name="dir">
                   <input type="hidden" value="<?= $page ?>" name="page">
                   <input type="submit" class="btn btn-primary" value="save">
               </form>
            </div>
        </div>
    </div>
@endsection
