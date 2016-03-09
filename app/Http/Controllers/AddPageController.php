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
       fwrite($file, '@extends(\'layouts.app\')

@section(\'content\')

<div class="container content">
    <div class="row">'.
        $request->input('page_content')
    .'</div>
</div>

@endsection');

        // controller
        $controller_content = '<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class '.$request->input('page_name').'Controller extends Controller {
    public function index() {
		return view(\'pages/'.$request->input('page_name').'\');
	}
}
';

       $file = fopen('../app/Http/Controllers/'.$request->input('page_name').'Controller.php', 'w') or die('Could not create page');
       fwrite($file, $controller_content);

       $routes_file = '../app/Http/routes.php';
       $routes_content = file_get_contents($routes_file);

       $routes_content .= '
Route::get(\'/'.$request->input('page_name').'\', \''.$request->input('page_name').'Controller@index\');';

       file_put_contents($routes_file, $routes_content);

       return redirect($request->input('page_name'));
    }
}