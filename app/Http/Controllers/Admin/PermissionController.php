<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:Permissions access|Permissions create|Permissions edit|Permissions delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Permissions create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Permissions edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Permissions delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if(!empty($cari)){
            $permission = Permission::where('name','like',"%".$cari."%")
                ->paginate(5);
        }else{
            $permission = Permission::paginate(5);
        }
        return view('admin.permission.index')->with([
            'permissions' => $permission,
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
        return view('admin.permission.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Permission::create(['name'=>$request->name]);
        return redirect()->route('permission.index')->with('success','Permission has been created!');

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
    public function edit(Permission $permission)
    {
        return view('admin.permission.form_ubah',['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name'=>$request->name]);
        return redirect()->route('permission.index')->with('success','Role has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->withSuccess('Permission has been deleted!');
    }
}
