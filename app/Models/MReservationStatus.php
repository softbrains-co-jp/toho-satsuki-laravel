<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MReservationStatus extends Model
{
    protected $table = 'm_reservation_status';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
