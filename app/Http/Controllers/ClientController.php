<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmInfo;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search=$request->query('search');
        if($search){
            $search="%$search%";
            $clients = Client::where('firstname','like', $search)
            ->orWhere('lastname','like',$search)
            ->orWhere('username','like',$search)
        ->orWhere('email','like', $search)
        ->orderBy('firstname','asc')
        ->paginate(15); 
        }
        else {
            $clients = Client::orderBy('firstname','asc')->paginate(15);
        }
        
        
        return view ('clients.index',["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('clients.create'
        ,['client'=>new Client]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = $this->getValidationRules();
    //     $data = $request->validate($validator['rules'],$validator['messages'],$validator['attributes']);

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->image->store('images');
    //     }
    //     $newclient = Client::create($data); 
    //     //return $newClients;

    //     return redirect()->route('clients.index')->with('alertMessage',"Client {$data['firstname']} added successfully");
    // }




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'firstname' => 'required',
            'lastname' => 'required',
            
            'phonenumber' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:clients|email'
         ]); 
        

        $newClient=Client::create($validatedData);

        Mail::to($newClient->email)->send(new ConfirmInfo($newClient)); 

        return redirect()->route('clients.index')->with('alertMessage',"Successfull, Client {$validatedData['firstname']} created successfully");
    }
    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
       return view('clients.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([ 
            'username' => 'required|unique:clients', 
            'firstname' => 'required',
            'lastname' => 'required',
            
            'phonenumber' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:clients,email,' . $client->id . '|email',
            
            
        ]);
        

        $client->update($validatedData);
        return redirect()->route('clients.index')->with('alertMessage',"Student {$validatedData['firstname']} edited successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('alertMessage',"Student  deleted successfully");

    }

    public function search(Request $request)
{
    $search = $request->query('search');

    $clients = Client::where('firstname', 'like', "%$search%")
                    ->orWhere('lastname', 'like', "%$search%")
                    ->get();

    return $clients;
}
    
}
