<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->news_date)) {
                $news->news_date = now();
            }
        });
    }
}
