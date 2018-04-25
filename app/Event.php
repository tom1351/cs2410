<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'featured', 'commencing', 'category', 'venue', 'linked_event', 'thumbnail_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
    
    public function delete()
    {
        // Delete likes associated with the event
        $this->likes()->delete();
        // Detach media items from the post
        $this->media()->detach();
        return parent::delete();
    }
    
    public function getHumanDateTime()
    {
        return ucfirst(Carbon::parse($this->commencing)->format('d/m/Y \\@ h:i A'));
    }
    
    /**
     * Returns the URI of the event thumbnail image specifically.
     */
    public function getEventThumbnailUri()
    {
        $raw_thumbnail = $this->media()->where('media_id', $this->thumbnail_id)->first();
        return $raw_thumbnail->getPublicUri();
    }
}
