<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use SoftDeletes;
    protected $fillable = [];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(AdCategory::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function features()
    {
        return $this->belongsToMany(Ad::class);
    }
}
