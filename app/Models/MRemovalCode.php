<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRemovalCode extends Model
{
    protected $table = 'm_removal_code';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
