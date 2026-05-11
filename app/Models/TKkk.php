<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TKkk extends Model
{
    protected $table = 't_kkk';
    protected $primaryKey = ['kkk_001', 'kkk_002'];
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'kkk_003' => 'date:Y/m/d',
        'kkk_004' => 'date:Y/m/d',
        'kkk_009' => 'date:Y/m/d',
        'kkk_010' => 'date:Y/m/d',
        'kkk_017' => 'date:Y/m/d',
        'kkk_018' => 'date:Y/m/d',
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
