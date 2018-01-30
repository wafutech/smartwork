<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use App\Role;
use App\Permission;
use DB;

class RoleController extends Controller
{
    

    public function __construct()
    {
    	$this->middleware(['auth']);

    }

    public function index()
    {
    	$roles = Role::orderBy('display_name','asc')->paginate(10);
    	$title = 'Role Management';
    	$permission = 'sample';
    	$i=1;

    	return view('auth.roles.index',compact('roles','title','permission','i'));
    }

    public function create()
    {

        $permission = Permission::orderBy('display_name','asc')->get();
        return view('auth.roles.create',compact('permission'));

    }

    public function store(Request $request)
    {
    	 $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index',['title'=>'Manage Roles'])
                        ->with('success','Role created successfully');

    }
    public function show($id)
    {
    	
    $role = Role::findOrFail($id);
     $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();
    return view('auth.roles.show',['title'=>'User Roles','role'=>$role,'rolePermissions'=>$rolePermissions]);
    }

    public function edit($id)

    {
   $role = Role::find($id);
    $permission = Permission::orderBy('display_name','asc')->get();
    $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->pluck('permission_role.permission_id','permission_role.permission_id')->toArray();
    $title = 'Edit '.$role->display_name.' Role';

    return view('auth.roles.edit',['title'=>$title,'role'=>$role,'permission'=>$permission,'rolePermissions'=>$rolePermissions]);
    }

    public function update(Request $request, $id)

    {
    	$this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }
        
        return redirect()->route('roles.index')->with('message','Role Updated');

    }

    public function destroy($id)
    {
    	$role = Role::where('id',$id)->first();
    	$role->delete();
       // return redirect()->route('roles.index')->with('message','Role Deleted!');
    }
}
