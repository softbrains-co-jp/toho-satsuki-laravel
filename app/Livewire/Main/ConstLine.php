<?php

namespace App\Livewire\Main;

use App\Models\MExistence1;
use App\Models\MMerchant;
use App\Models\MRouteChange;
use Livewire\Component;

class ConstLine extends Component
{
    public $kNo = null;
    public $tRke = null;
    public $mMerchantOptions = [];
    public $mRouteChangeOptions = [];
    public $mExistence1Options = [];

    public function mount(): void
    {
        $gkj = $this->tRke?->tGkj;
        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = array_values(array_filter([
            $gkj?->gkj_003,
            $gkj?->gkj_007,
        ]));

        $merchantQuery = MMerchant::query()->orderBy('sort', 'asc');
        if ($isToho) {
            $merchantQuery->where(function ($query) use ($selectedMerchantIds) {
                $query->where('status', '1');
                if ($selectedMerchantIds !== []) {
                    $query->orWhereIn('id', $selectedMerchantIds);
                }
            });
        }

        $this->mMerchantOptions = $merchantQuery
            ->pluck('val', 'id')
            ->toArray();

        $this->mRouteChangeOptions = MRouteChange::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence1Options = MExistence1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.main.const-line');
    }
}
