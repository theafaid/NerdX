<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot(){
        parent::boot();

        static::created(function($user){
            $user->profile()->create();
            $user->update(['username' => $user->name]);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'email_verified_at', 'updated_at', 'id'
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

    /**
     * @param $value
     */
    public function setUsernameAttribute($value){

        $username = ucfirst(Str::camel($value));

        $value = static::whereUsername($username)->exists() ? "{$username}{$this->id}" : $username;

        $this->attributes['username'] = $value;
    }

    public function owns($obj){
        return $this->id == $obj->user_id;
    }
}
