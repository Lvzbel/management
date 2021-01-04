<?php

namespace App\Models;


use App\Models\Schedule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function availability()
    {
        return $this->hasOne(Availability::class);
    }

    public function has_position()
    {
        return $this->positions()->count();
    }

    public function get_position()
    {
        if ($this->has_position()) {
            $position = $this->positions()->first();
        } else {
            $position = (object) array('id' => 0, 'name' => 'none');
        }

        return $position;
    }
}
