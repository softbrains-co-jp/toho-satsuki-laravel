<?php

namespace App\Livewire\Main;

use App\Models\VConstRelationInfo;
use Livewire\Component;

class ConstRelationInfo extends Component
{
    public $requestNumber = null;
    public $vConstRelationInfoList = [];

    public function mount(): void
    {
        if (!$this->requestNumber) {
            $this->vConstRelationInfoList = [];
            return;
        }

        $rke012 = VConstRelationInfo::query()
            ->where('rke_019', $this->requestNumber)
            ->value('rke_012');

        if (!$rke012) {
            $this->vConstRelationInfoList = [];
            return;
        }

        $this->vConstRelationInfoList = VConstRelationInfo::query()
            ->where('rke_012', $rke012)
            ->orderBy('rke_019', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.main.const-relation-info');
    }
}
