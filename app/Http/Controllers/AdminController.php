<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidPass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminProfile()
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('back.profile.index', compact('user'));
    }

    public function editProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('back.profile.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request, FlasherInterface $flasher)
    {
        $userID = $request->user_id;
        $userToUpdate = User::findOrFail($userID);

        // update with image
        if ($request->hasFile('profile_pic'))
        {
            $image = $request->file('profile_pic');

            $imgName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            unlink($userToUpdate->profile_pic);
            $image->move('uploads/profile_pics', $imgName);
            

            $url = 'uploads/profile_pics/' . $imgName;

            $userToUpdate->update([
                'name' => $request->name,
                'username' => $request->username,
                'profile_pic' => $url
            ]);


            $flasher->addSuccess('Profile Updated Successfully');
            return redirect()->route('admin.profile');
        }
        else
        {
            $userToUpdate->update([
                'name' => $request->name,
                'username' => $request->username,
            ]);

            $flasher->addSuccess('Profile Updated Successfully');
            return redirect()->route('admin.profile');
        }

    }

    public function changePass()
    {
        $userID = Auth::user()->id;
        return view('back.profile.change_pass', compact('userID'));
    }

    public function updatePass(ValidPass $request, FlasherInterface $flasher)
    {
        $userId = $request->user_id;

        $user = User::findOrFail($userId);

        if ( Hash::check($request->password, Auth::user()->password) )
        {
            $user->update([
                'password' => Hash::make($request->new_pass)
            ]);

            $flasher->addSuccess('Password Changed Successfully');

            return redirect()->back();

        }
        else
        {
            $flasher->addError('Password don\'t match');
            return redirect()->back();
        }
    }

}
