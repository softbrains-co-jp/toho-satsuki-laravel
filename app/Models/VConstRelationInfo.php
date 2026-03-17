<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VConstRelationInfo extends Model
{
    protected $table = 'v_const_relation_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
