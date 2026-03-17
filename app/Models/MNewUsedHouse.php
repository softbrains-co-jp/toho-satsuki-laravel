<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNewUsedHouse extends Model
{
    protected $table = 'm_new_used_house';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
