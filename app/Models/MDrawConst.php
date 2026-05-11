<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDrawConst extends Model
{
    protected $table = 'm_draw_const';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
