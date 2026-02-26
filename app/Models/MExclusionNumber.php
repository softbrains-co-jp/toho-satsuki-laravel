<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MExclusionNumber extends Model
{
    protected $table = 'm_exclusion_number';
    protected $primaryKey = 'request_number';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [
    ];


    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'date_regist' => 'datetime:Y/m/d H:i;s',
        'date_update' => 'datetime:Y/m/d H:i;s',
    ];

    public function mUser()
    {
        return $this->belongsTo('App\Models\MUser', 'user_id', 'id');
    }
}
