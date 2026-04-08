<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MDesignPhaseNote extends Model
{
    protected $table = 'm_design_phase_note';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
