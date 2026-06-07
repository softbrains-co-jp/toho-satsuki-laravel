<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRemovalPattern extends Model
{
    protected $table = 'm_removal_pattern';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
