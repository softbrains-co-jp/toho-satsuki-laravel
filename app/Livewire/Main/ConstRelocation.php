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
use App\Models\TTik;
use App\Models\TRko;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConstRelocation extends Component
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
    public $mConstCompletionOptions = [];
    public $mConstDelayCodeOptions = [];
    public $mWorkContentOptions = [];
    public $mNecessity1Options = [];
    public $mReasonDelayOptions = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $constRelocationList = $this->constRelocationQuery($requestNumber)->get();
            $this->attachTikRelations($constRelocationList);

            $selectedMerchantIds = $constRelocationList
                ->map(fn ($rko) => $rko?->tTik?->tik_004)
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
        $requestNumber = $this->tRke?->rke_019;
        $constRelocationList = collect();

        if (is_string($requestNumber) && $requestNumber !== '') {
            $constRelocationList = $this->constRelocationQuery($requestNumber)->get();
            $this->attachTikRelations($constRelocationList);
        }

        return view('livewire.main.const-relocation', [
            'constRelocationList' => $constRelocationList,
        ]);
    }

    protected function constRelocationQuery(string $requestNumber)
    {
        return TRko::query()
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '宅内移設１')
            ->orderBy('rko_001', 'asc');
    }

    protected function attachTikRelations(Collection $constRelocationList): void
    {
        if ($constRelocationList->isEmpty()) {
            return;
        }

        $tikMap = TTik::query()
            ->whereIn('tik_001', $constRelocationList->pluck('rko_039')->unique()->all())
            ->whereIn('tik_002', $constRelocationList->pluck('rko_001')->unique()->all())
            ->get()
            ->keyBy(fn (TTik $tTik) => $tTik->tik_001 . ':' . $tTik->tik_002);

        $constRelocationList->each(function ($rko) use ($tikMap) {
            $compositeKey = $rko->rko_039 . ':' . $rko->rko_001;
            $rko->setRelation('tTik', $tikMap->get($compositeKey));
        });
    }

    protected function options(string $model): array
    {
        return $model::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }
}
