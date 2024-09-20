<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Áp dụng middleware auth cho phương thức index
        $this->middleware('auth')->only('index');
    }
    
    public function index() {
        $users = User::all();
        return view('admin.index', compact('users'));
    }
    public function login() {
        return view('admin.login');
    }
    public function check_login(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ], [
            'email.required' => 'Email không để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Mật khẩu không được để trống'
        ]);

        $data = request()->only('email', 'password');
        if(auth()-> attempt($data, $request->has('remember'))) {
            return redirect()->route('admin.index')->with('yes', 'Chào mừng trở lại');
        }
        return redirect()->back()->with('no', 'Mật khẩu không chính xác');
    }
    public function register() {
        return view('admin.register');
    }
    public function check_register() {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.required' => 'Xác thực mật khẩu không được để trống',
            'confirm_password.same' => 'Xác thực mật khẩu không đúng'
        ]);

        $data = request()->all('name', 'email');
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        return redirect()->route('admin.login');
    }
    public function logout() {
        auth()->logout();
        return redirect()->route('admin.login')->with('no', 'Bạn đã đăng xuất khỏi hệ thống');
    }
}
