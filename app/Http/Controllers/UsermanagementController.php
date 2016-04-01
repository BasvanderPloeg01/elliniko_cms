<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SettingsModel;

class UsermanagementController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$users = SettingsModel::get_users();
		return view('usermanagement', compact('users'));
	}
	
	public function change_role(Request $request) {
		if (empty($request->all())) {
			// error handler
		}
		
		$users = SettingsModel::get_users();
		
		foreach ($users as $user) {
			if (!$user->admin) {
				if ($request->input('isadmin_'.$user->name) == 'on') {
					SettingsModel::change_role($user->name, true);
				}
			} else if ($user->admin) {
				if (empty($request->input('isadmin_'.$user->name))) {
					SettingsModel::change_role($user->name, false);
				}
			}
		}

		return redirect('usermanagement');
	}
}
