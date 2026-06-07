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
use App\Models\VDeskDesignInfo;
use Livewire\Component;

class DeskDesignInfo extends Component
{
    public $requestNumber = null;
    public $vDeskDesignInfo = null;
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

    private const RELATIONS = [
        'mRke124',
        'mRke123',
        'mRke079',
        'mRke083',
        'mRke088',
        'mRke082',
        'mRke071',
        'mRke072',
        'mRke069',
        'mRke070',
        'mRke136',
        'mRke125',
        'mRke128',
        'mRke131',
        'mRke149',
        'mRke223',
        'mRke224',
        'mRke225',
        'mRke226',
        'mRke227',
    ];

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

        if (!$this->requestNumber) {
            $this->vDeskDesignInfo = null;
            return;
        }

        $this->vDeskDesignInfo = VDeskDesignInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.desk-design-info');
    }
}
