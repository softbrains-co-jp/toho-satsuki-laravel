<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MAreaSearch extends Model
{
    protected $table = 'm_area_search';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
