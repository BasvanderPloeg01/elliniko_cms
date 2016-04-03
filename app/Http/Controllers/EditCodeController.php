<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class EditCodeController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		if (!isset($_GET['page'])) {
			return redirect('code_editor');
		}
		
		$page = $_GET['page'];
		$extension = substr($page, -3);
		
		switch ($extension) {
			case "php":
				$file = file_get_contents('../resources/views/pages/'.$page);
				$dir = '../resources/views/pages/'.$page;
				break;
			case ".js":
				$file = file_get_contents('../public/js/'.$page);
				$dir = '../public/js/'.$page;
				break;
			case "css":
				$file = file_get_contents('../public/css/'.$page);
				$dir = '../public/css/'.$page;
				break;
			default:
				$file = "Unknown extension";
		}
		
		return view('edit_code', compact('page', 'file', 'dir'));
	}
	
	public function edit (Request $request) {
		if (empty($request->all())) {
			// error handler
		}
		
		$dir = file_get_contents($request->input('dir'));
		$new_dir = str_replace($dir, $request->input('code'), $dir);
		
		file_put_contents($request->input('dir'), $new_dir);
		
		return redirect('edit_code?page='.$request->input('page'));
	}
}