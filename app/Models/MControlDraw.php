<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MControlDraw extends Model
{
    protected $table = 'm_control_draw';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
