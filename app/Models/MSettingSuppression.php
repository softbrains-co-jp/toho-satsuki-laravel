<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSettingSuppression extends Model
{
    protected $table = 'm_setting_suppression';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
