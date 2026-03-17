<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MHouseOwnership extends Model
{
    protected $table = 'm_house_ownership';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
