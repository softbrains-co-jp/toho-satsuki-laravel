<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRemoval extends Model
{
    protected $table = 'm_removal';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
