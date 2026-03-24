<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOfferPropriety extends Model
{
    protected $table = 'm_offer_propriety';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
