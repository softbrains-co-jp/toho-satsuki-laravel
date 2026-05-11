<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MWlanSetupHope extends Model
{
    protected $table = 'm_wlan_setup_hope';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
