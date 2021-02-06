<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Groups;
use App\User;

class StudentShowController extends Controller
{
    public function index(User $userID)
    {
        $userid = $userID->id;
        $user = User::where('id',$userid)->first();
        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userid)->get();
        $allGroups = Groups::orderByDesc('GroupPoints')->select('id','GroupName','GroupSuper','GroupPoints')->where('GroupSuper', $userid)->get();
        $checkWatch = User::select('WatchResult')->where('id',$userID->id)->first();
        $checkWatch = $checkWatch->WatchResult;
        $topNames = [];

        if ($allStudents->count()) {
            $topPoints = $allStudents->first()->StudentPoints;



        foreach ($allStudents as  $Student) {
            if ($Student->StudentPoints == $topPoints && $topPoints > 0 ) {
                array_push($topNames,$Student->StudentName );
            }

        }

        $curntPoint = $topPoints;
        $order = 1;
        $orderArray = [];

        foreach ($allStudents as $Student) {
           if ($Student->StudentPoints == $curntPoint) {
            array_push($orderArray,$order);
        }elseif ($Student->StudentPoints < $curntPoint) {
            $curntPoint = $Student->StudentPoints;
            $order++;
            array_push($orderArray, $order);
        }

    }


    $topNamesGroup = [];
    $topPointsGroup = $allGroups->first()->GroupPoints;

    foreach ($allGroups as  $Group) {
        if ($Group->GroupPoints == $topPointsGroup && $topPointsGroup > 0 ) {
            array_push($topNamesGroup,$Group->GroupName );
        }

    }

    $curntPointGroup = $topPointsGroup;
    $orderGroup = 1;
    $orderArrayGroup = [];

    foreach ($allGroups as $Group) {
       if ($Group->GroupPoints == $curntPointGroup) {
        array_push($orderArrayGroup,$orderGroup);
    }elseif ($Group->GroupPoints < $curntPointGroup) {
        $curntPointGroup = $Group->GroupPoints;
        $orderGroup++;
        array_push($orderArrayGroup, $orderGroup);
    }

}



return view('layouts.StudentShow',compact('allStudents','allGroups','checkWatch','topNames','orderArray','topNamesGroup','orderArrayGroup','user'));

}else {
    return redirect('student')->with('message','اضف طلاب حتى تظهر لك صفحة عرض النتائج للطلاب');
}
}
}
