<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Request;
class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['loginForm','login']);
    }

    public function index() {
        return view('admin.entry.index');
    }
    public function loginForm() {
        return view('admin.entry.login');
    }
    public function login() {
        // config -> auth.php -> admin
        $state = Auth::guard('admin')->attempt([
            'username' => Request::input('username'),
            'password' => Request::input('password')
        ]);
        if ($state) {
            return redirect('admin/index');
        }
        //with: 暂存于session('error')
        return redirect('admin/login')->with('error','用户名或密码错误');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
