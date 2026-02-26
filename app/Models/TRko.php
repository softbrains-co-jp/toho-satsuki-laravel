<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRko extends Model
{
    protected $table = 't_rko';
    protected $primaryKey = 'rko_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
