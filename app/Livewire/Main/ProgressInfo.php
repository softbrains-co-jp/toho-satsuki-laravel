<?php

namespace App\Livewire\Main;

use App\Models\MParentStoreCode;
use Livewire\Component;

class ProgressInfo extends Component
{
    public $kNo = null;
    public $tRke = null;
    public $mParentStoreCodeOptions = [];

    public function mount(): void
    {
        $this->mParentStoreCodeOptions = MParentStoreCode::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.main.progress-info');
    }
}
