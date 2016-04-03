@extends('layouts.cms')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Add a new page!</h1>
                <form method="post" role="form">
                    <label>Page name!</label><input type="text" class="form-control" name="page_name" placeholder="example: Contact" required="true"/><br>
                    <label>Page Content!</label>
                    <textarea rows="10" class="tinymce" name="page_content" title="content" required="true">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </textarea><br>
                    <label for="sel1">Add to category:</label>
                    <select class="form-control" id="sel1" name="category">
                        <option>None</option>
                        <?php 
                        if (!empty($categories)) {
                            foreach ($categories as $cat) { ?>
                                 <option><?php echo str_replace('"', "", $cat); ?></option>
                            <?php } 
                        } ?>
                    </select><br>
                    
                    <input type="hidden" name="_Token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" value="add page"/>
                </form>
            </div>
        </div>
    </div>
@endsection