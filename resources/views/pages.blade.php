@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Pages</h1>
                <form>
                    <div class="list-group">
                        <?php foreach($files as $file) { ?>
                            <a href="#" class="list-group-item">
                                <?php echo $file; ?>
                            </a>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
