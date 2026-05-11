<?php

namespace App\Livewire\Main;

use App\Models\MAllocationTime;
use App\Models\MBasicPcOs;
use App\Models\MCancelOccur;
use App\Models\MConstCompletion;
use App\Models\MConstDelayCode;
use App\Models\MConstHope;
use App\Models\MConstPhaseNote;
use App\Models\MConstResultReason;
use App\Models\MConstScheme;
use App\Models\MConstStartTime;
use App\Models\MConstStatus;
use App\Models\MCustomer;
use App\Models\MDrawConst;
use App\Models\MExistence1;
use App\Models\MExistence2;
use App\Models\MFirstRush;
use App\Models\MHouseOwnership;
use App\Models\MHouseStyle;
use App\Models\MMerchant;
use App\Models\MNecessity2;
use App\Models\MOneContractTwoPhone;
use App\Models\MOwnerAgree;
use App\Models\MProgressStatus;
use App\Models\MStopInformation;
use App\Models\MTerminal;
use App\Models\MUndecidedDelay;
use App\Models\MUrPrivate;
use App\Models\MWlanSetupHope;
use App\Models\TKtk;
use App\Models\TRkk;
use Illuminate\Support\Collection;
use Livewire\Component;

class SetupRush extends Component
{
    public $kNo = null;
    public $tRke = null;

    public $mConstHopeOptions = [];
    public $mHouseStyleOptions = [];
    public $mHouseOwnershipOptions = [];
    public $mCustomerOptions = [];
    public $mConstStatusOptions = [];
    public $mUndecidedDelayOptions = [];
    public $mConstPhaseNoteOptions = [];
    public $mFirstRushOptions = [];
    public $mExistence1Options = [];
    public $mMerchantOptions = [];
    public $mAllocationTimeOptions = [];
    public $mExistence2Options = [];
    public $mConstStartTimeOptions = [];
    public $mConstCompletionOptions = [];
    public $mConstDelayCodeOptions = [];
    public $mConstResultReasonOptions = [];
    public $mProgressStatusOptions = [];
    public $mStopInformationOptions = [];
    public $mUrPrivateOptions = [];
    public $mDrawConstOptions = [];
    public $mBasicPcOsOptions = [];
    public $mWlanSetupHopeOptions = [];
    public $mTerminalOptions = [];
    public $mNecessity2Options = [];
    public $mOneContractTwoPhoneOptions = [];
    public $mCancelOccurOptions = [];
    public $mOwnerAgreeOptions = [];
    public $mConstSchemeOptions = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $setupRushList = $this->setupRushQuery($requestNumber)->get();
            $this->attachKtkRelations($setupRushList);

            $selectedMerchantIds = $setupRushList
                ->map(fn ($rkk) => $rkk?->tKtk?->ktk_004)
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
        $this->mConstStatusOptions = $this->options(MConstStatus::class);
        $this->mUndecidedDelayOptions = $this->options(MUndecidedDelay::class);
        $this->mConstPhaseNoteOptions = $this->options(MConstPhaseNote::class);
        $this->mFirstRushOptions = $this->options(MFirstRush::class);
        $this->mExistence1Options = $this->options(MExistence1::class);
        $this->mMerchantOptions = $merchantQuery->pluck('val', 'id')->toArray();
        $this->mAllocationTimeOptions = $this->options(MAllocationTime::class);
        $this->mExistence2Options = $this->options(MExistence2::class);
        $this->mConstStartTimeOptions = $this->options(MConstStartTime::class);
        $this->mConstCompletionOptions = $this->options(MConstCompletion::class);
        $this->mConstDelayCodeOptions = $this->options(MConstDelayCode::class);
        $this->mConstResultReasonOptions = $this->options(MConstResultReason::class);
        $this->mProgressStatusOptions = $this->options(MProgressStatus::class);
        $this->mStopInformationOptions = $this->options(MStopInformation::class);
        $this->mUrPrivateOptions = $this->options(MUrPrivate::class);
        $this->mDrawConstOptions = $this->options(MDrawConst::class);
        $this->mBasicPcOsOptions = $this->options(MBasicPcOs::class);
        $this->mWlanSetupHopeOptions = $this->options(MWlanSetupHope::class);
        $this->mTerminalOptions = $this->options(MTerminal::class);
        $this->mNecessity2Options = $this->options(MNecessity2::class);
        $this->mOneContractTwoPhoneOptions = $this->options(MOneContractTwoPhone::class);
        $this->mCancelOccurOptions = $this->options(MCancelOccur::class);
        $this->mOwnerAgreeOptions = $this->options(MOwnerAgree::class);
        $this->mConstSchemeOptions = $this->options(MConstScheme::class);
    }

    public function render()
    {
        $requestNumber = $this->tRke?->rke_019;
        $setupRushList = collect();

        if (is_string($requestNumber) && $requestNumber !== '') {
            $setupRushList = $this->setupRushQuery($requestNumber)->get();
            $this->attachKtkRelations($setupRushList);
        }

        return view('livewire.main.setup-rush', [
            'setupRushList' => $setupRushList,
        ]);
    }

    protected function setupRushQuery(string $requestNumber)
    {
        return TRkk::query()
            ->where('rkk_039', $requestNumber)
            ->where('rkk_041', 'かけつけ')
            ->orderBy('rkk_001', 'asc');
    }

    protected function attachKtkRelations(Collection $setupRushList): void
    {
        if ($setupRushList->isEmpty()) {
            return;
        }

        $ktkMap = TKtk::query()
            ->whereIn('ktk_001', $setupRushList->pluck('rkk_039')->unique()->all())
            ->whereIn('ktk_002', $setupRushList->pluck('rkk_001')->unique()->all())
            ->get()
            ->keyBy(fn (TKtk $tKtk) => $tKtk->ktk_001 . ':' . $tKtk->ktk_002);

        $setupRushList->each(function ($rkk) use ($ktkMap) {
            $compositeKey = $rkk->rkk_039 . ':' . $rkk->rkk_001;
            $rkk->setRelation('tKtk', $ktkMap->get($compositeKey));
        });
    }

    protected function options(string $model): array
    {
        return $model::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }
}
