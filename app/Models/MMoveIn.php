<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMoveIn extends Model
{
    protected $table = 'm_move_in';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
