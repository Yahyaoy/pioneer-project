<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function participants()
    {
        return $this->hasMany(InitiativeParticipant ::class);
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
