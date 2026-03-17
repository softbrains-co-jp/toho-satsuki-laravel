<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOwnerAgree extends Model
{
    protected $table = 'm_owner_agree';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
