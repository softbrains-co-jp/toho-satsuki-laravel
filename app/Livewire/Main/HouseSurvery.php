<?php

namespace App\Livewire\Main;

use App\Models\MAllocationTime;
use App\Models\MConstCompletion;
use App\Models\MConstDelayCode;
use App\Models\MConstHope;
use App\Models\MConstPhaseNote;
use App\Models\MConstStartTime;
use App\Models\MConstStatus;
use App\Models\MCustomer;
use App\Models\MExistence1;
use App\Models\MExistence2;
use App\Models\MHouseOwnership;
use App\Models\MHouseStyle;
use App\Models\MMerchant;
use App\Models\MUndecidedDelay;
use App\Models\VHouseSurvey;
use Livewire\Component;

class HouseSurvery extends Component
{
    public $requestNumber = null;
    public $houseSurveyList = [];
    public $mConstHopeOptions = [];
    public $mHouseStyleOptions = [];
    public $mHouseOwnershipOptions = [];
    public $mCustomerOptions = [];
    public $mExistence1Options = [];
    public $mConstStatusOptions = [];
    public $mUndecidedDelayOptions = [];
    public $mConstPhaseNoteOptions = [];
    public $mMerchantOptions = [];
    public $mAllocationTimeOptions = [];
    public $mExistence2Options = [];
    public $mConstStartTimeOptions = [];
    public $mConstCompletionOptions = [];
    public $mConstDelayCodeOptions = [];

    private const RELATIONS = [
        'mRko104',
        'mRko020',
        'mRko021',
        'mRko083',
        'mRko090',
        'mRko029',
        'mRko052',
        'mRko072',
        'mRko073',
        'mRko074',
        'mRko075',
        'mRko076',
        'mTck004',
        'mRko051',
        'mTck012',
        'mTck013',
        'mRko056',
        'mRko077',
        'mRko067',
    ];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = [];

        if ($this->requestNumber) {
            $this->houseSurveyList = $this->houseSurveyQuery($this->requestNumber)->get();

            $selectedMerchantIds = $this->houseSurveyList
                ->pluck('tck_004')
                ->filter(fn ($value) => $value !== '')
                ->unique()
                ->values()
                ->all();
        }

        $merchantQuery = MMerchant::query()->orderBy('sort', 'asc');
        if ($isToho) {
            $merchantQuery->where(function ($query) use ($selectedMerchantIds) {
                $query->where('status', '1');
                if ($selectedMerchantIds !== []) {
                    $query->orWhereIn('id', $selectedMerchantIds);
                }
            });
        }

        $this->mConstHopeOptions = MConstHope::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mHouseStyleOptions = MHouseStyle::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mHouseOwnershipOptions = MHouseOwnership::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mCustomerOptions = MCustomer::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence1Options = MExistence1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstStatusOptions = MConstStatus::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mUndecidedDelayOptions = MUndecidedDelay::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstPhaseNoteOptions = MConstPhaseNote::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mMerchantOptions = $merchantQuery
            ->pluck('val', 'id')
            ->toArray();

        $this->mAllocationTimeOptions = MAllocationTime::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence2Options = MExistence2::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstStartTimeOptions = MConstStartTime::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstCompletionOptions = MConstCompletion::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstDelayCodeOptions = MConstDelayCode::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.main.house-survery', [
            'houseSurveyList' => $this->houseSurveyList,
        ]);
    }

    protected function houseSurveyQuery(string $requestNumber)
    {
        return VHouseSurvey::query()
            ->with(self::RELATIONS)
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '現地調査')
            ->orderBy('rko_001', 'asc');
    }
}
