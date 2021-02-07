<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['governorate_id'];
    protected $translatedAttributes = ['name'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

}
