<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('isadmin');
    }

    public function getUsers($status){
        if($status == 'all'):
            $users = User::orderBy('id', 'Desc')->paginate(30);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(30);
        endif;
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUserEdit($id){
        $u = User::findOrfail($id);
        $data = ['u' => $u];
        return view('admin.users.user_edit', $data);
    }

    public function getUserBanned($id){
        $u = User::findOrfail($id);
        if($u->status == "100"):
            $u->status = "1";
            $msg = "Usuario Reactivado";
        else:
            $u->status = "100";
            $msg = "Usuario suspendido con Exito";
        endif;

        if($u->save()):
            return back()->with('message', $msg)->with('typealert', 'success');
        endif;
    }
}
