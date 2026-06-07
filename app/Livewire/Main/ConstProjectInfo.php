<?php

namespace App\Livewire\Main;

use App\Models\MConstDetail;
use App\Models\MConstResult;
use App\Models\MExistence1;
use App\Models\MExistence2;
use App\Models\MExistence4;
use App\Models\MInstallationPosition;
use App\Models\MNonStandardConst;
use App\Models\MOpen;
use App\Models\MOsuPort;
use App\Models\MOsuSpeed;
use App\Models\MPropriety2;
use App\Models\MReuseImpossible;
use App\Models\MSpl2Shape;
use App\Models\VConstProjectInfo;
use Livewire\Component;

class ConstProjectInfo extends Component
{
    public $requestNumber = null;
    public $vConstProjectInfo = null;

    public $mExistence1Options = [];
    public $mExistence2Options = [];
    public $mOpenOptions = [];
    public $mCostDetailOptions = [];
    public $mReuseImpossibleOptions = [];
    public $mNonStandardConstOptions = [];
    public $mOsuPortOptions = [];
    public $mOsuSpeedOptions = [];
    public $mSpl2ShapeOptions = [];
    public $mInstallationPositionOptions = [];
    public $mPropriety2Options = [];
    public $mExistence4Options = [];
    public $mConstResultOptions = [];

    private const RELATIONS = [
        'mKhj020',
        'mKhj024',
        'mKhj025',
        'mRke083',
        'mRke088',
        'mRke079',
        'mRke082',
        'mRke155',
        'mRke086',
        'mRke087',
        'mRke091',
        'mRke213',
        'mRke216',
        'mRke217',
        'mRke218',
        'mRke221',
        'mRke240',
        'mKhj010',
        'mKhj012',
        'mRke236',
    ];

    public function mount(): void
    {
        $this->mExistence1Options = MExistence1::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence2Options = MExistence2::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOpenOptions = MOpen::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mCostDetailOptions = MConstDetail::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mReuseImpossibleOptions = MReuseImpossible::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mNonStandardConstOptions = MNonStandardConst::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOsuPortOptions = MOsuPort::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mOsuSpeedOptions = MOsuSpeed::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mSpl2ShapeOptions = MSpl2Shape::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mInstallationPositionOptions = MInstallationPosition::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mPropriety2Options = MPropriety2::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mExistence4Options = MExistence4::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        $this->mConstResultOptions = MConstResult::query()
            ->orderBy('sort', 'asc')
            ->pluck('val', 'id')
            ->toArray();

        if (!$this->requestNumber) {
            $this->vConstProjectInfo = null;
            return;
        }

        $this->vConstProjectInfo = VConstProjectInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.const-project-info');
    }
}
