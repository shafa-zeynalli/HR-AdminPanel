<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:view profile');
    }

    public function index()
    {
        $user=  Auth::user();
        return view('admin.pages.profile.index',compact('user'));
    }

    public function edit()
    {
        $user=  Auth::user();
        return view('admin.pages.profile.edit',compact('user'));
    }

    public function update(Request $request )
    {
        $validationRules = [
            "first_name" => 'required',
            "last_name" => 'required',
            "position" => 'required',
            "address" => 'required',
        ];
        $request->validate($validationRules);
        $user = User::findOrFail($request->input('user_id'));

        $user->update([
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "position" => $request->input('position'),
            "address" => $request->input('address')
        ]);
        return redirect()->route('profile.index')->with('success', 'User item updated successfully');
    }

    public function showProfilePassword()
    {
        $user=  Auth::user();
//        dd($user);
        return view('admin.pages.profile.changepassword',compact('user'));
    }

    public function changeProfilePassword(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'c_password' => 'required',
            'n_password' => 'required|different:c_password',
            'a_password' => 'required|same:n_password',
            'user_id' => 'required',
        ];
        $messages = [
            'n_password.different' => 'New password must be different from current password.',
            'a_password.same' => 'The password confirmation does not match.',
        ];
        $request->validate($rules, $messages);
        $user = Auth::user();

        if ($user->id != $request->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        if (!Hash::check($request->c_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
        $user->password = Hash::make($request->n_password);
        $user->visible_password = $request->n_password;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password has been changed successfully.');
    }
}
