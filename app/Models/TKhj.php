<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TKhj extends Model
{
    protected $table = 't_khj';
    protected $primaryKey = 'khj_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
