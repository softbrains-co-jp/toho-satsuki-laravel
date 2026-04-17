<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExclusiveUse extends Model
{
    protected $table = 'm_exclusive_use';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
