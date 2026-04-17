<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNttColumnar extends Model
{
    protected $table = 'm_ntt_columnar';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
