<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SettingsModel;

class CodeEditorController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$CSSdir = '../public/css';

		if (!is_dir($CSSdir)) {
			exit('Invalid diretory path');
		}
		
		$CSSfiles = array();
		
		foreach (scandir($CSSdir) AS $file) {
			if ('.' === $file) {
				continue;
			}

			if ('..' === $file) {
				continue;
			}
			
			$CSSfiles[] = $file;
		}
		
		return view('code_editor', compact('CSSfiles'));
	}
}
