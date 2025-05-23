<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'initiative_id',
        'title',
        'description',
        'certificate_file',
        'owner_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function initiative()
    {
        return $this->belongsTo(Initiative::class);
    }
}
