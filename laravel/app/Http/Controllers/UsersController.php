<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function query1()//--> select * from users 
    {
        $var1=DB::table('users')->get() ;
        return $var1 ;
    }
    public function query2()
    {
        $var2=DB::table('users')->select('name','user_id')->distinct('name')->get() ;//-->select (distinct)name user_id from users
        return $var2 ;
    }
}
