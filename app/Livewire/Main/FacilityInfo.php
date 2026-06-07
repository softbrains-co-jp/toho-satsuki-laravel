<?php

namespace App\Livewire\Main;

use App\Models\VFacilityInfo;
use Livewire\Component;

class FacilityInfo extends Component
{
    public $requestNumber = null;
    public $vFacilityInfo = null;

    private const RELATIONS = [
        'mRke083',
        'mRke088',
        'mRke071',
        'mRke072',
        'mRke079',
        'mRke069',
        'mRke070',
        'mRke082',
        'mRke123',
        'mRke124',
        'mRke086',
        'mRke087',
        'mRke091',
        'mRke207',
        'mRke205',
        'mRke206',
        'mRke213',
        'mRke216',
        'mRke217',
        'mRke218',
        'mRke208',
        'mRke247',
        'mRke249',
        'mRke250',
        'mRke251',
    ];

    public function mount(): void
    {
        if (!$this->requestNumber) {
            $this->vFacilityInfo = null;
            return;
        }

        $this->vFacilityInfo = VFacilityInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.facility-info');
    }
}
