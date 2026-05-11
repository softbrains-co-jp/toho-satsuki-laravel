<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MStopInformation extends Model
{
    protected $table = 'm_stop_information';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
