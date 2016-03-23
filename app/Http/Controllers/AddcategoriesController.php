<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
class AddCategoriesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('add_categories');
    }
    
    public function add_category(Request $request) {
        if (empty($request->input('c_name'))) {
            // error handler
        }

        $layout_file = '../resources/views/layouts/app.blade.php';
        $ul = '<ul class="nav navbar-nav">';
        
        $new_c = '
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$request->input('c_name').'<span class="caret"></span></a>
                <ul class="dropdown-menu '.$request->input('c_name').'">
            
                </ul>
            </li>';
        
        $new_layout = str_replace($ul, $new_c, file_get_contents($layout_file));
        file_put_contents($layout_file, $new_layout);
    }
}
