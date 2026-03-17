<?php

namespace App\Livewire\Main;

use App\Models\VServiceInfo;
use Livewire\Component;

class ServiceInfo extends Component
{
    public $kNo = null;
    public $vServiceInfo = null;

    public function mount(): void
    {
        if ($this->kNo) {
            $this->vServiceInfo = VServiceInfo::query()
                ->with([
                    'mExistence1_052',
                    'mExistence1_053',
                    'mExistence1_054',
                    'mExistence1_055',
                    'mExistence1_056',
                    'mNumberReturn',
                    'mOwnerAgree',
                    'mExistence1_059',
                    'mExistence1_060',
                    'mRadioDisturbanceArea',
                    'mDevicePosition',
                    'mExistence1_231',
                    'mExistence1_232',
                    'mExistence1_240',
                    'mExistence1_243',
                    'mExistence1_275',
                ])
                ->where('rke_019', $this->kNo)
                ->first();
        }
    }

    public function render()
    {
        return view('livewire.main.service-info');
    }
}
