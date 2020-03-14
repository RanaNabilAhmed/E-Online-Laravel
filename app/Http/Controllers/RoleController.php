<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jeremykenedy\LaravelRoles\Models\Permission;
use Jeremykenedy\LaravelRoles\Models\Role;
use App\Role as _Roles;
use App\Permission as _Permission;
use App\Permission_role as _Permission_role;
use DB;


class RoleController extends Controller
{


	public function add_role(){
		$data = DB::table('permissions')->select()->get();
		return view('backend/module/role/add_form',compact('data'));
	}

	public function role_list(){
		$data = DB::table('roles')->select()->get();
	   	return view('backend/module/role/list',compact('data'));
	}

	public function store_role(Request $request){

		$moderatorRole = config('roles.models.role')::create([
		'name' => $request->name,
		'slug' => $request->slug,
		'description' => $request->description,
		'level' => $request->level,
		   ]);


		$tmp = DB::table('roles')->latest()->first();
		$role = config('roles.models.role')::find($tmp->id);
		
		$per = $request->input('permissions');

		$role->attachPermission($per);

		return redirect()->back();
   }

   public function role_edit($id){
	$per = DB::table('permissions')->select()->get();
	$data = DB::table('permission_role')->where('role_id','=',$id)->get();
	$role = $id;

	return view('backend/module/role/edit_form',compact('per','data','role'));

}

	public function attach_role($id){

	   $user = config('roles.models.defaultUser')::find($id);
	   $role = config('roles.models.role')::where('name', '=', 'User')->first();
	   $user->attachRole($role);
 
	}

	


	

	public function role_per_edit(Request $request){
		echo 'role is :'.$request->id;
		
		$role =  config('roles.models.role')::find($request->id);
		$role_delete = _Permission_role::where('role_id',$request->id)->delete();
		$permissions = $request->input('permission');
		$role->attachPermission($permissions);
		return redirect()->back();

	}


	public function role_delete($id){
      $data = DB::table('roles')->select()->where('id','=',$id)->get();
      $data = _Roles::find($id);
      $data->delete();
      echo "data deleted";
      die;
	  return redirect()->back();
   }


	public function check_role($id){
   		$user = User::find($id);
   	
   		if($user->hasRole('user'))
   		{
      		echo "user has role of user";
   		}
   	
   		else
   		{
      		echo "user has no role of user";
   		}
	} 


	public function permissions_list(){
		$data = DB::table('permissions')->select()->get();
	   	return view('backend/module/permission/role_list',compact('data'));
	}  


	public function per_delete($id){
		$per = _Permission::find($id);
		$per->delete();
		return redirect()->back();
	}

	public function permission_add(){
		return view('backend/module/permission/add_form');
	}


	public function permission_store(Request $request){
		$createUsersPermission = config('roles.models.permission')::create([
		'name' => $request->name,
		'slug' => $request->slug,
		'description' => $request->description, // optional
		]);

			return redirect()->back();

	}


}
