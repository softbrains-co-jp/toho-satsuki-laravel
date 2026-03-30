<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSkk extends Model
{
    protected $table = 't_skk';
    protected $primaryKey = 'skk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
