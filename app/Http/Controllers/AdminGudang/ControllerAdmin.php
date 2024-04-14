<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
}
