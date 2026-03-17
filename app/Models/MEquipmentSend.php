<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MEquipmentSend extends Model
{
    protected $table = 'm_equipment_send';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
