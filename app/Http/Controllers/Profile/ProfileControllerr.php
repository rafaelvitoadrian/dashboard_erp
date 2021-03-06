<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileControllerr extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $profile = Profile::where('user_id',Auth::id())
                        ->first();

        return view('profile.index',compact('profile','user'));
    }

    public function update(Request $request)
    {
        $user_data = User::find(Auth::id())->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name.$request->last_name,
            'username' => $request->username,
            'gender' => $request->gender,
        ]);


        $employee = Profile::where('user_id',Auth::id())->update([
            'work_mobile' => $request->work_mobile,
            'work_phone'=>$request->work_phone,
            'work_email'=>$request->work_email,
            'work_location'=>$request->work_location,
            'profile_name'=>$request->profile_name,
            'address'=>$request->address,
            'address2'=>$request->address2,
            'city'=>$request->city,
            'zip'=>$request->zip,
            'state' => $request->state,
        ]);
        return redirect(route('profile'))
            ->with(['success' => 'Your profile has been successfully updated!']);
    }

    public function image(Request $request)
    {
        $validatedData = $request->validate([
            'image'=>'image|file',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile/image');
        }

        $user_data = User::find(Auth::id())->update($validatedData);

        return redirect(route('profile'))
            ->with(['success' => 'Your profile has been successfully updated!']);

    }
}
