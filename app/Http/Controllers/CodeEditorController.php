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
		return view('code_editor');
	}
}
