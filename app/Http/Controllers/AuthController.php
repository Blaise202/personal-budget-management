<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function signup(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users|max:255',
      'password' => 'required|string',
    ]);


    if ($validator->fails()) {
      return back()->withInput()->with(['fill_in_all' => $validator->errors()]);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);

    Auth::login($user);
    return redirect()->route('home');
  }


  public function postLogin(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      return redirect()->route('home');
    }
    return redirect()->back();
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}