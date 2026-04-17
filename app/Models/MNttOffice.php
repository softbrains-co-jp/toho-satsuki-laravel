<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNttOffice extends Model
{
    protected $table = 'm_ntt_office';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
