<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSpl2Change extends Model
{
    protected $table = 'm_spl2_change';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
