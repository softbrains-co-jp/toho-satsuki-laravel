<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TKik extends Model
{
    protected $table = 't_kik';
    protected $primaryKey = 'kik_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

   protected $casts = [
            'kik_003' => 'date:Y/m/d',
   ];
}
