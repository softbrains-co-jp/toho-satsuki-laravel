<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCodeLength1 extends Model
{
    protected $table = 'm_code_length_1';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
