<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AddPageController extends Controller {
    public function index() {
        return view('add_page');
    }
}