<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Monolog\Level;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('fontend.login', [
                'title' => 'Login Form'
            ]);
        }
    }


    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required | email:filter',
                'password' => 'required',
            ],
            [
                'email.required' => 'Vui lòng không để trống Email',
                'email.email' => 'Vui lòng nhập đúng định dạng email.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
            ]
        );

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            $user = Auth::user(); // Lấy thông tin của người dùng đã đăng nhập

            if ($user->level === 1) {
                return redirect()->route('admin');
            } else {
                Session::flash('error', 'Tài khoản của bạn không có quyền truy cập trang admin');
                return redirect()->route('home'); // Đưa người dùng về trang home
            }
            
        } else {
            Session::flash('error', 'Email hoặc Password không đúng');
            return redirect()->back();
        }
    }
}
