<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;

class UserController extends Controller
{
    
    public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('username', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    $users = $query->get();

    return view('users.index', [
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

    
    public function show(User $user)
    {
        //
        return view('users.show',['user'=>$user]);
    }

   
    public function edit(User $user)
    {
        //
        return view('users.edit',['user'=>$user]);
        
    }

   
   
public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|unique:users,username,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,super_admin',
        'password' => 'nullable|confirmed',
    ]);

    $user->firstname = $validatedData['firstname'];
    $user->lastname = $validatedData['lastname'];
    $user->username = $validatedData['username'];
    $user->email = $validatedData['email'];
    $user->role = $validatedData['role'];

    if ($request->filled('password')) {
        $user->password = bcrypt($validatedData['password']);
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully');
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
