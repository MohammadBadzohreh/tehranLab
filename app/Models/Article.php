<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "journal_id", "title", "file", "summry"];

    public function journal()
    {
        return $this->belongsTo(Journal::class, "journal_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($article) {
            Storage::disk("public")->delete("articles/" . $article->file);
        });
    }
}
