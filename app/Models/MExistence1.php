<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExistence1 extends Model
{
    protected $table = 'm_existence_1';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
