<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MClaimJudge extends Model
{
    protected $table = 'm_claim_judge';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
