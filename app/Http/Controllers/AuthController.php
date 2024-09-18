<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function getLoginPage(){
        return view('auth.login');
    }


    public function getRegisterPage()
    {
        return view('auth.register');
    }



    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role' => 'admin', 
        ]);

        return redirect()->route('auth.login')->with('status', 'Registration successful. Please log in.');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('homepage');
        }
    
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->onlyInput('auth.login');

        
    }


    public function getForgotPasswordPage() {
        return view('auth.forgetpassword');
    }
    


    
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    
    // public function requestForgotPasswordLink(Request $request)
    // {

        
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email'
    //     ]);
    
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //     ? back()->with('status', __($status))
    //     : back()->withErrors(['email' => __($status)]);
    // }


//     public function requestForgotPasswordLink(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email|exists:users,email',
//     ]);

   

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

    
//     if ($status === Password::RESET_LINK_SENT) {
     
//          return redirect('/login')->with('status', __($status));
//     } else {
        
//         return back()->withErrors(['email' => __($status)]);
//     }
// }

public function requestForgotPasswordLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
}


public function getResetPage(Request $request, $token)
{
    return view('auth.resetPassword', ['token' => $token]);
}





    public function getToken(Request $request) {

        $request->validate([
            'email'=>['required','email','max:150'],
            'password'=>'required'

        ]);
        
        $user= User::where('email',$request->email)->first();
        if (! $user||!Hash::check($request->password,$user->password)){
            throw ValidationException::withMessage([
            'email'=>['The provided  credials are incorrect.']
        ]);
        }

       

        $token = $user->createToken($request->ip())->plainTextToken;

        return[
            'message'=> 'Login successful',
            'token'=>$token,
            'user'=>$user

        ];
    }


    public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
        $user->password = Hash::make($password);
        $user->save();
    });

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('auth.login')->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
}


    public function revokeToken(Request $request) {

            

        $user->tokens()->delete();

       

        return[
            'message'=> 'Logout successful',
           
        ];
    }
}