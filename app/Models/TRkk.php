<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRkk extends Model
{
    protected $table = 't_rkk';
    protected $primaryKey = 'rkk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
