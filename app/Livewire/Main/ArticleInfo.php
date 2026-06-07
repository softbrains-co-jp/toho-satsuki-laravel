<?php

namespace App\Livewire\Main;

use App\Models\VArticleInfo;
use Livewire\Component;

class ArticleInfo extends Component
{
    public $requestNumber = null;
    public $vArticleInfo = null;

    private const RELATIONS = [
        'mRke188',
        'mRke189',
        'mRke195',
        'mRke192',
        'mRke234',
        'mRke235',
        'mRke193',
    ];

    public function mount(): void
    {
        if (!$this->requestNumber) {
            $this->vArticleInfo = null;
            return;
        }

        $this->vArticleInfo = VArticleInfo::query()
            ->with(self::RELATIONS)
            ->where('rke_019', $this->requestNumber)
            ->first();
    }

    public function render()
    {
        return view('livewire.main.article-info');
    }
}
