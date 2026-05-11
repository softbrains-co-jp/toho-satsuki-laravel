<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TKtk extends Model
{
    protected $table = 't_ktk';
    protected $primaryKey = ['ktk_001', 'ktk_002'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'ktk_003' => 'date:Y/m/d',
        'ktk_007' => 'date:Y/m/d',
        'ktk_008' => 'date:Y/m/d',
        'ktk_009' => 'date:Y/m/d',
        'ktk_010' => 'date:Y/m/d',
        'ktk_015' => 'date:Y/m/d',
        'ktk_016' => 'date:Y/m/d',
        'ktk_020' => 'date:Y/m/d',
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

    public function tRkk(): BelongsTo
    {
        return $this->belongsTo(TRkk::class, 'ktk_001', 'rkk_039')
            ->where('rkk_001', $this->ktk_002);
    }
}
