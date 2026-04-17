<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MService extends Model
{
    protected $table = 'm_service';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
