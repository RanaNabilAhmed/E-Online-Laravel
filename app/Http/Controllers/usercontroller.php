<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class usercontroller extends Controller
{
    
    public function index(){
        return view('backend/module/user/index');
    }
    public function alluser(){
        // $this->middleware('auth');
        $users=User::all()->where('status',1);
        return view('backend/module/user/alluser', compact('users'));
    }
    public function create(){
        

        return view('backend/module/user/adduser');
    }
    public function store(Request $request){
        $u=new User();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=Hash::make($request->password);
        $u->address=$request->address;
        $u->status= 1;
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path('/assets/images/');
        $file->move($destination, $image);
        $u->image = $image;
        $u->save();
        $role = config('roles.models.role')::where('name', '=', $request->role)->first();
        $u->attachRole($role);
        Session::flash('message','User added Successfully');
        return redirect()->back();
    }
    public function destroy($id){
        $u=User::find($id);
        $u->delete();
        return redirect()->back();
    }
    public function blockview(){
        $users=User::all()->where('status',0);
        return view('backend/module/user/blockuser', compact('users'));
    }
    public function blockuser($id){
        $u=User::find($id);
        $u->status=0;
        $u->update();
        $users=User::all()->where('status',1);
        return view('backend/module/user/alluser', compact('users'));
    }
    public function activeuser($id){
        $u=User::find($id);
        $u->status=1;
        $u->update();
        Session::flash('message','User Active Successfully');
        return redirect()->back();
    }
    public function edit($id){
        $u=User::find($id);
        return view('backend/module/user/edituser', compact('u'));
    }
    public function update(Request $request){
        $id=$request->id;
        $u=User::find($id);
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=$request->password;
        $u->address=$request->address;
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path('/assets/images/');
        $file->move($destination, $image);
        $u->image = $image;
        $u->update();
        return redirect('user/alluser');
    }

    public function authenticate(Request $request){
        
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            // Authentication passed...
            session ( [ 
                'name' => $request->get( 'username' ) 
        ] );
           
            $user = Auth::User()->name;
            return redirect('/index');
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
    Auth::logout();
    return redirect('/index');
    }
    

}
