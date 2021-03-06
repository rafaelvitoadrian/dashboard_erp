<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:Roles access|Roles create|Roles edit|Roles delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Roles create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Roles edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Roles delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if(!empty($cari)){
            $role = Role::where('name','like',"%".$cari."%")
                ->paginate(5);
        }else{
            $role = Role::paginate(5);
        }
        return view('admin.role.index')->with([
            'roles' => $role,
            'cari' => $cari,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.form_tambah',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);

        $role = Role::create(['name'=>$request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index')->with('success','Role has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission = Permission::get();
        $role->permissions;
        return view('admin.role.form_ubah',['role'=>$role,'permissions' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index')->with('success','Role has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role has been deleted');
    }
}
