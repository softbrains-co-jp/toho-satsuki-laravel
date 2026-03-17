<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MEquipmentSituation extends Model
{
    protected $table = 'm_equipment_situation';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
