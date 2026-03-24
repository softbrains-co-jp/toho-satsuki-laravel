<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNecessity3 extends Model
{
    protected $table = 'm_necessity_3';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
