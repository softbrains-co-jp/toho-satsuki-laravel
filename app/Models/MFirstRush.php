<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MFirstRush extends Model
{
    protected $table = 'm_first_rush';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
