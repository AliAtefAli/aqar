<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdCategory extends Model
{
    use Translatable, SoftDeletes;
    public $translatedAttributes = ['name'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
