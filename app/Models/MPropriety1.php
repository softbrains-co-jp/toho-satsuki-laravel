<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPropriety1 extends Model
{
    protected $table = 'm_propriety_1';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
