<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCancelOccur extends Model
{
    protected $table = 'm_cancel_occur';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
