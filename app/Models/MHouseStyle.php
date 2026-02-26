<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MHouseStyle extends Model
{
    protected $table = 'm_house_style';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
