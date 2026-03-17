<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRke extends Model
{
    protected $table = 't_rke';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
