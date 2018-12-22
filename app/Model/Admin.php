<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
class Admin extends User
{
    // 'not found remember_token' error resolved
    protected $rememberTokenName = '';
}
