<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstResultReason extends Model
{
    protected $table = 'm_const_result_reason';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
