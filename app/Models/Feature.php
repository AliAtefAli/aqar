<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = ['price'];
    public $translatedAttributes = ['name', 'description'];

    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }

}
