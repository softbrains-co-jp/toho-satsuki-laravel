<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TGck extends Model
{
    protected $table = 't_gck';
    protected $primaryKey = 'gck_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
