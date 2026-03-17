<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MClaimArea extends Model
{
    protected $table = 'm_claim_area';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
