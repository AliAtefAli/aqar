<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
