<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    function index() {
        return view('admin.home', [
            'title'=>'Trang quản trị',
            'name'=>auth()->user()->name,
        ]);
    }
    
    function logout() {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('login');
    }
    
}
