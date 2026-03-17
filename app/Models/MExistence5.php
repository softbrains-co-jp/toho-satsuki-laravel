<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExistence5 extends Model
{
    protected $table = 'm_existence_5';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
