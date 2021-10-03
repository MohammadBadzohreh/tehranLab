<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Person extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getAvatarAttribute()
    {
        return asset('storage/people/' . $this->banner);
    }
    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($person) {
            Storage::disk("public")->delete("people/" . $person->banner);
        });
    }

}
