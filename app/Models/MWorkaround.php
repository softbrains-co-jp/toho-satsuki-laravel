<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MWorkaround extends Model
{
    protected $table = 'm_workaround';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
