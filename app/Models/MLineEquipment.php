<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MLineEquipment extends Model
{
    protected $table = 'm_line_equipment';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
