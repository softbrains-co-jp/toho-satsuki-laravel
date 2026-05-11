<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBasicPcOs extends Model
{
    protected $table = 'm_basic_pc_os';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
