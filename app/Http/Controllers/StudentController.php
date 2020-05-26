<?php

namespace App\Http\Controllers;

use App\Students;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class StudentController extends Controller
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
        $userID = \Auth::user()->id;
        $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userID)->get();
        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        return view('layouts.student.index',compact('allGroups','allStudents'));
    }

    public function sort(Request $request)
    {
        $StudentGroup = $request->input('StudentGroup');
        $userID = \Auth::user()->id;
        if ($StudentGroup == 0) {
            $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentSuper', $userID)->get();
        }else {
           $allStudents = Students::orderByDesc('StudentPoints')->select('id','StudentName', 'StudentGroup', 'StudentSuper','StudentPoints')->where('StudentGroup', $StudentGroup)->get();
       }

       $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
       $GroupTitle =  Groups::find($StudentGroup);
       return view('layouts.student.index',compact('allGroups','allStudents', 'GroupTitle'));

   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = \Auth::user()->id;
        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        return view('layouts.student.addStudents',compact('allGroups'));
    }

    public function points(Request $request)
    {
        $request->validate([
            'points' => 'required|max:100000|numeric',
        ]);
        $points = $request->input('points');
        $studentID = $request->input('id');
        $student = new \App\Students;
        $getStudent = $student->find($studentID);
        $StudentPoints = $getStudent->StudentPoints;

        if ($request->has('add')) {
            $getStudent->StudentPoints = $StudentPoints + $points;
            $getStudent->save();
            return redirect('student')->with('message', 'تم اضافة ' . $points . ' نقطة  لـ   '   . $getStudent->StudentName . ' بنجاح   '   );
        }

        if ($request->has('dis')) {
            $getStudent->StudentPoints = $StudentPoints - $points;
            $getStudent->save();
            return redirect('student')->with('message', 'تم  خصم ' . $points . ' نقطة  من   '   . $getStudent->StudentName . ' بنجاح   '   );
        }
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
            'StudentName' => 'required|max:30',
        ]);
        $userID = \Auth::user();
        $userID->students()->create($request->all());
        return redirect()->back()->with('message', 'تم اضافة ' . $request->StudentName . ' بنجاح ' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        if (Auth::id() != $student->StudentSuper) {
            return abort(401);
        }
        $userID = \Auth::user()->id;
        $allGroups = Groups::select('id','GroupName','GroupSuper')->where('GroupSuper', $userID)->get();
        $thisStudent = $student;

        return view('layouts.student.updateStudent',compact('thisStudent','allGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $request->validate([
            'StudentName' => 'required|max:30',
        ]);
        $userID = \Auth::user();

        if ($request->has('add')) {
            $newPoints = $request->input('points');
            $oldPoints = $student->StudentPoints;
            $student->StudentPoints = $oldPoints + $newPoints;
            $student->save();
            return redirect('student')->with('message', 'تم اضافة ' . $newPoints . ' نقطة  لـ   '   . $student->StudentName . ' بنجاح   '   );
        }
        if ($request->has('dis')) {
            $newPoints = $request->input('points');
            $oldPoints = $student->StudentPoints;
            $student->StudentPoints = $oldPoints - $newPoints;
            $student->save();
            return redirect('student')->with('message', 'تم  خصم ' . $newPoints . ' نقطة  من   '   . $student->StudentName . ' بنجاح   '   );
        }

        if ($request->has('update')) {

            $student->update($request->all());
            return redirect('student')->with('message', 'تم تعديل بينات ' . $student->StudentName   . ' بنجاح ');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
     if (Auth::id() != $student->StudentSuper) {
        return abort(401);
    }
    $student->delete();
    return redirect('student')->with('message', 'تم حذف الطالب ' . $student->StudentName . ' بنجاح ');
}


public function search(Request $request)
{

    $userID = \Auth::user();
    $allStudents = Students::orderByDesc('StudentPoints')->where([
        ['StudentSuper', '=', $userID->id],
        ['StudentName','LIKE','%'.$request->search."%"],
    ])->get();

    if($request->ajax())
    {
        $output="";
        $allStudents;
        if($allStudents)
        {
            foreach ($allStudents as $key => $student) {
                $output.='<tr>'.
                '<td>'.$key.'</td>'.
                '<td>'.$student->StudentName.'</td>'.
                '<td>'.$student->group->GroupName.'</td>'.
                '<td>'.$student->StudentPoints.'</td>'.
                '<td>
                <a href="student/' . $student->id .'/edit" class="btn btn-info "><i class="fas fa-edit"></i> عدل او اضف نقاط </a>'.
                '</tr>';
            }
            return Response($output);
        }
    }
}

}
