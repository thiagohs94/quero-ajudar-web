<?php

namespace App;

use App\Enums\ProfileType;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'status', 'email',
         'password', 'profile', 'date_of_birth'
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
        'date_of_birth'     => 'date'
    ];

    public function isAdmin(){
        return $this->attributes['profile'] === ProfileType::ADMIN;
    }

    public function isVolunteer(){
        return $this->attributes['profile'] === ProfileType::VOLUNTEER;
    }

    public function volunteer()
    {
        return $this->hasOne('App\Volunteer', 'user_id');
    }

    /**
     * Get the organization of the user.
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'owner');
    }

    public function getCompleteNameAttribute($value)
    {
        return sprintf("%s %s", $this->first_name, $this->last_name);
    }


    public function getDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }


}
