<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MReasonDelay extends Model
{
    protected $table = 'm_reason_delay';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
