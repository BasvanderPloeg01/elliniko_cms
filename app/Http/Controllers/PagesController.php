<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	
    public function index() {
		$directory = '../resources/views/pages';

		if (!is_dir($directory)) {
			exit('Invalid diretory path');
		}

		$files = array();

		foreach (scandir($directory) as $file) {
			if ('.' === $file) {
				continue;
			} 
				
			if ('..' === $file) {
				continue;
			}

			$dot_pos = strpos($file, '.');
			$temp_file = substr($file, 0, $dot_pos);
			
			$files[] = $temp_file;
		}

		return view('pages', compact('files'));
	}

	public function delete_page(Request $request) {
		$pages = array();
		$routes_file = '../app/Http/routes.php';
		$layout_file = '../resources/views/layouts/app.blade.php';

		if (!empty($request->all())) {
			foreach ($request->all() as $res) {
				if (strstr($res, 'file')) {
					$temp = str_split($res);
					$last_char = count($temp)-1;

					$pages[] = substr($res, 5, $last_char);
				}
			}

			if (!empty($pages)) {
				for ($ii = 0; $ii < count($pages); $ii++) {
					if ($request->input("delete_".$pages[$ii]) == 'on') {
						$view = '../resources/views/pages/'.$pages[$ii].'.blade.php';
						$controller = '../app/Http/Controllers/'.$pages[$ii].'Controller.php';

						// Removes the view
						unlink($view);

						// Removes the controller
						unlink($controller);

						// Removes the route from Routes.php
						$route = "Route::get('/$pages[$ii]', '$pages[$ii]Controller@index');";
						$new_routes = str_replace($route, "", file_get_contents($routes_file));
						file_put_contents($routes_file, $new_routes);

						$li = "<li><a href=\"{{ url('$pages[$ii]') }}\">$pages[$ii]</a></li>";
						$new_layout = str_replace($li, "", file_get_contents($layout_file));
						file_put_contents($layout_file, $new_layout);
					}
				}

				return redirect('pages');
			} else {
				return redirect('pages');
			}
		}
	}
}
