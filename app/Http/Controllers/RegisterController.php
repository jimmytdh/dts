<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Division;
use App\Section;
use App\User;
use App\UserTemp;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegisterController extends Controller
{
    function register()
    {
        return view('auth.register',[
            'designation' => Designation::orderBy('description','asc')->get(),
            'division' => Division::orderBy('description','asc')->get()
        ]);
    }

    function sections($id)
    {
        $list = Section::where('division',$id)
                    ->orderBy('description','asc')
                    ->get();
        return $list;
    }

    function save(Request $req)
    {
        $data = array(
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'lname' => strtoupper($req->lname),
            'designation' => $req->designation,
            'division' => $req->division,
            'section' => $req->section,
            'username' => $req->username,
            'password' => bcrypt($req->password)
        );

        $check = User::where('username',$req->username)->first();
        $checkTemp = UserTemp::where('username',$req->username)->first();
        if($check || $checkTemp)
            return redirect('register')->with('duplicate',[
                'username' => $req->username,
                'fname' => $req->fname,
                'mname' => $req->mname,
                'lname' => $req->lname
            ]);

        UserTemp::create($data);
        return redirect('register')->with('status','saved');
    }
}
