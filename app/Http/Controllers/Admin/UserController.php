<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            $datauser = User::where('name','like',"%".$cari."%")
                ->paginate(5);
//            dd($datauser);
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

        $validatedData['password']= Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $user_data= User::where('email',$user['email'])->first();
        $profile=Profile::create([
            'user_id'=>$user_data->id,
            'profile_name'=>$user['name'],
        ]);

        $user->syncRoles($request->roles);

        $request->session()->flash('success','Registration User successfull!!');

        return redirect()->route('user.index');

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

        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'image'=>'image|file',
            'roles' => 'required',
            'status'=>'required',
            'gender'=>'required'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile/image');
        }

        $user = User::find($id);
        $user->update($validatedData);

        $user->status = $request->status;
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()-> route('user.index')->with('success','User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->image){
            Storage::delete($user->image);
        }

        $profile = Profile::where('user_id',$id)->first()->delete();
        $user->delete();
        return redirect()->back()->withSuccess('User Deleted');
    }
}
