<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOkNg extends Model
{
    protected $table = 'm_ok_ng';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
