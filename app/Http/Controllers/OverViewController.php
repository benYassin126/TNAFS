<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\groups;
use Illuminate\Support\Facades\Auth;

class OverViewController extends Controller
{
    public function index () {
        $userID = \Auth::user()->id;
        $countGroup = Groups::select('id')->where('GroupSuper', $userID)->count();
        $countStudent = Students::select('id')->where('StudentSuper', $userID)->count();
        return view('layouts.overView.index',compact('countGroup','countStudent'));
    }
}
