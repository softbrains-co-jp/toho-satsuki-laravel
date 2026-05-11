<?php

namespace App\Livewire\Main;

use App\Models\MAllocationTime;
use App\Models\MConstArrangement;
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
use App\Models\TOkk;
use App\Models\TRko;
use App\Models\MUndecidedDelay;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConstOption extends Component
{
    public $kNo = null;
    public $tRke = null;
    public $mConstHopeOptions = [];
    public $mHouseStyleOptions = [];
    public $mHouseOwnershipOptions = [];
    public $mCustomerOptions = [];
    public $mExistence1Options = [];
    public $mConstStatusOptions = [];
    public $mUndecidedDelayOptions = [];
    public $mConstArrangementOptions = [];
    public $mConstPhaseNoteOptions = [];
    public $mMerchantOptions = [];
    public $mAllocationTimeOptions = [];
    public $mExistence2Options = [];
    public $mConstStartTimeOptions = [];
    public $mConstCompletionOptions = [];
    public $mConstDelayCodeOptions = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $constOptionList = $this->constOptionQuery($requestNumber)->get();
            $this->attachOkkRelations($constOptionList);

            $selectedMerchantIds = $constOptionList
                ->map(fn ($rko) => $rko?->tOkk?->okk_004)
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

        $this->mConstHopeOptions = MConstHope::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mHouseStyleOptions = MHouseStyle::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mHouseOwnershipOptions = MHouseOwnership::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mCustomerOptions = MCustomer::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mExistence1Options = MExistence1::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstStatusOptions = MConstStatus::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mUndecidedDelayOptions = MUndecidedDelay::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstArrangementOptions = MConstArrangement::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstPhaseNoteOptions = MConstPhaseNote::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mMerchantOptions = $merchantQuery->pluck('val', 'id')->toArray();
        $this->mAllocationTimeOptions = MAllocationTime::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mExistence2Options = MExistence2::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstStartTimeOptions = MConstStartTime::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstCompletionOptions = MConstCompletion::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mConstDelayCodeOptions = MConstDelayCode::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }

    public function render()
    {
        $requestNumber = $this->tRke?->rke_019;
        $constOptionList = collect();

        if (is_string($requestNumber) && $requestNumber !== '') {
            $constOptionList = $this->constOptionQuery($requestNumber)->get();
            $this->attachOkkRelations($constOptionList);
        }

        return view('livewire.main.const-option', [
            'constOptionList' => $constOptionList,
        ]);
    }

    protected function constOptionQuery(string $requestNumber)
    {
        return TRko::query()
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '追加')
            ->orderBy('rko_001', 'asc');
    }

    protected function attachOkkRelations(Collection $constOptionList): void
    {
        if ($constOptionList->isEmpty()) {
            return;
        }

        $okkMap = TOkk::query()
            ->whereIn('okk_001', $constOptionList->pluck('rko_039')->unique()->all())
            ->whereIn('okk_002', $constOptionList->pluck('rko_001')->unique()->all())
            ->get()
            ->keyBy(fn (TOkk $tOkk) => $tOkk->okk_001 . ':' . $tOkk->okk_002);

        $constOptionList->each(function ($rko) use ($okkMap) {
            $compositeKey = $rko->rko_039 . ':' . $rko->rko_001;
            $rko->setRelation('tOkk', $okkMap->get($compositeKey));
        });
    }
}
