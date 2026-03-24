<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MParentStoreCode extends Model
{
    protected $table = 'm_parent_store_code';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
