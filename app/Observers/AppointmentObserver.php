<?php

namespace App\Observers;
use App\Models\Appointment;
class AppointmentObserver
{
    public function creating(Appointment $appointment):void
    {
        // $lastAppointment = Appointment::latest()->first();

        // if ($lastAppointment) {
        //     $lastId = intval(substr($lastAppointment->apt_id, 3));
        //     $newId = 'TRN' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
        //     $appointment->a = $newId;
        // } else {
        //     $appointment->a = 'TRN00001';
        // }



      //  $appointment->apt_id = 'TRN#00' . str_pad(Appointment::count() + 1, 3, '0', STR_PAD_LEFT);

    }
    
}
