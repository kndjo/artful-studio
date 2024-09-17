<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * T
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        
        'email',
        'password',
    ];

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * \
     *
     * @return string
     */
    public function username()
    {
        return 'username'; 
    }

    /**
     
     *
     * @return bool
     */
    public function isSuperAdmin(): bool {
        return $this->role === 'super_admin';
    }
}
