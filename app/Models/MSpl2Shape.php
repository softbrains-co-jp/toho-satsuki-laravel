<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSpl2Shape extends Model
{
    protected $table = 'm_spl2_shape';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
