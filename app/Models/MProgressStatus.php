<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MProgressStatus extends Model
{
    protected $table = 'm_progress_status';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
