<?php

namespace App\Livewire\Main;

use App\Models\MExistence1;
use App\Models\MMerchant;
use App\Models\MSpl2Shape;
use App\Models\TGtj;
use Livewire\Component;

class LineRemoval extends Component
{
    public $kNo = null;
    public $tRke = null;

    public $mMerchantOptions = [];
    public $mExistence1Options = [];
    public $mSpl2ShapeOptions = [];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $requestNumber = $this->tRke?->rke_019;
        $selectedMerchantIds = [];

        if ($requestNumber) {
            $tGtj = $this->queryGtj($requestNumber);

            $selectedMerchantIds = array_values(array_unique(array_filter(
                [$tGtj?->gtj_003, $tGtj?->gtj_007],
                fn ($v) => $v !== '' && $v !== null
            )));
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

        $this->mMerchantOptions = $merchantQuery->pluck('val', 'id')->toArray();
        $this->mExistence1Options = MExistence1::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
        $this->mSpl2ShapeOptions = MSpl2Shape::query()->orderBy('sort', 'asc')->pluck('val', 'id')->toArray();
    }

    public function render()
    {
        $requestNumber = $this->tRke?->rke_019;
        $tGtj = null;

        if (is_string($requestNumber) && $requestNumber !== '') {
            $tGtj = $this->queryGtj($requestNumber);
        }

        return view('livewire.main.line-removal', [
            'tGtj' => $tGtj,
        ]);
    }

    protected function queryGtj(string $requestNumber): ?TGtj
    {
        return TGtj::query()->where('gtj_001', $requestNumber)->first();
    }
}
