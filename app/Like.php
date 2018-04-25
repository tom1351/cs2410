<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    public $timestamps = false;
    
    protected $fillable = [
        'event_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
