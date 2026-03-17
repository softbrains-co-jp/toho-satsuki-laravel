<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNumberReturn extends Model
{
    protected $table = 'm_number_return';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
