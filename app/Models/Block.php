<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['city_id'];
    public $translatedAttributes = ['name'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
