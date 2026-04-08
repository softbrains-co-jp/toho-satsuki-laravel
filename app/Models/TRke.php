<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRke extends Model
{
    protected $table = 't_rke';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'rke_001' => 'date:Y/m/d',
            'rke_004' => 'date:Y/m/d',
            'rke_005' => 'date:Y/m/d',
            'rke_010' => 'date:Y/m/d',
            'rke_013' => 'date:Y/m/d',
            'rke_020' => 'date:Y/m/d',
            'rke_023' => 'date:Y/m/d',
            'rke_048' => 'datetime:Y/m/d H:i:s',
            'rke_049' => 'date:Y/m/d',
            'rke_050' => 'date:Y/m/d',
            'rke_051' => 'date:Y/m/d',
            'rke_062' => 'date:Y/m/d',
            'rke_065' => 'date:Y/m/d',
            'rke_066' => 'date:Y/m/d',
            'rke_067' => 'date:Y/m/d',
            'rke_076' => 'date:Y/m/d',
            'rke_077' => 'date:Y/m/d',
            'rke_078' => 'date:Y/m/d',
            'rke_096' => 'date:Y/m/d',
            'rke_101' => 'date:Y/m/d',
            'rke_102' => 'date:Y/m/d',
            'rke_103' => 'date:Y/m/d',
            'rke_105' => 'date:Y/m/d',
            'rke_106' => 'date:Y/m/d',
            'rke_107' => 'date:Y/m/d',
            'rke_108' => 'date:Y/m/d',
            'rke_109' => 'date:Y/m/d',
            'rke_112' => 'date:Y/m/d',
            'rke_115' => 'date:Y/m/d',
            'rke_122' => 'date:Y/m/d',
            'rke_126' => 'date:Y/m/d',
            'rke_127' => 'date:Y/m/d',
            'rke_129' => 'date:Y/m/d',
            'rke_130' => 'date:Y/m/d',
            'rke_132' => 'date:Y/m/d',
            'rke_133' => 'date:Y/m/d',
            'rke_138' => 'date:Y/m/d',
            'rke_139' => 'date:Y/m/d',
            'rke_150' => 'date:Y/m/d',
            'rke_151' => 'date:Y/m/d',
            'rke_157' => 'date:Y/m/d',
            'rke_158' => 'date:Y/m/d',
            'rke_159' => 'date:Y/m/d',
            'rke_160' => 'date:Y/m/d',
            'rke_161' => 'date:Y/m/d',
            'rke_162' => 'date:Y/m/d',
            'rke_166' => 'date:Y/m/d',
            'rke_167' => 'date:Y/m/d',
            'rke_168' => 'date:Y/m/d',
            'rke_169' => 'date:Y/m/d',
            'rke_190' => 'integer',
            'rke_191' => 'date:Y/m/d',
            'rke_194' => 'date:Y/m/d',
            'rke_219' => 'date:Y/m/d',
            'rke_220' => 'date:Y/m/d',
            'rke_237' => 'date:Y/m/d',
            'rke_238' => 'date:Y/m/d',
            'rke_242' => 'date:Y/m/d',
            'rke_248' => 'integer',
            'rke_254' => 'datetime:Y/m/d H:i:s',
            'rke_256' => 'date:Y/m/d',
            'rke_257' => 'date:Y/m/d',
            'rke_258' => 'date:Y/m/d',
            'rke_259' => 'date:Y/m/d',
            'rke_260' => 'date:Y/m/d',
            'rke_264' => 'date:Y/m/d',
            'rke_265' => 'date:Y/m/d',
            'rke_268' => 'date:Y/m/d',
            'rke_269' => 'date:Y/m/d',
            'rke_273' => 'date:Y/m/d',
    ];

    public function tKik()
    {
        return $this->hasOne('App\Models\TKik', 'kik_001', 'rke_019');
    }

    public function tGck()
    {
        return $this->hasOne('App\Models\TGck', 'gck_001', 'rke_019');
    }

    public function tKhj()
    {
        return $this->hasOne('App\Models\TKhj', 'khj_001', 'rke_019');
    }

    public function tSkk()
    {
        return $this->hasOne('App\Models\TSkk', 'skk_001', 'rke_019');
    }

    public function tKsk()
    {
        return $this->hasOne('App\Models\TKsk', 'ksk_001', 'rke_019');
    }

    public function mRke024()
    {
        return $this->belongsTo('App\Models\MHouseStyle', 'rke_024', 'id');
    }

    public function mRke025()
    {
        return $this->belongsTo('App\Models\MHouseOwnership', 'rke_025', 'id');
    }

    public function mRke043()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_043', 'id');
    }

    public function mRke044()
    {
        return $this->belongsTo('App\Models\MMoveIn', 'rke_044', 'id');
    }

    public function mRke052()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_052', 'id');
    }

    public function mRke053()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_053', 'id');
    }

    public function mRke054()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_054', 'id');
    }

    public function mRke055()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_055', 'id');
    }

    public function mRke056()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_056', 'id');
    }

    public function mRke057()
    {
        return $this->belongsTo('App\Models\MNumberReturn', 'rke_057', 'id');
    }

    public function mRke058()
    {
        return $this->belongsTo('App\Models\MOwnerAgree', 'rke_058', 'id');
    }

    public function mRke059()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_059', 'id');
    }

    public function mRke060()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_060', 'id');
    }

    public function mRke063()
    {
        return $this->belongsTo('App\Models\MAllocationTime', 'rke_063', 'id');
    }

    public function mRke064()
    {
        return $this->belongsTo('App\Models\MReservationStatus', 'rke_064', 'id');
    }

    public function mRke068()
    {
        return $this->belongsTo('App\Models\MParentStoreCode', 'rke_068', 'id');
    }

    public function mRke069()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_069', 'id');
    }

    public function mRke070()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_070', 'id');
    }

    public function mRke071()
    {
        return $this->belongsTo('App\Models\MLine', 'rke_071', 'id');
    }

    public function mRke072()
    {
        return $this->belongsTo('App\Models\MLineSituation', 'rke_072', 'id');
    }

    public function mRke079()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_079', 'id');
    }

    public function mRke082()
    {
        return $this->belongsTo('App\Models\MReuseImpossible', 'rke_082', 'id');
    }

    public function mRke083()
    {
        return $this->belongsTo('App\Models\MOpen', 'rke_083', 'id');
    }

    public function mRke086()
    {
        return $this->belongsTo('App\Models\MOsuPort', 'rke_086', 'id');
    }

    public function mRke087()
    {
        return $this->belongsTo('App\Models\MOsuSpeed', 'rke_087', 'id');
    }

    public function mRke088()
    {
        return $this->belongsTo('App\Models\MConstDetail', 'rke_088', 'id');
    }

    public function mRke091()
    {
        return $this->belongsTo('App\Models\MSpl2Shape', 'rke_091', 'id');
    }

    public function mRke111()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_111', 'id');
    }

    public function mRke114()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_114', 'id');
    }

    public function mRke117()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_117', 'id');
    }

    public function mRke119()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_119', 'id');
    }

    public function mRke123()
    {
        return $this->belongsTo('App\Models\MClaimArea', 'rke_123', 'id');
    }

    public function mRke124()
    {
        return $this->belongsTo('App\Models\MRoad', 'rke_124', 'id');
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

    public function mRke136()
    {
        return $this->belongsTo('App\Models\MIncompatibilityCode', 'rke_136', 'id');
    }

    public function mRke148()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_148', 'id');
    }

    public function mRke149()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_149', 'id');
    }

    public function mRke174()
    {
        return $this->belongsTo('App\Models\MLineSpeed', 'rke_174', 'id');
    }

    public function mRke188()
    {
        return $this->belongsTo('App\Models\MNewUsedHouse', 'rke_188', 'id');
    }

    public function mRke189()
    {
        return $this->belongsTo('App\Models\MSellingLots', 'rke_189', 'id');
    }

    public function mRke192()
    {
        return $this->belongsTo('App\Models\MMansion', 'rke_192', 'id');
    }

    public function mRke193()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_193', 'id');
    }

    public function mRke195()
    {
        return $this->belongsTo('App\Models\MContractant', 'rke_195', 'id');
    }

    public function mRke205()
    {
        return $this->belongsTo('App\Models\MSpecialProjects', 'rke_205', 'id');
    }

    public function mRke206()
    {
        return $this->belongsTo('App\Models\MPortAllocation', 'rke_206', 'id');
    }

    public function mRke207()
    {
        return $this->belongsTo('App\Models\MEquipmentSend', 'rke_207', 'id');
    }

    public function mRke208()
    {
        return $this->belongsTo('App\Models\MEquipmentSituation', 'rke_208', 'id');
    }

    public function mRke209()
    {
        return $this->belongsTo('App\Models\MNecessity3', 'rke_209', 'id');
    }

    public function mRke210()
    {
        return $this->belongsTo('App\Models\MExistence4', 'rke_210', 'id');
    }

    public function mRke211()
    {
        return $this->belongsTo('App\Models\MSurveyPerformed', 'rke_211', 'id');
    }

    public function mRke212()
    {
        return $this->belongsTo('App\Models\MNecessity3', 'rke_212', 'id');
    }

    public function mRke213()
    {
        return $this->belongsTo('App\Models\MInstallationPosition', 'rke_213', 'id');
    }

    public function mRke216()
    {
        return $this->belongsTo('App\Models\MPropriety2', 'rke_216', 'id');
    }

    public function mRke217()
    {
        return $this->belongsTo('App\Models\MPropriety2', 'rke_217', 'id');
    }

    public function mRke218()
    {
        return $this->belongsTo('App\Models\MExistence4', 'rke_218', 'id');
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

    public function mRke228()
    {
        return $this->belongsTo('App\Models\MRadioDisturbanceArea', 'rke_228', 'id');
    }

    public function mRke230()
    {
        return $this->belongsTo('App\Models\MDevicePosition', 'rke_230', 'id');
    }

    public function mRke231()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_231', 'id');
    }

    public function mRke232()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_232', 'id');
    }

    public function mRke233()
    {
        return $this->belongsTo('App\Models\MOrder', 'rke_233', 'id');
    }

    public function mRke234()
    {
        return $this->belongsTo('App\Models\MExistence5', 'rke_234', 'id');
    }

    public function mRke235()
    {
        return $this->belongsTo('App\Models\MExistence3', 'rke_235', 'id');
    }

    public function mRke236()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_236', 'id');
    }

    public function mRke239()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_239', 'id');
    }

    public function mRke240()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_240', 'id');
    }

    public function mRke243()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_243', 'id');
    }

    public function mRke244()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_244', 'id');
    }

    public function mRke247()
    {
        return $this->belongsTo('App\Models\MTerminal', 'rke_247', 'id');
    }

    public function mRke249()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_249', 'id');
    }

    public function mRke250()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_250', 'id');
    }

    public function mRke251()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_251', 'id');
    }

    public function mRke275()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_275', 'id');
    }


}
