<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function isNormalUser()
    {
        return $this->role === 'normal_user';
    }

    public function isInitiativeOwner()
    {
        return $this->role === 'initiative_owner';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function initiativeParticipants()
{
    return $this->hasMany(InitiativeParticipant::class);
}

public function joinedInitiatives()
{
    return $this->hasManyThrough(
        Initiative::class,
        InitiativeParticipant::class,
        'user_id',       // Foreign key on InitiativeParticipant table
        'id',            // Foreign key on Initiative table
        'id',            // Local key on User table
        'initiative_id'  // Local key on InitiativeParticipant table
    );
}



    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }



    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
