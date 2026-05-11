<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstArrangement extends Model
{
    protected $table = 'm_const_arrangement';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
