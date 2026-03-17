<?php

namespace App\Livewire\Main;

use App\Models\VConstRelationInfo;
use App\Models\TRke;
use Livewire\Component;

class ConstRelationInfo extends Component
{
    public $kNo = null;
    public $vConstRelationInfoList = [];

    public function mount(): void
    {
        if (!$this->kNo) {
            $this->vConstRelationInfoList = [];
            return;
        }

        $rke012 = TRke::query()
            ->where('rke_019', $this->kNo)
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
