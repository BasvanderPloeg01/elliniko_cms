<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AddPageController extends Controller {
    public function index() {
        return view('add_page');
    }

    public function add_page(Request $request) {
       if (empty($request->input('page_name'))) {
           // error handler
       } else if (empty($request->input('page_content'))) {
           // error handler
       }

       $page = $request->input('page_name');
       $file = fopen('../resources/views/pages/'.$page.'.blade.php', 'w') or die('Could not create page');
       fwrite($file, '@extends(\'layouts.cms\')

@section(\'content\')

<div class="container content">
    <div class="row">'.
        $request->input('page_content')
    .'</div>
</div>

@endsection');

       var_dump($request->all());
    }
}