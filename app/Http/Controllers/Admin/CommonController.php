<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function successMsg($message) {
        return response()->json(['message' => $message, 'valid' => 1]);
    }
    public function errorMsg($message) {
        return response()->json(['message' => $message, 'valid' => 0]);
    }

}
