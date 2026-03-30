<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TKsk extends Model
{
    protected $table = 't_ksk';
    protected $primaryKey = 'ksk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
