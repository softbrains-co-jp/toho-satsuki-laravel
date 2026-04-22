<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstStatus extends Model
{
    protected $table = 'm_const_status';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
