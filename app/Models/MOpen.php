<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOpen extends Model
{
    protected $table = 'm_open';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
