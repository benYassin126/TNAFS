<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;
use App\Groups;
use Illuminate\Support\Facades\Auth;



class OverViewController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index () {
        $userID = \Auth::user()->id;
        $user = $user = User::find($userID);
        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userID)->get();
        $allGroups = Groups::orderByDesc('GroupPoints')->select('id','GroupName','GroupSuper','GroupPoints')->where('GroupSuper', $userID)->get();
        $WatchResult = User::select('WatchResult')->where('id', $userID)->first()->WatchResult;
        $countGroup = Groups::select('id')->where('GroupSuper', $userID)->count();
        $countStudent = Students::select('id')->where('StudentSuper', $userID)->count();
        return view('layouts.overView.index',compact('countGroup','countStudent','WatchResult','user','allStudents','allGroups'));
    }

    public function WatchResult(Request $request) {
        $UserID = \Auth::user()->id;
        $form_data = array(
            'WatchResult' => $request->conrtolShow,
        );
        $user = User::find($UserID);
        $user->update($form_data);

     return redirect('overView')->with('message', 'تم التعديل بنجاح');


    }
}
