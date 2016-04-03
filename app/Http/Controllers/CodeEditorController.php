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
		$HTMLdir = '../resources/views/pages';
		$JSdir = '../public/js';
		$CSSdir = '../public/css';

		if (!is_dir($HTMLdir) || !is_dir($JSdir) || !is_dir($CSSdir)) {
			exit('Invalid diretory path');
		}
		
		$HTMLfiles = array();
		$JSfiles = array();
		$CSSfiles = array();
		
		foreach (scandir($HTMLdir) AS $file) {
			if ('.' === $file) {
				continue;
			}

			if ('..' === $file) {
				continue;
			}
			
			$HTMLfiles[] = $file;
		}

		foreach (scandir($JSdir) AS $file) {
			if ('.' === $file) {
				continue;
			}

			if ('..' === $file) {
				continue;
			}
			
			$JSfiles[] = $file;
		}

		foreach (scandir($CSSdir) AS $file) {
			if ('.' === $file) {
				continue;
			}

			if ('..' === $file) {
				continue;
			}
			
			$CSSfiles[] = $file;
		}
		
		return view('code_editor', compact('HTMLfiles', 'JSfiles', 'CSSfiles'));
	}
}
