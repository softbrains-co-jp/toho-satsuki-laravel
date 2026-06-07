<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLineSurveyInfo extends Model
{
    protected $table = 'v_line_survey_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'gck_002' => 'date:Y/m/d',
        'rke_077' => 'date:Y/m/d',
        'rke_078' => 'date:Y/m/d',
        'gck_009' => 'date:Y/m/d',
        'gck_025' => 'date:Y/m/d',
        'rke_101' => 'date:Y/m/d',
        'rke_102' => 'date:Y/m/d',
        'rke_108' => 'date:Y/m/d',
        'rke_268' => 'date:Y/m/d',
        'rke_269' => 'date:Y/m/d',
        'rke_273' => 'date:Y/m/d',
        'rke_105' => 'date:Y/m/d',
        'rke_106' => 'date:Y/m/d',
        'gck_006' => 'date:Y/m/d',
        'rke_107' => 'date:Y/m/d',
        'rke_109' => 'date:Y/m/d',
        'khj_004' => 'date:Y/m/d',
        'rke_126' => 'date:Y/m/d',
        'rke_127' => 'date:Y/m/d',
        'rke_129' => 'date:Y/m/d',
        'rke_130' => 'date:Y/m/d',
        'rke_132' => 'date:Y/m/d',
        'rke_133' => 'date:Y/m/d',
        'rke_112' => 'date:Y/m/d',
        'rke_115' => 'date:Y/m/d',
        'rke_157' => 'date:Y/m/d',
        'gck_063' => 'date:Y/m/d',
        'rke_150' => 'date:Y/m/d',
        'rke_151' => 'date:Y/m/d',
        'rke_138' => 'date:Y/m/d',
        'rke_139' => 'date:Y/m/d',
        'gck_043' => 'date:Y/m/d',
        'gck_031' => 'date:Y/m/d',
        'gck_057' => 'date:Y/m/d',
        'gck_061' => 'date:Y/m/d',
    ];

    public function mGck003()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gck_003', 'id');
    }

    public function mRke124()
    {
        return $this->belongsTo('App\Models\MRoad', 'rke_124', 'id');
    }

    public function mKhj006()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_006', 'id');
    }

    public function mKhj007()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_007', 'id');
    }

    public function mKhj024()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_024', 'id');
    }

    public function mRke123()
    {
        return $this->belongsTo('App\Models\MClaimArea', 'rke_123', 'id');
    }

    public function mKhj009()
    {
        return $this->belongsTo('App\Models\MClaimJudge', 'khj_009', 'id');
    }

    public function mKhj008()
    {
        return $this->belongsTo('App\Models\MNttColumnar', 'khj_008', 'id');
    }

    public function mGck026()
    {
        return $this->belongsTo('App\Models\MService', 'gck_026', 'id');
    }

    public function mGck011()
    {
        return $this->belongsTo('App\Models\MControlDraw', 'gck_011', 'id');
    }

    public function mGck027()
    {
        return $this->belongsTo('App\Models\MSpl2Change', 'gck_027', 'id');
    }

    public function mGck028()
    {
        return $this->belongsTo('App\Models\MSpl2Housing', 'gck_028', 'id');
    }

    public function mRke088()
    {
        return $this->belongsTo('App\Models\MConstDetail', 'rke_088', 'id');
    }

    public function mRke083()
    {
        return $this->belongsTo('App\Models\MOpen', 'rke_083', 'id');
    }

    public function mRke079()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_079', 'id');
    }

    public function mRke134()
    {
        return $this->belongsTo('App\Models\MPropriety1', 'rke_134', 'id');
    }

    public function mRke135()
    {
        return $this->belongsTo('App\Models\MReuseImpossible', 'rke_135', 'id');
    }

    public function mGck005()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_005', 'id');
    }

    public function mRke125()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_125', 'id');
    }

    public function mRke128()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_128', 'id');
    }

    public function mRke131()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_131', 'id');
    }

    public function mGck012()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_012', 'id');
    }

    public function mRke119()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_119', 'id');
    }

    public function mRke140()
    {
        return $this->belongsTo('App\Models\MExclusiveUse', 'rke_140', 'id');
    }

    public function mRke143()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_143', 'id');
    }

    public function mRke145()
    {
        return $this->belongsTo('App\Models\MWorkaround', 'rke_145', 'id');
    }

    public function mRke146()
    {
        return $this->belongsTo('App\Models\MPropriety1', 'rke_146', 'id');
    }

    public function mRke117()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_117', 'id');
    }

    public function mRke111()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_111', 'id');
    }

    public function mRke114()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_114', 'id');
    }

    public function mGck007()
    {
        return $this->belongsTo('App\Models\MOkNg', 'gck_007', 'id');
    }

    public function mRke223()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_223', 'id');
    }

    public function mRke224()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_224', 'id');
    }

    public function mRke225()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_225', 'id');
    }

    public function mRke226()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_226', 'id');
    }

    public function mRke227()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_227', 'id');
    }

    public function mGck010()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_010', 'id');
    }

    public function mGck059()
    {
        return $this->belongsTo('App\Models\MLineEquipment', 'gck_059', 'id');
    }

    public function mRke147()
    {
        return $this->belongsTo('App\Models\MAreaSearch', 'rke_147', 'id');
    }

    public function mGck064()
    {
        return $this->belongsTo('App\Models\MSettingSuppression', 'gck_064', 'id');
    }

    public function mRke148()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_148', 'id');
    }

    public function mRke149()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_149', 'id');
    }

    public function mRke136()
    {
        return $this->belongsTo('App\Models\MIncompatibilityCode', 'rke_136', 'id');
    }

    public function mGck013()
    {
        return $this->belongsTo('App\Models\MToute', 'gck_013', 'id');
    }

    public function mGck044()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gck_044', 'id');
    }

    public function mGck047()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_047', 'id');
    }

    public function mGck046()
    {
        return $this->belongsTo('App\Models\MNttOffice', 'gck_046', 'id');
    }

    public function mGck042()
    {
        return $this->belongsTo('App\Models\MNttColumnar', 'gck_042', 'id');
    }

    public function mGck029()
    {
        return $this->belongsTo('App\Models\MExistence1', 'gck_029', 'id');
    }

    public function mGck030()
    {
        return $this->belongsTo('App\Models\MExistence1', 'gck_030', 'id');
    }

    public function mGck049()
    {
        return $this->belongsTo('App\Models\MOkNg', 'gck_049', 'id');
    }

    public function mGck050()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_050', 'id');
    }

    public function mGck039()
    {
        return $this->belongsTo('App\Models\MIncompatibilityCode', 'gck_039', 'id');
    }
}
