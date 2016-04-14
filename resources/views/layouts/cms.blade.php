<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Elliniko CMS</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/theme.css" rel="stylesheet">
    <link href="./css/stylesheet.css" rel="stylesheet">
    <link href="./css/skin-green.css" rel="stylesheet">
    <link href="./css/codemirror.css" rel="stylesheet">
    <link href="./css/bootstrap-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body class="hold-transition skin-green sidebar-mini edit">
<!-- header -->
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('welcome') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>E</b>lliniko</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-fixed-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog"></i><span class="label label-success"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </form>
            <!-- /.search form -->
                    <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Menu</li>
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ url('code_editor') }}"><i class="fa fa-file-code-o"></i> <span>Code editor</span></a></li>
                <li class="treeview">
                    <a href=""><i class="fa fa-cog"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('usermanagement') }}"><i class="fa fa-users"></i>User management</a></li>
                        <li><a href="{{ url('add_moderator') }}"><i class="fa fa-user"></i>Add moderator</a></li>
                        <li><a href="{{ url('edit_title') }}"><i class="fa fa-list-alt"></i>Edit website title</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href=""><i class="fa fa-file-text"></i> <span>Pagination</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('pages') }}"><i class="fa fa-file"></i>Pages</a></li>
                        <li><a href="{{ url('add_page') }}"><i class="fa fa-plus"></i>Add page</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href=""><i class="fa fa-folder"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('categories') }}"><i class="fa fa-folder-open-o"></i>Categories</a></li>
                        <li><a href="{{ url('add_categories') }}"><i class="fa fa-plus"></i>Add category</a></li>
                    </ul>
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content" style="padding-top: 55px">
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="{{ url('logout') }}">
                            Logout
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside>
</div>
<!-- script references -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="./js/app.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/codemirror.js"></script>
<script src="./js/modes.js"></script>
<script src="./js/bootstrap-select.js"></script>
<script>tinymce.init({ mode: "specific_textareas", editor_selector:'tinymce' });</script>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
        styleActiveLine: true,
        lineNumbers: true,
        readOnly: false,
    });
</script>
</body>
</html>