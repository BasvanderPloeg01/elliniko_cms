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
       fopen('../resources/views/'.$page.'.blade.php', 'w') or die('Could not create page');

       var_dump($request->all());
    }
}