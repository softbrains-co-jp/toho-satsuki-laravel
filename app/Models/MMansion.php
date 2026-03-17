<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMansion extends Model
{
    protected $table = 'm_mansion';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
