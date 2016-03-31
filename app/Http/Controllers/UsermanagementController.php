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
}
