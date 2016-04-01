<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SettingsModel;

class AddModeratorController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('add_moderator');
	}
	
	public function add_moderator(Request $request) {
		if (empty($request->all())) {
			// error handler
		}
		
		$isadmin = $request->input('isadmin') == 'on' ? true : false;
		
		SettingsModel::add_moderator(
			$request->input('username'),
			$request->input('email'),
			$request->input('password'),
			$isadmin
		);
		
		return redirect('usermanagement');
	}
}
