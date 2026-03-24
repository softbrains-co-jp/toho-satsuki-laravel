<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MIncompatibilityCode extends Model
{
    protected $table = 'm_incompatibility_code';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
