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

						unlink($view);
						unlink($controller);
					}
				}

				return redirect('pages');
			} else {
				return redirect('pages');
			}
		}
	}
}
