<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRkk extends Model
{
    protected $table = 't_rkk';
    protected $primaryKey = 'rkk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'rkk_005' => 'date:Y/m/d',
            'rkk_006' => 'date:Y/m/d',
            'rkk_009' => 'date:Y/m/d',
            'rkk_010' => 'date:Y/m/d',
            'rkk_030' => 'datetime:Y/m/d H:i:s',
            'rkk_031' => 'date:Y/m/d',
            'rkk_032' => 'date:Y/m/d',
            'rkk_033' => 'date:Y/m/d',
            'rkk_046' => 'datetime:Y/m/d H:i:s',
            'rkk_047' => 'datetime:Y/m/d H:i:s',
            'rkk_048' => 'datetime:Y/m/d H:i:s',
            'rkk_049' => 'date:Y/m/d',
            'rkk_050' => 'date:Y/m/d',
            'rkk_069' => 'date:Y/m/d',
            'rkk_078' => 'date:Y/m/d',
            'rkk_080' => 'date:Y/m/d',
            'rkk_081' => 'date:Y/m/d',
            'rkk_082' => 'date:Y/m/d',
            'rkk_099' => 'datetime:Y/m/d H:i:s',
            'rkk_103' => 'date:Y/m/d',
            'rkk_115' => 'integer',
            'rkk_145' => 'date:Y/m/d',
            'rkk_157' => 'date:Y/m/d',
            'rkk_159' => 'date:Y/m/d',
            'rkk_160' => 'date:Y/m/d',
            'rkk_164' => 'date:Y/m/d',
            'rkk_165' => 'date:Y/m/d',
            'rkk_166' => 'date:Y/m/d',
            'rkk_167' => 'date:Y/m/d',
            'rkk_168' => 'date:Y/m/d',
            'rkk_169' => 'date:Y/m/d',
            'rkk_170' => 'date:Y/m/d',
            'rkk_171' => 'date:Y/m/d',
            'rkk_172' => 'date:Y/m/d',
            'rkk_173' => 'date:Y/m/d',
            'rkk_174' => 'date:Y/m/d',
            'rkk_175' => 'date:Y/m/d',
            'rkk_176' => 'date:Y/m/d',
            'rkk_177' => 'date:Y/m/d',
            'rkk_178' => 'date:Y/m/d',
            'rkk_179' => 'date:Y/m/d',
            'rkk_194' => 'date:Y/m/d',
            'rkk_195' => 'date:Y/m/d',
            'rkk_201' => 'date:Y/m/d',
            'rkk_210' => 'date:Y/m/d',
            'rkk_214' => 'date:Y/m/d',
            'rkk_215' => 'date:Y/m/d',
            'rkk_222' => 'date:Y/m/d',
            'rkk_227' => 'datetime:Y/m/d H:i:s',
            'rkk_229' => 'date:Y/m/d',
    ];

}
