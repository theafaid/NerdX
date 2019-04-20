<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $user->profile()->create();
        });
    }

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get user profile
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(){
        return $this->hasOne('App\Profile');
    }

    /**
     * Get user channels
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channels(){
        return $this->hasMany('App\Channel');
    }

    /**
     * Create a new channel
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createChannel($data){
        return $this->channels()->create([
            'name' => $data['name'],
            'slug' => \Str::slug($data['name']),
            'description' => $data['description'],
        ]);
    }
}
