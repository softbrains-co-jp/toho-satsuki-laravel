<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOsuPort extends Model
{
    protected $table = 'm_osu_port';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
