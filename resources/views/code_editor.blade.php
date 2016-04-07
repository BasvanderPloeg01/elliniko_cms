@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>HTML: </h1>
                <?php foreach($HTMLfiles as $file) { ?>
                         <a href="{{ url('edit_code?page='.$file) }}" class="list-group-item">
                             <?= $file ?>
                         </a>
                <?php } ?>
                
                <h1>Javascript: </h1>
                <?php foreach($JSfiles as $file) { ?>
                         <a href="{{ url('edit_code?page='.$file) }}" class="list-group-item">
                             <?= $file ?>
                         </a>
                <?php } ?>
                
                <h1>Css: </h1>
                <?php foreach($CSSfiles as $file) { ?>
                      <a href="{{ url('edit_code?page='.$file) }}" class="list-group-item">
                          <?= $file ?>
                      </a>
                <?php } ?>
            </div>
        </div>
    </div>
@endsection
