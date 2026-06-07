<?php

namespace App\Livewire\Main;

use App\Models\VServiceInfo;
use Livewire\Component;

class ServiceInfo extends Component
{
    public $requestNumber = null;
    public $vServiceInfo = null;

    private const RELATIONS = [
        'mRke052',
        'mRke053',
        'mRke054',
        'mRke055',
        'mRke056',
        'mRke057',
        'mRke058',
        'mRke059',
        'mRke060',
        'mRke240',
        'mRke228',
        'mRke230',
        'mRke231',
        'mRke232',
        'mRke243',
        'mRke275',
    ];

    public function mount(): void
    {
        if (!$this->requestNumber) {
            $this->vServiceInfo = null;
            return;
        }

        $this->vServiceInfo = VServiceInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.service-info');
    }
}
