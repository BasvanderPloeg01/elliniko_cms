<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class EditTitleController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('edit_title');
	}

	public function edit_title (Request $request) {
		if (empty($request->input('title'))) {
			// error_handler
		}
		
		$layout = '../resources/views/layouts/app.blade.php';
		$file = file($layout);
		$title = '';
		$new_title = $request->input('title');
		$header = '';
		$new_header = $request->input('title');
		
		foreach ($file as $line) {
			if (strstr($line, 'website_title')) {
				$title = $line;
			}
			
			if (strstr($line, 'navbar-brand')) {
				$header = $line;
			}
		}

		$file_layout = file_get_contents($layout);
		
		$new_layout = str_replace($title, "\t<title>$new_title</title> <!-- website_title -->\n", $file_layout);
		file_put_contents($layout, $new_layout);

		$file_layout = file_get_contents($layout);

		$new_layout = str_replace($header, "\t\t<a class='navbar-brand' href='#'>$new_header</a>\n", $file_layout);
		file_put_contents($layout, $new_layout);
		
		return redirect('edit_title');
	}
}