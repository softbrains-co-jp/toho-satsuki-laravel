<?php

namespace App\Livewire\Main;

use App\Models\MExclusionNumber;
use App\Models\VBasicInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BasicInfo extends Component
{
    public $kNo = null;
    public $vBasicInfo = null;
    public $refreshIntervalSeconds = 180;

    public function mount(): void
    {
        $refreshIntervalMinutes = max((int) config('lock.refresh_interval_minutes', 3), 1);
        $this->refreshIntervalSeconds = $refreshIntervalMinutes * 60;

        if ($this->kNo) {
            $this->vBasicInfo = VBasicInfo::query()
                ->with([
                    'mHouseStyle',
                ])
                ->where('rke_019', $this->kNo)
                ->first();
        }
    }

    public function refreshExclusion(): void
    {
        if (!$this->kNo) {
            return;
        }

        $user = Auth::user();
        if (!$user) {
            return;
        }

        MExclusionNumber::query()
            ->where('request_number', $this->kNo)
            ->where('user_id', $user->id)
            ->update([
                'date_update' => now(),
            ]);
    }

    public function render()
    {
        return view('livewire.main.basic-info');
    }
}
