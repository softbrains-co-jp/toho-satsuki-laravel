<?php

namespace App\Http\Controllers;

use App\Models\TGcr;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OutLineHistoryController extends Controller
{
    public function index(string $requestNumber): View
    {
        $validated = validator(
            ['requestNumber' => $requestNumber],
            ['requestNumber' => ['required', 'string', 'max:64']]
        )->validate();

        $tGcr = TGcr::query()
            ->where('gcr_001', $validated['requestNumber'])
            ->firstOrFail();

        return view('out-line-history.index')
            ->with(compact(
                'tGcr',
                'requestNumber',
            ));
    }

    public function update(Request $request, string $requestNumber)
    {
        $validated = validator(
            ['requestNumber' => $requestNumber],
            ['requestNumber' => ['required', 'string', 'max:64']]
        )->validate();

        $input = $request->input();

        $tGcr = TGcr::query()
            ->where('gcr_001', $validated['requestNumber'])
            ->firstOrFail();

        $this->updateGcr($tGcr, $input);

        return redirect()->route('out-line-history.index', [
            'requestNumber' => $validated['requestNumber'],
        ]);
    }

    protected function updateGcr(TGcr $tGcr, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'gcr', 'gcr_001');

        if ($attributes === []) {
            return;
        }

        foreach ($attributes as $key => $value) {
            $tGcr->{$key} = $value;
        }

        if ($tGcr->isDirty()) {
            $tGcr->save();
        }
    }

    protected function extractScopedInput(array $input, string $prefix, string $primaryKey): array
    {
        $attributes = [];

        foreach ($input as $key => $value) {
            if (!is_string($key)) {
                continue;
            }

            if (!preg_match('/^' . preg_quote($prefix, '/') . '_\d{3}$/', $key) || $key === $primaryKey) {
                continue;
            }

            if (is_array($value) || is_object($value)) {
                continue;
            }

            $attributes[$key] = $value;
        }

        return $attributes;
    }

}
