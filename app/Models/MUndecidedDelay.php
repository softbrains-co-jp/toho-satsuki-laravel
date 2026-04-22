<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MUndecidedDelay extends Model
{
    protected $table = 'm_undecided_delay';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
