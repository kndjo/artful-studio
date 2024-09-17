<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = user::all();
        return view('users.index',[
            'users' => $users
        ]);

    }
    




    

    
    public function create()
    {
        //
        return view('users.create',[ "user" => new User ]);
    }

    
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'fullname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            
        ]);
    
        $user = User::create([
            'fullname'=>$validatedData['fullname'],
            'lastname'=>$validatedData['lastname'],
            'username'=>$validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('users.index');
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, User $user)
    {
        //

       
        $validatedData = $request->validate([
            'fullname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);
        return redirect()->route('users.index');

        
    }

    
    public function destroy( $id)
    {
        //

        $users = User::find($id);
        if ($users) {
            $users->delete($users);
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }

 
}
