<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLineSpeed extends Model
{
    protected $table = 'm_line_speed';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
