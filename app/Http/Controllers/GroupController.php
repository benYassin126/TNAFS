<?php

namespace App\Http\Controllers;
use App\Students;
use App\groups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $Students = Students::all();
        $userID = \Auth::user()->id;
        $user = User::find($userID);
        $allGroups = Groups::orderByDesc('GroupPoints')->select('id','GroupName','GroupSuper','GroupPoints')->where('GroupSuper', $userID)->get();
        return view('layouts.group.index',compact('allGroups','Students','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.group.addGroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'GroupName' => 'required|max:30',
        ]);
        $userID = \Auth::user();
        $userID->groups()->create($request->all());
        return redirect('group')->with('message', 'تمت اضافة مجموعة ' . $request->GroupName . ' بنجاح ' );

    }



    public function points(Request $request)
    {

        $request->validate([
            'points' => 'required|max:100000|numeric',
        ]);
        $points = $request->input('points');
        $groupID = $request->input('id');
        $group = new \App\Groups;
        $getGroup = $group->find($groupID);

        if ($request->has('add')) {

            $getGroup->GroupPoints = $getGroup->GroupPoints + $points;
            $getGroup->save();
            return redirect('group')->with('message', 'تم اضافة ' . $points . ' نقطة  لـ   '   . $getGroup->GroupName . ' بنجاح   '   );
        }

        if ($request->has('dis')) {
            $getGroup->GroupPoints = $getGroup->GroupPoints - $points;
            $getGroup->save();
            return redirect('group')->with('message', 'تم  خصم ' . $points . ' نقطة  من   '   . $getGroup->GroupName . ' بنجاح   '   );
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(groups $group)
    {
        if (Auth::id() != $group->GroupSuper) {
            return abort(401);
        }
        $userID = \Auth::user()->id;

        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        $thisGroup = $group;

        return view('layouts.group.updateGroup',compact('thisGroup','allGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, groups $group)
    {
        $request->validate([
            'GroupName' => 'required|max:30',
        ]);

        $group->update($request->all());

        return redirect('group')->with('message', 'تم تعديل بينات ' . $group->GroupName   . ' بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(groups $group)
    {

       if (Auth::id() != $group->GroupSuper) {
        return abort(401);
    }

    $Students = Students::all()->where('StudentGroup', $group->id)->count();

    if ($Students > 0) {

        return redirect('group')->with('ErorrMsg', 'لا يمكنك حذف مجموعة تحتوي على طلاب !  قم بنقل او حذف طلاب المجموعة ثم اعد المحاولة');

    }else{
      $group->delete();
      return redirect('group')->with('message', 'تم حذف المجموعة ' . $group->GroupName . ' بنجاح ');
  }


}
}
