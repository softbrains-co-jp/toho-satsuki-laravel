<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPortAllocation extends Model
{
    protected $table = 'm_port_allocation';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
