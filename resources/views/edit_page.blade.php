@extends('layouts.cms')

@section('content')
    <div  class="container">
        <div class="row">
            <div class="col-md-10">
                <!-- Navigation -->
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Start Bootstrap</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('welcome') }}">welcome</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
            </div>
            <div class="col-md-10">
                <div class="gridster">
                    <ul>
                        <li data-row="1" data-col="12" data-sizex="12" data-sizey="5">
                            <img src="http://sbootstrap.startbootstrapc.netdna-cdn.com/assets/img/templates/agency.jpg" class="img-responsive" alt="Free Bootstrap 3 Themes and Templates">
                        </li>
                        <li data-row="1" data-col="12" data-sizex="12" data-sizey="5">2</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h1>Edit <?php echo $page ?></h1>
                <button onclick="add_widget()">Add widget</button>
                <button onclick="add_widget_img()">Add widget Image</button>
                <button onclick="remove_widget()">Remove widget</button>
                <button onclick="save_page()">Save Page</button>
                <br>
                <form method="post" role="form">
                    <label>Page Content!</label>
                    <textarea rows="10" name="page_content" title="content" required="true">
                        <?php echo $file ?>
                    </textarea><br>
                    <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="edit page"/>
                </form>
            </div>
        </div>
    </div>

    <div id="bilbo"></div>
@endsection