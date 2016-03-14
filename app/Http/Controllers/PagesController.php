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
}
