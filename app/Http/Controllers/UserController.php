<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|alpha_num',
            'confirm' => 'required|same:password',
            'phone' => 'required|max:15',
        ]);
        
        User::create([
            'role_id' => Role::where('name', 'user')->first()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
        ]);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|alpha_num',
        ]);
        
        $remember = $request->remember == 'remember' ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($remember) {
                $minutes = env('SESSION_LIFETIME');
                Cookie::queue('remember_me', $request->email, $minutes);
            }
            return redirect('/dashboard');
        }
        else if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'The provided email does not exist in our records.',
            ]);
        }
        else {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        Cookie::queue('remember_me', null, -1);
        return redirect('/');
    }
    
    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|alpha_num',
            'confirm' => 'required|same:password',
            'phone' => 'required|max:15',
        ]);
        
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->save();
    }
    
    public function deleteUser(Request $request)
    {
        User::destroy($request->input('id'));
    }
}
