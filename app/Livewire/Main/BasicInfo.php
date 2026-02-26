<?php

namespace App\Livewire\Main;

use App\Models\VBasicInfo;
use Livewire\Component;

class BasicInfo extends Component
{
    public $kNo = null;
    public $vBasicInfo = null;

    public function mount(): void
    {
        if ($this->kNo) {
            $this->vBasicInfo = VBasicInfo::query()
                ->with([
                    'mHouseStyle',
                ])
                ->where('rke_019', $this->kNo)
                ->first();
        }
    }

    public function render()
    {
        return view('livewire.main.basic-info');
    }
}
