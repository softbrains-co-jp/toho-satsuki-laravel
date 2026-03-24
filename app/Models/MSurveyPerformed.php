<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MSurveyPerformed extends Model
{
    protected $table = 'm_survey_performed';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
