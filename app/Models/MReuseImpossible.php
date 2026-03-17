<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MReuseImpossible extends Model
{
    protected $table = 'm_reuse_impossible';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
