<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MAllocationTime extends Model
{
    protected $table = 'm_allocation_time';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
