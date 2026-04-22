<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstPhaseNote extends Model
{
    protected $table = 'm_const_phase_note';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
