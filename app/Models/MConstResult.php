<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstResult extends Model
{
    protected $table = 'm_const_result';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
