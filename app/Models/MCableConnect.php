<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCableConnect extends Model
{
    protected $table = 'm_cable_connect';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
