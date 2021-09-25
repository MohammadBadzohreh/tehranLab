<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $table = "newses";

    protected $fillable = ["user_id", "title", "banner", "body"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function getAvatarAttribute()
    {
        return asset('storage/newsesBanner/' . $this->banner);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($news) {
            Storage::disk("public")->delete("newsesBanner/" . $news->banner);
        });
    }
}
