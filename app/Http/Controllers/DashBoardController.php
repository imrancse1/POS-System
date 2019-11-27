<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class DashBoardController extends Controller
{
	public $view_page_url;
	public function __construct()
	{
		$this->view_page_url = '';
	}
    public function index()
    {
    	// return Auth::user()->name;
    	// exit();
    	return view('index');
    }

}
