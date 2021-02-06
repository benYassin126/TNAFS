<?php

namespace App\Http\Controllers;
use App\Students;
use App\groups;
use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $userID = \Auth::user()->id;
        $user = User::find($userID);
        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        $allStudents = Students::select('id','StudentName','StudentPoints')->where('StudentSuper', $userID)->get();
        return view('layouts.setting.index',compact('allGroups','allStudents','user'));
    }

    public function addPointsToGroup () {

        $userID = \Auth::user()->id;
        $allGroups = Groups::select('id','GroupSuper','GroupPoints')->where('GroupSuper', $userID)->get();
        $allStudents = Students::select('id','StudentPoints','StudentGroup')->where('StudentSuper', $userID)->get();

        foreach ($allStudents as $student) {
            $studGroup = $student->StudentGroup;
            $getGroup =  $allGroups->find($studGroup);
            $getGroup->GroupPoints = $getGroup->GroupPoints + $student->StudentPoints;
            $getGroup->save();
        }

        return redirect('group')->with('message', 'تم اضافة نقاط الطلاب الى المجموعات');

    }

    public function Twze3 (Request $request) {
        $userID = \Auth::user()->id;
        $request->validate([
            'points' => 'required|max:100000|numeric',
        ]);
        $points = $request->input('points');
        $groupID = $request->input('StudentGroup');
        $group = new \App\Groups;
        $getGroup = $group->find($groupID);
        $allStudents = Students::select('id','StudentPoints','StudentGroup')->where('StudentSuper', $userID)->get();

        foreach ($allStudents as $student) {

            if ($student->StudentGroup == $groupID  && $request->has('add')) {
                $student->StudentPoints =  $student->StudentPoints + $points;
                $student->save();
            }
            if ($student->StudentGroup == $groupID  && $request->has('dis')) {
                $student->StudentPoints =  $student->StudentPoints - $points;
                $student->save();
            }
            if ($groupID == 0 && $request->has('add')) {
               $student->StudentPoints =  $student->StudentPoints + $points;
               $student->save();
           }

           if ($groupID == 0 && $request->has('dis')) {
               $student->StudentPoints =  $student->StudentPoints - $points;
               $student->save();
           }
       }
       return redirect('student')->with('message', 'تم تنفيذ العملية  بنجاح'   );

   }


   public function TransPoints(Request $request) {

    $fromStudentID =  $request->input('fromStudent');
    $toStudentID =  $request->input('toStudent');
    $points =  $request->input('points');
    $allStudents = new \App\Students;

    $fromStudent = $allStudents->find($fromStudentID);
    $fromStudent->StudentPoints = $fromStudent->StudentPoints - $points;
    $fromStudent->save();

    $toStudent = $allStudents->find($toStudentID);
    $toStudent->StudentPoints = $toStudent->StudentPoints + $points;
    $toStudent->save();

    return redirect('student')->with('message', 'تم تحويل النقاط بنجاح');

   }

   public function restPoints(Request $request) {
    $userID = \Auth::user()->id;

    if ($request->has('restStudent')) {
        $allStudents = Students::select('id','StudentPoints')->where('StudentSuper', $userID)->get();
        foreach ($allStudents as  $student) {
          $student->StudentPoints = 0;
          $student->save();
      }
      return redirect('student')->with('message', 'تم تصفير نقاط جميع الطلاب بنجاح');
  }
  if ($request->has('restGroup')) {
      $allGroups = Groups::select('id','GroupSuper','GroupPoints')->where('GroupSuper', $userID)->get();
      foreach ($allGroups as  $group) {
          $group->GroupPoints = 0;
          $group->save();
      }
      return redirect('group')->with('message', 'تم تصفير نقاط جميع  المجموعات بنجاح');
  }






}

public function deleteAllStudents (Request $request) {
    $userID = \Auth::user()->id;
    $allStudents = Students::select('id','StudentPoints')->where('StudentSuper', $userID)->get();
    $allGroups = Groups::select('id','GroupSuper','GroupPoints')->where('GroupSuper', $userID)->get();
    if ($request->has('deleteStudents')) {
       foreach ($allStudents as $student) {
         $student->delete();
     }
     return redirect('student')->with('message', 'تم حذف جميع الطلاب بنجاح');

 }
 if ($request->has('deleteGroups') && $allStudents->count() > 0 ) {
        return redirect('setting')->with('ErorrMsg' , 'بعض المجموعات تحتوي طلاب قم بحذف جميع الطلاب  ثم أعد المحاولة');
 }else {
       foreach ($allGroups as $group) {
         $group->delete();
 }
  return redirect('group')->with('message', 'تم حذف جميع  المجموعات بنجاح');

}




}


}
