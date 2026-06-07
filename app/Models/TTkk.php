<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TTkk extends Model
{
    protected $table = 't_tkk';
    protected $primaryKey = ['tkk_001', 'tkk_002'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'tkk_003' => 'date:Y/m/d',
        'tkk_008' => 'date:Y/m/d',
        'tkk_010' => 'date:Y/m/d',
        'tkk_011' => 'date:Y/m/d',
        'tkk_016' => 'date:Y/m/d',
        'tkk_018' => 'date:Y/m/d',
        'tkk_021' => 'date:Y/m/d',
        'tkk_022' => 'date:Y/m/d',
        'tkk_024' => 'date:Y/m/d',
        'tkk_027' => 'date:Y/m/d',
        'tkk_031' => 'date:Y/m/d',
        'tkk_033' => 'date:Y/m/d',
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
