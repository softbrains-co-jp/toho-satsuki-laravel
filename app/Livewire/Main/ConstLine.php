<?php

namespace App\Livewire\Main;

use App\Models\MExistence1;
use App\Models\MMerchant;
use App\Models\MRouteChange;
use App\Models\VConstLine;
use Livewire\Component;

class ConstLine extends Component
{
    public $requestNumber = null;
    public $vConstLine = null;
    public $mMerchantOptions = [];
    public $mRouteChangeOptions = [];
    public $mExistence1Options = [];

    private const RELATIONS = [
        'mGkj003',
        'mGkj007',
        'mGkj012',
        'mRke163',
        'mRke091',
    ];

    public function mount(): void
    {
        if ($this->requestNumber) {
            $this->vConstLine = VConstLine::query()
                ->with(self::RELATIONS)
                ->where('rke_019', $this->requestNumber)
                ->first();
        }

        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = array_values(array_filter([
            $this->vConstLine?->gkj_003,
            $this->vConstLine?->gkj_007,
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
