<?php

namespace App\Livewire\Main;

use App\Models\VRemarksAggregation;
use Livewire\Component;

class RemarksAggregation extends Component
{
    public $requestNumber = null;
    public $vRemarksAggregation = null;

    public function mount(): void
    {
        if (!$this->requestNumber) {
            $this->vRemarksAggregation = null;
            return;
        }

        $this->vRemarksAggregation = VRemarksAggregation::query()
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.remarks-aggregation');
    }
}
