<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'image_path',
        'name',
        'email',
        'password',
        'dateofbirth',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'dateofbirth' => 'date',
        'email_verified_at' => 'datetime',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function joinedEvents()
    {
        return $this->belongsToMany(Event::class, 'participants')->withTimestamps();
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
