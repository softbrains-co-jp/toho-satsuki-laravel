<?php

namespace App\Livewire\Main;

use App\Models\MAllocationTime;
use App\Models\MCableConnect;
use App\Models\MCodeLength1;
use App\Models\MConstCompletion;
use App\Models\MConstDelayCode;
use App\Models\MConstHope;
use App\Models\MConstPhaseNote;
use App\Models\MConstStartTime;
use App\Models\MConstStatus;
use App\Models\MCustomer;
use App\Models\MDirectReason;
use App\Models\MExistence1;
use App\Models\MExistence2;
use App\Models\MHouseConstResult;
use App\Models\MHouseOwnership;
use App\Models\MHouseStyle;
use App\Models\MMerchant;
use App\Models\MRouteChange;
use App\Models\TKkk;
use App\Models\TRko;
use App\Models\MUndecidedDelay;
use Illuminate\Support\Collection;
use Livewire\Component;

class HouseConst extends Component
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
    public $mConstPhaseNoteOptions = [];
    public $mMerchantOptions = [];
    public $mAllocationTimeOptions = [];
    public $mExistence2Options = [];
    public $mConstStartTimeOptions = [];
    public $mHouseConstResultOptions = [];
    public $mConstCompletionOptions = [];
    public $mConstDelayCodeOptions = [];
    public $mRouteChangeOptions = [];
    public $mCableConnectOptions = [];
    public $mDirectReasonOptions = [];
    public $mCodeLength1Options = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $houseConstList = $this->houseConstQuery($requestNumber)->get();
            $this->attachKkkRelations($houseConstList);

            $selectedMerchantIds = $houseConstList
                ->map(fn ($rko) => $rko?->tKkk?->kkk_005)
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

        $this->mHouseConstResultOptions = MHouseConstResult::query()
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

        $this->mRouteChangeOptions = MRouteChange::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mCableConnectOptions = MCableConnect::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mDirectReasonOptions = MDirectReason::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mCodeLength1Options = MCodeLength1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();
    }

    public function render()
    {
        $requestNumber = $this->tRke?->rke_019;
        $houseConstList = collect();

        if (is_string($requestNumber) && $requestNumber !== '') {
            $houseConstList = $this->houseConstQuery($requestNumber)->get();
            $this->attachKkkRelations($houseConstList);
        }

        return view('livewire.main.house-const', [
            'houseConstList' => $houseConstList,
        ]);
    }

    protected function houseConstQuery(string $requestNumber)
    {
        return TRko::query()
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '新設')
            ->orderBy('rko_001', 'asc');
    }

    protected function attachKkkRelations(Collection $houseConstList): void
    {
        if ($houseConstList->isEmpty()) {
            return;
        }

        $kkkMap = TKkk::query()
            ->whereIn('kkk_001', $houseConstList->pluck('rko_039')->unique()->all())
            ->whereIn('kkk_002', $houseConstList->pluck('rko_001')->unique()->all())
            ->get()
            ->keyBy(fn (TKkk $tKkk) => $tKkk->kkk_001 . ':' . $tKkk->kkk_002);

        $houseConstList->each(function ($rko) use ($kkkMap) {
            $compositeKey = $rko->rko_039 . ':' . $rko->rko_001;
            $rko->setRelation('tKkk', $kkkMap->get($compositeKey));
        });
    }
}
