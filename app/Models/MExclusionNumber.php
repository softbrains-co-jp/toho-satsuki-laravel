<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExclusionNumber extends Model
{
    protected $table = 'm_exclusion_number';
    protected $primaryKey = 'request_number';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    public function mUser()
    {
        return $this->belongsTo('App\Models\MUser', 'id', 'user_id');
    }
}
