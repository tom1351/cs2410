<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    protected $fillable = [
        'file'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function media()
    {
        return $this->belongsToMany(Event::class);
    }
    
    /**
     * Returns the URI of the media object, so that
     * it can be fetched using the URI
     */
    public function getPublicUri() {
        
        $fileName = $this->file;
        $path = '/media/' . $fileName;
        
        return $path;
    }
}
