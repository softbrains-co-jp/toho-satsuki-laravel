<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MWorkContent extends Model
{
    protected $table = 'm_work_content';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
