<?php

namespace App\Livewire\Main;

use App\Models\MParentStoreCode;
use App\Models\VProgressInfo;
use Livewire\Component;

class ProgressInfo extends Component
{
    public $requestNumber = null;
    public $vProgressInfo = null;
    public $mParentStoreCodeOptions = [];

    private const RELATIONS = [
        'mRke233',
        'mRke068',
        'mRke064',
        'mRke063',
        'mRke111',
        'mRke114',
        'mRke117',
        'mRke119',
        'mRke209',
        'mRke211',
        'mRke210',
        'mRke212',
        'mRke136',
        'mRke148',
        'mRke149',
        'mRke236',
        'mRke244',
    ];

    public function mount(): void
    {
        $this->mParentStoreCodeOptions = MParentStoreCode::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        if (!$this->requestNumber) {
            $this->vProgressInfo = null;
            return;
        }

        $this->vProgressInfo = VProgressInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.progress-info');
    }
}
