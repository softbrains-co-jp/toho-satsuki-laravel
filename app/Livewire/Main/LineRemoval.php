<?php

namespace App\Livewire\Main;

use App\Models\MExistence1;
use App\Models\MMerchant;
use App\Models\MSpl2Shape;
use App\Models\VLineRemoval;
use Livewire\Component;

class LineRemoval extends Component
{
    public $requestNumber = null;
    public $vLineRemoval = null;

    public $mMerchantOptions = [];
    public $mExistence1Options = [];
    public $mSpl2ShapeOptions = [];

    private const RELATIONS = [
        'mGtj003',
        'mGtj007',
        'mRke261',
        'mRke091',
    ];

    public function mount(): void
    {
        $isToho = auth()->user()->is_toho;
        $selectedMerchantIds = [];

        if ($this->requestNumber) {
            $this->vLineRemoval = $this->queryLineRemoval($this->requestNumber);

            $selectedMerchantIds = array_values(array_unique(array_filter(
                [$this->vLineRemoval?->gtj_003, $this->vLineRemoval?->gtj_007],
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
        return view('livewire.main.line-removal', [
            'vLineRemoval' => $this->vLineRemoval,
        ]);
    }

    protected function queryLineRemoval(string $requestNumber): ?VLineRemoval
    {
        return VLineRemoval::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $requestNumber)
            ->first();
    }
}
