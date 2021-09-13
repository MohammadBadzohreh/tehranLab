<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Journal extends Model
{
    use HasFactory;

    protected $table = "journals";
    protected $fillable = ["user_id", "name", "banner"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function getAvatarAttribute()
    {
        return asset('storage/journals/' . $this->banner);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($journal) {
            Storage::disk("public")->delete("journals/" . $journal->banner);
        });
    }
}
