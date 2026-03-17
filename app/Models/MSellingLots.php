<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSellingLots extends Model
{
    protected $table = 'm_selling_lots';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
