<?php

namespace App\Livewire\Main;

use App\Models\MClaimArea;
use App\Models\MConstDetail;
use App\Models\MDesignPhaseNote;
use App\Models\MExistence1;
use App\Models\MIncompatibilityCode;
use App\Models\MLineSituation;
use App\Models\MOpen;
use App\Models\MReuseImpossible;
use App\Models\MRoad;
use App\Models\MSurveyProcessCode;
use Livewire\Component;

class LineSurveyInfo extends Component
{
    public $kNo = null;
    public $tRke = null;
    public $mCostDetailOptions = [];
    public $mClaimAreaOptions = [];
    public $mExistence1Options = [];
    public $mIncompatibilityCodeOptions = [];
    public $mLineSituationOptions = [];
    public $mOpenOptions = [];
    public $mReuseImpossibleOptions = [];
    public $mRoadOptions = [];
    public $mSurveyProcessCodeOptions = [];
    public $mDesignPhaseNoteOptions = [];

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

        $this->mLineSituationOptions = MLineSituation::query()
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
    }

    public function render()
    {
        return view('livewire.main.line-survey-info');
    }
}
