<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Client;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $search = "%$search%";
            $appointments = Appointment::where('time', 'like', $search)
                                        ->orWhere('date', 'like', $search)
                                        ->orWhereHas('client', function ($query) use ($search) {
                                            $query->where('firstname', 'like', $search)
                                                  ->orWhere('lastname', 'like', $search)
                                                  ->orWhere('email', 'like', $search);
                                        })
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(15);
        } else {
            $appointments = Appointment::orderBy('created_at', 'desc')->paginate(15);
        }

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $clients = Client::all();

        $timeOptions = [];

        for ($i = 9; $i <= 15; $i++) {
            $timeOptions[] = [
                'value' => str_pad($i, 2, '0', STR_PAD_LEFT) . ':00',
                'label' => str_pad($i, 2, '0', STR_PAD_LEFT) . ':00'
            ];
            $timeOptions[] = [
                'value' => str_pad($i, 2, '0', STR_PAD_LEFT) . ':30',
                'label' => str_pad($i, 2, '0', STR_PAD_LEFT) . ':30'
            ];
        }

        return view('appointments.create', compact('clients', 'timeOptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time' => 'required',
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,confirmed,completed,canceled',
        ]);

        // Create the appointment with the validated data
        Appointment::create($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $clients = Client::all();
        return view('appointments.edit', compact('appointment', 'clients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'time' => 'required',
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,confirmed,completed,canceled',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }
}
