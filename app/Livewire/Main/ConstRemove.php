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
use App\Models\MDrawMethod;
use App\Models\MExistence1;
use App\Models\MExistence2;
use App\Models\MHouseOwnership;
use App\Models\MHouseStyle;
use App\Models\MMerchant;
use App\Models\MReasonDelay;
use App\Models\MRemoval;
use App\Models\MRemovalCode;
use App\Models\MRemovalPattern;
use App\Models\MRemovalReasonCode;
use App\Models\MUndecidedDelay;
use App\Models\VConstRemove;
use Livewire\Component;

class ConstRemove extends Component
{
    public $requestNumber = null;
    public $constRemoveList = [];

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
    public $mRemovalCodeOptions = [];
    public $mRemovalPatternOptions = [];
    public $mRemovalOptions = [];
    public $mDrawMethodOptions = [];
    public $mRemovalReasonCodeOptions = [];
    public $mReasonDelayOptions = [];

    private const RELATIONS = [
        'mTkk025',
        'mRko070',
        'mRko104',
        'mTkk004',
        'mRko020',
        'mRko021',
        'mRko083',
        'mRko090',
        'mRko029',
        'mRko052',
        'mTkk013',
        'mRko072',
        'mRko073',
        'mRko074',
        'mRko075',
        'mRko076',
        'mTkk005',
        'mRko051',
        'mTkk019',
        'mTkk020',
        'mRko056',
        'mRko077',
        'mRko067',
        'mRko071',
        'mTkk029',
    ];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = [];

        if ($this->requestNumber) {
            $this->constRemoveList = $this->constRemoveQuery($this->requestNumber)->get();

            $selectedMerchantIds = $this->constRemoveList
                ->pluck('tkk_005')
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

        $this->mConstHopeOptions = $this->options(MConstHope::class);
        $this->mHouseStyleOptions = $this->options(MHouseStyle::class);
        $this->mHouseOwnershipOptions = $this->options(MHouseOwnership::class);
        $this->mCustomerOptions = $this->options(MCustomer::class);
        $this->mExistence1Options = $this->options(MExistence1::class);
        $this->mConstStatusOptions = $this->options(MConstStatus::class);
        $this->mUndecidedDelayOptions = $this->options(MUndecidedDelay::class);
        $this->mConstPhaseNoteOptions = $this->options(MConstPhaseNote::class);
        $this->mMerchantOptions = $merchantQuery->pluck('val', 'id')->toArray();
        $this->mAllocationTimeOptions = $this->options(MAllocationTime::class);
        $this->mExistence2Options = $this->options(MExistence2::class);
        $this->mConstStartTimeOptions = $this->options(MConstStartTime::class);
        $this->mConstCompletionOptions = $this->options(MConstCompletion::class);
        $this->mConstDelayCodeOptions = $this->options(MConstDelayCode::class);
        $this->mRemovalCodeOptions = $this->options(MRemovalCode::class);
        $this->mRemovalPatternOptions = $this->options(MRemovalPattern::class);
        $this->mRemovalOptions = $this->options(MRemoval::class);
        $this->mDrawMethodOptions = $this->options(MDrawMethod::class);
        $this->mRemovalReasonCodeOptions = $this->options(MRemovalReasonCode::class);
        $this->mReasonDelayOptions = $this->options(MReasonDelay::class);
    }

    public function render()
    {
        return view('livewire.main.const-remove', [
            'constRemoveList' => $this->constRemoveList,
        ]);
    }

    protected function constRemoveQuery(string $requestNumber)
    {
        return VConstRemove::query()
            ->with(self::RELATIONS)
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '撤去')
            ->orderBy('rko_001', 'asc');
    }

    protected function options(string $model): array
    {
        return $model::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }
}
