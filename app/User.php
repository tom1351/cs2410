<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
    public function media()
    {
        return $this->hasMany(Media::class);
    }
    
    public function publish(Event $event) 
    {
        $this->events()->save($event);
    }
    
    public function upload(Media $media) 
    {
        $this->media()->save($media);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    /**
     * Generates the user friendly name for the account type
     *
     * @return string
     */
    public function getAccountTypeAsStr()
    {
        $account_type = $this->account_type;
        
        switch ($account_type) {
            case 0:
                return 'Standard';
                break;
            case 1:
                return 'Organiser';
                break;
        }
    }
    
    /**
     * Checks if the account has organiser status or not
     *
     * @return boolean
     */
    public function isOrganiser()
    {
        if ($this->account_type === 1) return true;
        return false;
    }
}
