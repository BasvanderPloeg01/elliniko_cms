<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AddPageController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $categories = array();
        $layout_file = file('../resources/views/layouts/app.blade.php');
        
        foreach($layout_file as $line) {
            if (strstr($line, 'dropdown-menu')) {
                $under_pos = strpos($line, '_');
                $temp_file = substr($line, $under_pos, -3);
                $temp_file = str_replace('_', "", $temp_file);
                
                $categories[] = $temp_file;
            }
        }
        
        return view('add_page', compact('categories'));
    }

    public function add_page(Request $request) {
       if (empty($request->input('page_name'))) {
           // error handler
       } else if (empty($request->input('page_content'))) {
           // error handler
       }

        $pageName = $request->input('page_name');
        $category = $request->input('category');
        
        $pageName = str_replace(" ","_",$pageName);
        $pageContent = $request->input('page_content');
        $file = fopen('../resources/views/pages/'.$pageName.'.blade.php', 'w') or die('Could not create page');
        fwrite($file, '@extends(\'layouts.app\')

@section(\'content\')

<div class="container content">
    <div class="row">'.
        $pageContent
    .'</div>
</div>

@endsection');

        // controller
        $controller_content = '<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class '.$pageName.'Controller extends Controller {
    public function index() {
		return view(\'pages/'.$pageName.'\');
	}
}
';

       $file = fopen('../app/Http/Controllers/'.$pageName.'Controller.php', 'w') or die('Could not create page');
       fwrite($file, $controller_content);

       $routes_file = '../app/Http/routes.php';
       $routes_content = file_get_contents($routes_file);

       $routes_content .= '
Route::get(\'/'.$pageName.'\', \''.$pageName.'Controller@index\');';

       file_put_contents($routes_file, $routes_content);
        
       $layout_file = "../resources/views/layouts/app.blade.php";
       $layout = file_get_contents($layout_file);
        
       if ($category == 'None') {
           $ul = '<ul class="nav navbar-nav">';
           $new_layout = str_replace($ul, $ul."\n\t\t\t\t<li><a href=\"{{ url('$pageName') }}\">$pageName</a></li>", $layout);

           file_put_contents($layout_file, $new_layout);     
       } else {
           $ul = '<ul class="dropdown-menu _'.$category.'">';
           $new_layout = str_replace($ul, $ul."\n\t\t\t\t<li><a href=\"{{ url('$pageName') }}\">$pageName</a></li>", $layout);
           
           file_put_contents($layout_file, $new_layout);
       }
        
        $file = fopen('../resources/views/'.$pageName.'.txt', 'w') or die('Could not create page');
        $txt = $request->input('container_content');
        fwrite($file, $txt);
        fclose($file);
       return redirect("pages");
    }
}