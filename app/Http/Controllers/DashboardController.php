<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the homepage with total counts.
     */
    public function index()
    {
        $totalClients = Client::count();
        $totalAppointments = Appointment::count();

        return view('homepage', compact('totalClients', 'totalAppointments'));
    }
}
