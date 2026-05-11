<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOneContractTwoPhone extends Model
{
    protected $table = 'm_1contract_2phone';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
