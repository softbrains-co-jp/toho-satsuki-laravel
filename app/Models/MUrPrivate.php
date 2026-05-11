<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MUrPrivate extends Model
{
    protected $table = 'm_ur_private';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
