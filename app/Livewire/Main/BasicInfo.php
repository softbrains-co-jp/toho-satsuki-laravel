<?php

namespace App\Livewire\Main;

use App\Models\MExclusionNumber;
use App\Models\VBasicInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BasicInfo extends Component
{
    public $requestNumber = null;
    public $vBasicInfo = null;
    public $refreshIntervalSeconds = 180;

    private const RELATIONS = [
        'mRke024',
        'mRke025',
        'mRke044',
        'mRke174',
        'mRke043',
        'mRke239',
    ];

    public function mount(): void
    {
        $refreshIntervalMinutes = max((int) config('lock.refresh_interval_minutes', 3), 1);
        $this->refreshIntervalSeconds = $refreshIntervalMinutes * 60;

        if (!$this->requestNumber) {
            $this->vBasicInfo = null;
            return;
        }

        $this->vBasicInfo = VBasicInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function refreshExclusion(): void
    {
        if (!$this->requestNumber) {
            return;
        }

        $user = Auth::user();
        if (!$user) {
            return;
        }

        MExclusionNumber::query()
            ->where('request_number', $this->requestNumber)
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
