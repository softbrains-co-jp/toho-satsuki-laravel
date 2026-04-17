<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNecessity4 extends Model
{
    protected $table = 'm_necessity_4';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
