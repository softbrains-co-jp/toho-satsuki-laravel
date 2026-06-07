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
use App\Models\MNecessity1;
use App\Models\MReasonDelay;
use App\Models\MUndecidedDelay;
use App\Models\MWorkContent;
use App\Models\VConstRelocation;
use Livewire\Component;

class ConstRelocation extends Component
{
    public $requestNumber = null;
    public $constRelocationList = [];

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
    public $mWorkContentOptions = [];
    public $mNecessity1Options = [];
    public $mReasonDelayOptions = [];

    private const RELATIONS = [
        'mRko104',
        'mTik014',
        'mTik016',
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
        'mTik004',
        'mRko051',
        'mTik017',
        'mTik018',
        'mRko056',
        'mRko077',
        'mTik015',
        'mRko067',
        'mTik022',
    ];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = [];

        if ($this->requestNumber) {
            $this->constRelocationList = $this->constRelocationQuery($this->requestNumber)->get();

            $selectedMerchantIds = $this->constRelocationList
                ->pluck('tik_004')
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
        $this->mWorkContentOptions = $this->options(MWorkContent::class);
        $this->mNecessity1Options = $this->options(MNecessity1::class);
        $this->mReasonDelayOptions = $this->options(MReasonDelay::class);
    }

    public function render()
    {
        return view('livewire.main.const-relocation', [
            'constRelocationList' => $this->constRelocationList,
        ]);
    }

    protected function constRelocationQuery(string $requestNumber)
    {
        return VConstRelocation::query()
            ->with(self::RELATIONS)
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '宅内移設１')
            ->orderBy('rko_001', 'asc');
    }

    protected function options(string $model): array
    {
        return $model::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }
}
