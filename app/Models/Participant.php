<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'event_id',
    ];

    // A participant belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A participant belongs to an event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
