<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLine extends Model
{
    protected $table = 'm_line';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
