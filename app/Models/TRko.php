<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TRko extends Model
{
    protected $table = 't_rko';
    protected $primaryKey = ['rko_001', 'rko_039'];
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'rko_005' => 'date:Y/m/d',
            'rko_006' => 'date:Y/m/d',
            'rko_009' => 'date:Y/m/d',
            'rko_010' => 'date:Y/m/d',
            'rko_030' => 'datetime:Y/m/d H:i:s',
            'rko_031' => 'date:Y/m/d',
            'rko_032' => 'date:Y/m/d',
            'rko_033' => 'date:Y/m/d',
            'rko_046' => 'datetime:Y/m/d H:i:s',
            'rko_047' => 'datetime:Y/m/d H:i:s',
            'rko_048' => 'datetime:Y/m/d H:i:s',
            'rko_049' => 'date:Y/m/d',
            'rko_050' => 'date:Y/m/d',
            'rko_069' => 'date:Y/m/d',
            'rko_078' => 'date:Y/m/d',
            'rko_080' => 'date:Y/m/d',
            'rko_081' => 'date:Y/m/d',
            'rko_082' => 'date:Y/m/d',
            'rko_099' => 'datetime:Y/m/d H:i:s',
            'rko_103' => 'date:Y/m/d',
            'rko_115' => 'integer',
            'rko_121' => 'datetime:Y/m/d H:i:s',
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

    public function tTck(): HasOne
    {
        return $this->hasOne(TTck::class, 'tck_001', 'rko_039')
            ->where('tck_002', $this->rko_001);
    }
}
