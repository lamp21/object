<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() 
    { 
        $this->middleware('auth.admin:admin'); 
    } 
    // 
    public function index() 
    { 
        dd('用户名：'.auth('admin')->user()->name); 
    } 
}
