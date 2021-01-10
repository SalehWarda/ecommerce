<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSettingsController extends Controller
{

    public function profileSettings()
    {
        //
            return view('dashboard.profileSettings');
    }

    public function editAccount()
    {
        //
      $profile =  Admin::find(auth('admin')->user()->id);
            return view('dashboard.profile.editAccount',compact('profile'));
    }

    public function changePassword()
    {
        //
        $password =  Admin::find(auth('admin')->user()->id);
            return view('dashboard.profile.changePassword',compact('password'));
    }



    public function updateAccount(ProfileRequest $request)
    {
        //
        try {

            $profile =  Admin::find(auth('admin')->user()->id);

            $filePath = "";
            if ($request->has('photo')){
                $filePath = $this-> uploadImage('profile', $request->photo);
            }

            $profile->update(
                ['name'  => $request->name,
                'email' =>$request->email,
                'photo' => $filePath
                ]
            );

            return redirect()->back()->with([
                'message' => 'Updated Successfuly.',
                'alert-type' => 'success',
            ]);

        } catch (\Exception $ex) {


            return redirect()->back()->with([
                'message' => 'Something is rong, Try again.',
                'alert-type' => 'danger',
            ]);
        }
    }

    public function updatePassword(PasswordRequest $request)
    {
        //
        try {

            $password =  Admin::find(auth('admin')->user()->id);



            if(strcmp($request->current_password,$request->new_password )==0){
                return redirect()->back()->with([
                    'message' => 'Your current password cannot be same with new password.',
                    'alert-type' => 'danger',
                ]);
            }


            if(Hash::check($request->current_password, $password->password)){

                unset($request['id']);
                unset($request['password_confirmation']);
                unset($request['current_password']);

                if($request->filled('new_password')){

                    $request->merge(['new_password' => bcrypt($request->new_password)]);
                    }


                $password->update($request->only('password') );




            return redirect()->back()->with([
                'message' => 'Updated Successfuly.',
                'alert-type' => 'success',
            ]);

            }else{

                return redirect()->back()->with([
                    'message' => 'Current Password is rong, Try again.',
                    'alert-type' => 'danger',
                ]);
            }


        } catch (\Exception $ex) {


            return redirect()->back()->with([
                'message' => 'Something is rong, Try again.',
                'alert-type' => 'danger',
            ]);
        }
    }

    protected function uploadImage($folder, $image)
    {
        $image->store('/',$folder);
        $filename = $image->hashName();
        $path = '/assets/admin/images/'. $folder . '/' . $filename;
        return $path;
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
