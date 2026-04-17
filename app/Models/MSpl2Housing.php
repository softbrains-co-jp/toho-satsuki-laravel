<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSpl2Housing extends Model
{
    protected $table = 'm_spl2_housing';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
