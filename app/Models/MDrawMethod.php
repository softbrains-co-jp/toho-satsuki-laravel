<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDrawMethod extends Model
{
    protected $table = 'm_draw_method';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
