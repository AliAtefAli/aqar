<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
    use SoftDeletes, Translatable;
    public $translatedAttributes = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
