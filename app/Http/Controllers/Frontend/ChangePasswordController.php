<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {

        return view('frontend.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user =  Auth::user();
        $id = $user->id;

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $password = Hash::make($request->password);

        $data = DB::table('users')
        ->where('id', $id)
        ->update([
            'password'=>$password,
            'updated_at' => now(),
        ]);

        return redirect()->route('beranda')->with('success', 'Password successfully changed!');
    }
}
