<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDevicePosition extends Model
{
    protected $table = 'm_device_position';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
