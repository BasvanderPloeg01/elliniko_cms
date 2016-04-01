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
	
	public static function change_role($username, $admin) {
		if ($admin) {
			DB::update('UPDATE users SET admin = 1 where name = ?', [$username]);
		} else if (!$admin) {
			DB::update('UPDATE users SET admin = 0 where name = ?', [$username]);
		}
	}
	
	public static function add_moderator($username, $email, $password, $isadmin) {
		$password = bcrypt($password);
		$admin = $isadmin ? 1 : 0;
		
		DB::insert('INSERT INTO users (name, email, password, admin) VALUES (?, ?, ?, ?)', [$username, $email, $password, $admin]);
	}
}
