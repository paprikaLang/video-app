<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class MyController extends Controller
{
    public function passwordForm() {
        return view('admin.my.pwForm');
    }
    public function changePassword(AdminRequest $request) {
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request['password']);
        $user->save();
    }
}
