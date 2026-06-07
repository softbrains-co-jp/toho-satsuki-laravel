<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TTik extends Model
{
    protected $table = 't_tik';
    protected $primaryKey = ['tik_001', 'tik_002'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'tik_003' => 'date:Y/m/d',
        'tik_008' => 'date:Y/m/d',
        'tik_009' => 'date:Y/m/d',
        'tik_010' => 'date:Y/m/d',
        'tik_011' => 'date:Y/m/d',
        'tik_012' => 'date:Y/m/d',
        'tik_013' => 'date:Y/m/d',
        'tik_020' => 'date:Y/m/d',
    ];

    protected function setKeysForSaveQuery($query)
    {
        foreach ($this->getKeyName() as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if ($keyName === null) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
