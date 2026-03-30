<?php

namespace App\Livewire\Main;

use App\Models\VServiceInfo;
use Livewire\Component;

class RemarksAggregation extends Component
{
    public $kNo = null;
    public $tRke = null;

    public function mount(): void
    {
    }

    public function render()
    {
        return view('livewire.main.remarks-aggregation');
    }
}
