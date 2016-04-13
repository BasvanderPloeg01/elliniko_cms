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
        $page = $_GET['page'];
        $file = file_get_contents('../resources/views/pages/'.$page.'.blade.php', NULL, NULL, 46);
        $file =  str_replace("@endsection", "", $file);
        return view('edit_page', compact('file', 'page'));
    }
    
    public function edit_page(Request $request) {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $file = fopen('../resources/views/pages/'.$page.'.blade.php', 'w') or die('Could not create page');
        } else {
            return redirect('pages');
        }
        
        if (empty($request->input('page_content'))) {
            // error handler
        }
        
        if (!empty($request->input('page_name'))) {
            rename('../resources/views/pages/'.$page.'.blade.php', '../resources/views/pages/'.$request->input('page_content').'.blade.php');
        }
       
        fwrite($file, '@extends(\'layouts.app\') @section(\'content\')' . $request->input('page_content') . '@endsection');

        $file = fopen('../resources/views/'.$page.'.txt', 'w') or die('Could not create page');
        $txt = $request->input('container_content');
        fwrite($file, $txt);
        fclose($file);
        return redirect($page);
    }
}