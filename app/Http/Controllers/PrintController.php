<?php

namespace App\Http\Controllers;
use App\Students;
use App\Groups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PrintController extends Controller
{


    public function index()
    {
        $userID = \Auth::user()->id;
        $user = User::find($userID);
        $WatchResult = User::select('WatchResult')->where('id', $userID)->first()->WatchResult;
        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userID)->get();
        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        return view('layouts.print.index',compact('allGroups','allStudents','WatchResult','user'));
    }







//////////////////////////////////////////////////////////////////////////////////

 public function showPrint(Request $request) {
    $userID = \Auth::user()->id;
    $user = User::where('id',$userID)->first();
    $printType = $request->input('printType');
    $selectedGroup = $request->input('StudentGroup');

    if ($selectedGroup == 0) {
        $GroupTitle = 'جميع الطلاب';
    }else {
        $allGroups =  Groups::find($selectedGroup)->where('id', $selectedGroup)->get();
        $GroupTitle = $allGroups->first()->GroupName;

    }

    if ($selectedGroup == 0) {

        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userID)->get();

    }else {
        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentGroup', $selectedGroup)->get();
    }

    if ($printType == 'printKshof') {
          return view('layouts.print.Kshoof',compact('allStudents','GroupTitle','user'));
    }elseif ($printType == 'printPoints') {
        return view('layouts.print.printWithPoints',compact('allStudents','GroupTitle','user'));
    }

}


}
