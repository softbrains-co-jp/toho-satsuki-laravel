<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstScheme extends Model
{
    protected $table = 'm_const_scheme';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
