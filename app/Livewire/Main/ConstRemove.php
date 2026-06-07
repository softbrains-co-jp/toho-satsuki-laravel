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
use App\Models\TRko;
use App\Models\TTkk;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConstRemove extends Component
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
    public $mRemovalCodeOptions = [];
    public $mRemovalPatternOptions = [];
    public $mRemovalOptions = [];
    public $mDrawMethodOptions = [];
    public $mRemovalReasonCodeOptions = [];
    public $mReasonDelayOptions = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $constRemoveList = $this->constRemoveQuery($requestNumber)->get();
            $this->attachTkkRelations($constRemoveList);

            $selectedMerchantIds = $constRemoveList
                ->map(fn ($rko) => $rko?->tTkk?->tkk_005)
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
        $requestNumber = $this->tRke?->rke_019;
        $constRemoveList = collect();

        if (is_string($requestNumber) && $requestNumber !== '') {
            $constRemoveList = $this->constRemoveQuery($requestNumber)->get();
            $this->attachTkkRelations($constRemoveList);
        }

        return view('livewire.main.const-remove', [
            'constRemoveList' => $constRemoveList,
        ]);
    }

    protected function constRemoveQuery(string $requestNumber)
    {
        return TRko::query()
            ->where('rko_039', $requestNumber)
            ->whereIn('rko_041', ['ドロップ引込', '光ID施工'])
            ->where('rko_042', '撤去')
            ->orderBy('rko_001', 'asc');
    }

    protected function attachTkkRelations(Collection $constRemoveList): void
    {
        if ($constRemoveList->isEmpty()) {
            return;
        }

        $tkkMap = TTkk::query()
            ->whereIn('tkk_001', $constRemoveList->pluck('rko_039')->unique()->all())
            ->whereIn('tkk_002', $constRemoveList->pluck('rko_001')->unique()->all())
            ->get()
            ->keyBy(fn (TTkk $tTkk) => $tTkk->tkk_001 . ':' . $tTkk->tkk_002);

        $constRemoveList->each(function ($rko) use ($tkkMap) {
            $compositeKey = $rko->rko_039 . ':' . $rko->rko_001;
            $rko->setRelation('tTkk', $tkkMap->get($compositeKey));
        });
    }

    protected function options(string $model): array
    {
        return $model::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }
}
