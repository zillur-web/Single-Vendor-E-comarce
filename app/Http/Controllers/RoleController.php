<?php

namespace App\Http\Controllers;

use App\Mail\NewAccountCreationNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller{
    public function __construct(){
        // is admin or not
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('backend.role.index', [
            'roles' => Role::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.role.create',[
            'permissions' => Permission::all(),
        ]);

        // Permission::create(['name' => 'Coustomer']);
        // return 'OK';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(auth()->user()->can('Role Add')){
            $request->validate([
                'role_name' => ['required'],
                'permission' => ['required'],
            ]);

            if(Role::where('name', $request->role_name)->exists()){
                return redirect()->route('role.create')->with('error', 'This role already exists!');
            }
            else{
                $role = Role::create(['name' => $request->role_name]);
                $role->givePermissionTo($request->permission);

                return redirect()->route('role.index')->with('success', 'Role Added Successfull');
            }
        }
        else{
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view('backend.role.show',[
            'roles' => Role::where('id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(auth()->user()->can('Role Edit')){
            $role = Role::where('id', $id);
            if($role->exists()){
                return view('backend.role.edit',[
                    'role' => $role->first(),
                    'permissions' => Permission::all(),
                ]);
            }
            else{
                return redirect()->route('role.index')->with('error', 'This role are not exists!');
            }
        }
        else{
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if(auth()->user()->can('Role Edit')){
            $request->validate([
                'role_name' => ['required'],
                // 'permission' => ['required'],
            ]);
            $role = Role::find($id);
            $role->syncPermissions($request->permission);
            return redirect()->route('role.show',$id)->with('success', 'Role Update Successfully !');
        }
        else{
            abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(auth()->user()->can('Role Delete')){
            $role = Role::where('id', $id);
            if($role->exists()){
            $role->delete();
            return redirect()->route('role.index')->with('success', 'Role Delete Successfully !');
            }
            else{
                return redirect()->route('role.index')->with('error', 'This role are not exists!');
            }
        }
        else{
            abort('404');
        }
    }

    public function restore($id){
        //
    }

    public function force_delete($id){
        //
    }

    public function assignUser(){
        return view('backend.role.assign-user',[
            'users' => User::all(),
            'roles' => Role::all(),
        ]);
    }
    public function assignUserStore(Request $request){
        if(auth()->user()->can('Role View')){
            $request->validate([
                'user' => ['required'],
                'role' => ['required'],
            ]);

            $user = User::find($request->user);
            $user->assignRole($request->role);

            return redirect()->route('role.assign.user')->with('success', 'Role Assigned Successfull !');
        }
        else{
            abort('404');
        }
    }

    public function addAdmin(){
        return view('backend.role.add-admin',[
            'roles' => Role::all(),
        ]);
    }
    public function addAdminStore(Request $request){
        if(auth()->user()->can('Role View')){
            $user = new User;
            $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                // 'role' => ['required'],
            ]);

            $pwd = Str::random(4).'$$'.Str::random(3).'@@';
            $Email = $request->email;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($pwd);
            $user->save();
            $user->assignRole($request->role);

            Mail::to($request->email)->send(new NewAccountCreationNotification($Email, $pwd));

            return redirect()->route('role.assign.user')->with('success', 'New Admin Created Successful.');
        }
        else{
            abort('404');
        }
    }

    public function addAdminDelete($id){
        if(auth()->user()->can('Role View')){
            $user = User::findOrFail($id);
            $user->delete();
            $user->roles()->detach();

            return redirect()->route('role.assign.user')->with('success','User Delete Successfull');
        }
        else{
            abort('404');
        }
    }


}
