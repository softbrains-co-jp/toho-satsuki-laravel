<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRouteChange extends Model
{
    protected $table = 'm_route_change';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
