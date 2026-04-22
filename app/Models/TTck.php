<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TTck extends Model
{
    protected $table = 't_tck';
    protected $primaryKey = ['tck_001', 'tck_002'];
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'tck_003' => 'date:Y/m/d',
            'tck_008' => 'date:Y/m/d',
            'tck_009' => 'date:Y/m/d',
            'tck_010' => 'date:Y/m/d',
            'tck_011' => 'date:Y/m/d',
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

    public function tRko(): BelongsTo
    {
        return $this->belongsTo(TRko::class, 'tck_001', 'rko_039')
            ->where('rko_001', $this->tck_002);
    }
}
