<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExistence2 extends Model
{
    protected $table = 'm_existence_2';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
