<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstDetail extends Model
{
    protected $table = 'm_const_detail';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
