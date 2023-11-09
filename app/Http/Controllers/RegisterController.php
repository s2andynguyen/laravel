<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index() {
        if(Auth::check()){
            return redirect('/');
        } else {
            return view('fontend.register', ['title'=>'Register Form']);
        }
    }

    function create(Request $request) {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required | email:filter | unique:users',
            'password'=>'required | min:6 | confirmed'
        ], [
            'name.required'=>'Vui lòng nhập tên user.',
            'email.email'=>'Vui lòng nhập đúng định dạng email.',
            'email.unique'=>'Email đã tồn tại.',
            'password'=>'Không để trống password.',
            'password.min'=>'Vui lòng nhập password ít nhất 6 kí tự.',
            'password.confirmed'=>'Password nhập lại không chính xác.',
            'name'=>'Vui lòng nhập tên user.',
        ]);
        if ($request->input('level')) {
            $level = $request->input('level');
        } else {
            $level = 2;
        }
        $user = User::create([
            'name'=>(string) $request->input('name'),
            'email'=>(string) $request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'level'=>(int) $level
        ]);

        Auth::login($user);
        if($level == 1) {
            return redirect('/admin/main');
        } else {
            return redirect('/');
        }

    }
}
