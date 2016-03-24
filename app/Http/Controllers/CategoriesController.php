<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CategoriesController extends Controller {
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
		
		return view('categories', compact('categories'));
	}
	
	public function delete_category(Request $request) {
		$categories = array();
		$layout_file = '../resources/views/layouts/app.blade.php';
		
		if (!empty($request->all())) {
			foreach ($request->all() as $res) {
				if (strstr($res, 'file')) {
					$temp = str_split($res);
					$last_char = count($temp)-1;

					$categories[] = substr($res, 5, $last_char);
				}
			}
			
			if (!empty($categories)) {
				for ($ii = 0; $ii < count($categories); $ii++) {
					if ($request->input("delete_".$categories[$ii]) == 'on') {
						$dropdown = '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$categories[$ii].'<span class="caret"></span></a>';
						$new_layout = str_replace($dropdown, "", file_get_contents($layout_file));
						file_put_contents($layout_file, $new_layout);
						
						$ul = '<ul class="dropdown-menu _'.$categories[$ii].'">';
						$new_layout = str_replace($ul, "", file_get_contents($layout_file));
						file_put_contents($layout_file, $new_layout);
					}
				}

				return redirect('categories');
			} else {
				return redirect('categories');
			}
		} else {
			return redirect('categories');
		}
	}
}

