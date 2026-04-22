<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstDelayCode extends Model
{
    protected $table = 'm_const_delay_code';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
