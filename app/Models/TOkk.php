<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TOkk extends Model
{
    protected $table = 't_okk';
    protected $primaryKey = ['okk_001', 'okk_002'];
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'okk_003' => 'date:Y/m/d',
        'okk_010' => 'date:Y/m/d',
        'okk_011' => 'date:Y/m/d',
        'okk_012' => 'date:Y/m/d',
        'okk_013' => 'date:Y/m/d',
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
        return $this->belongsTo(TRko::class, 'okk_001', 'rko_039')
            ->where('rko_001', $this->okk_002);
    }
}
