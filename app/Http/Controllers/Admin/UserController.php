<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:Users access|Users create|Users edit|Users delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Users create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Users edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Users delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if(!empty($cari)){
            $datauser = User::where('name','like','&'.$cari.'&')
                ->paginate(5);
        }else{
            $datauser = User::paginate(5);
        }
        return view('admin.user.index')->with([
            'user' => $datauser,
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
        $roles = Role::get();
        return view('admin.user.form_tambah',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\RedirectResponse|string
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
           'name'=>'required',
           'email'=>'required|unique:users',
           'password'=>'required|string|min:8',
           'image'=>'image|file',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profile/image');
        }

        $user = User::create($validatedData);


//        $user = User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password)
//        ]);
//
        $user->syncRoles($request->roles);

        return redirect()->route('user.index');

//        return $request->file('image')->store('profile-image');
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
    public function edit($id)
    {
        $datauser = User::find($id);
        $datastatus = User::all();

        $role = Role::get();
        return view ('admin.user.form_ubah', ['user' => $datauser,'roles'=>$role,'status'=>$datastatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()-> route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('User Deleted');
    }
}
