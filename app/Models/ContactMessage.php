<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'full_name', 'phone', 'subject', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
