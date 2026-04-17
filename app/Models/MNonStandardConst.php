<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNonStandardConst extends Model
{
    protected $table = 'm_non_standard_const';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
