<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class EditPageController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        
        
    }
    
    public function index() {
        if (!isset($_GET['page'])) {
        return redirect('pages');
    }
        return view('edit_page');
        
    }
    
    public function add_page(Request $request) {
        if (empty($request->input('page_content'))) {
            // error handler
        }

        $page = $_GET['page'];
        $file = fopen('../resources/views/pages/'.$page.'.blade.php', 'w') or die('Could not create page');
        fwrite($file, '@extends(\'layouts.app\')
@section(\'content\')

<div class="container content">
    <div class="row">'.
            $request->input('page_content')
            .'</div>
</div>

@endsection');
        return redirect($page);
    }
}