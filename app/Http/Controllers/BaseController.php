<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
    /**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
	public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }
}
