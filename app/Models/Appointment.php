<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\AppointmentObserver;
use App\Models\Client;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [ 
    'time', 
    'date', 
    'client_id',
     'status'];

     
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
