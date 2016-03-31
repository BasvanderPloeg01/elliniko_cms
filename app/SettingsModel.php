<?php

namespace App;	

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class SettingsModel extends Model {
	public static function get_users() {
		$users = DB::table('users')->get();
		return $users;
	}
}
