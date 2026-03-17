<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTerminal extends Model
{
    protected $table = 'm_terminal';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
