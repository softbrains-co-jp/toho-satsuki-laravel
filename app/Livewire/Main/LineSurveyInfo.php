<?php

namespace App\Livewire\Main;

use App\Models\MAreaSearch;
use App\Models\MClaimArea;
use App\Models\MClaimJudge;
use App\Models\MConstDetail;
use App\Models\MControlDraw;
use App\Models\MDesignPhaseNote;
use App\Models\MExclusiveUse;
use App\Models\MExistence1;
use App\Models\MIncompatibilityCode;
use App\Models\MLineEquipment;
use App\Models\MMerchant;
use App\Models\MNecessity4;
use App\Models\MNttColumnar;
use App\Models\MNttOffice;
use App\Models\MOfferPropriety;
use App\Models\MOkNg;
use App\Models\MOpen;
use App\Models\MPropriety1;
use App\Models\MReuseImpossible;
use App\Models\MRoad;
use App\Models\MService;
use App\Models\MSettingSuppression;
use App\Models\MSpl2Change;
use App\Models\MSpl2Housing;
use App\Models\MSurveyProcessCode;
use App\Models\MToute;
use App\Models\MWorkaround;
use Livewire\Component;

class LineSurveyInfo extends Component
{
    public $kNo = null;
    public $tRke = null;
    public $mCostDetailOptions = [];
    public $mClaimAreaOptions = [];
    public $mExistence1Options = [];
    public $mIncompatibilityCodeOptions = [];
    public $mOpenOptions = [];
    public $mReuseImpossibleOptions = [];
    public $mRoadOptions = [];
    public $mSurveyProcessCodeOptions = [];
    public $mDesignPhaseNoteOptions = [];
    public $mMerchantOptions = [];
    public $mClaimJudgeOptions = [];
    public $mNttColumnarOptions = [];
    public $mServiceOptions = [];
    public $mControlDrawOptions = [];
    public $mSpl2ChangeOptions = [];
    public $mSpl2HousingOptions = [];
    public $mPropriety1Options = [];
    public $mNecessity4Options = [];
    public $mExclusiveUseOptions = [];
    public $mWorkaroundOptions = [];
    public $mLineEquipmentOptions = [];
    public $mAreaSearchOptions = [];
    public $mSettingSuppressionOptions = [];
    public $mOkNgOptions = [];
    public $mTouteOptions = [];
    public $mNttOfficeOptions = [];
    public $mOfferProprietyOptions = [];

    public function mount(): void
    {
        $this->mClaimAreaOptions = MClaimArea::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mCostDetailOptions = MConstDetail::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence1Options = MExistence1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mIncompatibilityCodeOptions = MIncompatibilityCode::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOpenOptions = MOpen::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mReuseImpossibleOptions = MReuseImpossible::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mRoadOptions = MRoad::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mSurveyProcessCodeOptions = MSurveyProcessCode::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mDesignPhaseNoteOptions = MDesignPhaseNote::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mMerchantOptions = MMerchant::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mClaimJudgeOptions = MClaimJudge::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mNttColumnarOptions = MNttColumnar::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mServiceOptions = MService::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mControlDrawOptions = MControlDraw::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mSpl2ChangeOptions = MSpl2Change::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mSpl2HousingOptions = MSpl2Housing::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mPropriety1Options = MPropriety1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mNecessity4Options = MNecessity4::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExclusiveUseOptions = MExclusiveUse::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mWorkaroundOptions = MWorkaround::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mLineEquipmentOptions = MLineEquipment::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mAreaSearchOptions = MAreaSearch::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mSettingSuppressionOptions = MSettingSuppression::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOkNgOptions = MOkNg::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mTouteOptions = MToute::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mNttOfficeOptions = MNttOffice::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOfferProprietyOptions = MOfferPropriety::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.main.line-survey-info');
    }
}
