<?php

namespace App\Http\Controllers;

use App\Users;
use App\UserTemp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_priv');
        $this->middleware('auth');
    }

    function pending()
    {
        $keyword = Session::get('pendingKeyword');
        $users = UserTemp::select('*');
        if($keyword){
            $users = $users->where(function($q) use ($keyword){
                $q->where('fname','like',"%$keyword%")
                    ->orwhere('mname','like',"%$keyword%")
                    ->orwhere('lname','like',"%$keyword%")
                    ->orwhere('username','like',"%$keyword%");
            });
        }
        $users = $users->orderBy('lname','asc')->paginate(20);


        return view('users.pending',[
            'users' => $users
        ]);
    }

    function searchPending(Request $req)
    {
        Session::put('pendingKeyword',$req->keyword);
        return self::pending();
    }

    public function activate($id)
    {
        $req = UserTemp::find($id);

        $data = array(
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'lname' => strtoupper($req->lname),
            'designation' => $req->designation,
            'division' => $req->division,
            'section' => $req->section,
            'username' => $req->username,
            'password' => $req->password,
            'user_priv' => 0
        );

        if($req->user_id)
            $data['id'] = $req->user_id;

        Users::create($data);
        $req->delete();
        return redirect()->back()->with('status','activated');
    }

    function removePending($id)
    {
        UserTemp::find($id)->delete();
        return redirect()->back()->with('status','deleted');
    }
}
