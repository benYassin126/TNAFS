<?php

namespace App\Http\Controllers;
use App\Students;
use App\Groups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{


    public function index()
    {
        $userID = \Auth::user()->id;
        $user = User::all()->where('id', $userID)->first();
        return view('layouts.profile.index',compact('user'));
    }







//////////////////////////////////////////////////////////////////////////////////


public function edit (Request $request) {


    $UserID = \Auth::user()->id;
    $user = User::find($UserID);
    //
    $request->validate([
      'Logo'  => 'image',
      'email' => 'unique:users,email,'.$user->id
    ]);


    $form_data = array(
        'name' => $request->name,
        'email' => $request->email,
        'BackMsg' => $request->BackMsg,
        'password' => Hash::make($request->password),
        );

    if ($request->Logo != null) {
        $file = $request->Logo;
        $filename = $user->email . '.' . $file->extension();
        $filePath = public_path() . '/img/storage/logos/';
        $file->move($filePath, $filename);
        $form_data['Logo'] = $user->email;
    }

    $user->update($form_data);
    return redirect('profile')->with('message', 'تم التعديل بنجاح');
}

}
