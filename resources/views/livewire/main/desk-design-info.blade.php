<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>SPL2収容電柱名称</th>
            <td >{{ $tRke?->rke_090 }}</td>
            <th>SPL-2使用線番</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_002" :value="$tRke?->tKik?->kik_002" class="" />
                @else
                    {{ $tRke?->tKik?->kik_002 }}
                @endif
            </td>
            <th>SPL2ポート番号</th>
            <td>
                {{ $tRke?->rke_092 }}
            </td>
            <th>道路区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_124" :value="$tRke?->rke_124" class="tw:!w-full" :options="$mRoadOptions" empty=" " />
                @else
                    {{ $tRke?->mRke124?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>苦情エリア区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_123" :value="$tRke?->rke_123" class="tw:!w-full" :options="$mClaimAreaOptions" empty=" " />
                @else
                    {{ $tRke?->mRke123?->val }}
                @endif
            </td>
            <th>机上設計完了日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_076" :value="$tRke?->rke_076" class="" />
                @else
                    {{ $tRke?->rke_076->format('Y/m/d') }}
                @endif
            </td>
            <th>机上設計実施者</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_004" :value="$tRke?->tKik?->kik_004" class="" />
                @else
                    {{ $tRke?->tKik?->kik_004 }}
                @endif
            </td>
            <th>机上設計確認日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="kik_003" :value="$tRke?->tKik?->kik_003" />
                @else
                    {{ $tRke?->tKik?->kik_003->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>再利用回線依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_080" :value="$tRke?->rke_080" />
                @else
                    {{ $tRke?->rke_080?->val }}
                @endif
            </td>
            <th>再利用設計</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_079" :value="$tRke?->rke_079" class="tw:!w-full" :options="$mExistence1Options" empty=" " />
                @else
                    {{ $tRke?->mRke079?->val }}
                @endif
            </td>
            <th>再利用先依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_007" :value="$tRke?->tKik?->kik_007" class="" />
                @else
                    {{ $tRke?->tKik?->kik_007 }}
                @endif
            </td>
            <th>設備重複先番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_006" :value="$tRke?->tKik?->kik_006" />
                @else
                    {{ $tRke?->tKik?->kik_006 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_083" :value="$tRke?->rke_083" class="tw:!w-full" :options="$mOpenOptions" empty=" " />
                @else
                    {{ $tRke?->mRke083?->val }}
                @endif
            </td>
            <th>工事詳細区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_088" :value="$tRke?->rke_088" class="tw:!w-full" :options="$mCostDetailOptions" empty=" " />
                @else
                    {{ $tRke?->mRke088?->val }}
                @endif
            </td>
            <th>設計時再利用不可理由</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_082" :value="$tRke?->rke_082" class="tw:!w-full" :options="$mReuseImpossibleOptions" empty=" " />
                @else
                    {{ $tRke?->mRke082?->val }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>既設回線区分</th>
            <td>
                {{ $tRke?->mRke071?->val }}
            </td>
            <th>既設回線状況</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_072" :value="$tRke?->rke_072" class="tw:!w-full" :options="$mLineSituationOptions" empty=" " />
                @else
                    {{ $tRke?->mRke072?->val }}
                @endif
            </td>
            <th>流用回線依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_081" :value="$tRke?->rke_081" />
                @else
                    {{ $tRke?->rke_081 }}
                @endif
            </td>
            <th>旧回線依頼番号</th>
            <td>
                {{ $tRke?->rke_021 }}
            </td>
        </tr>
        <tr>
            <th>auひかりホーム<br>既契約の有無</th>
            <td>
                {{ $tRke?->mRke069?->val }}
            </td>
            <th>auひかりホーム既契約<br>の流用希望有無</th>
            <td>
                {{ $tRke?->mRke070?->val }}
            </td>
            <th>光コンセント情報</th>
            <td>
                {{ $tRke?->rke_073 }}
            </td>
            <th>部屋重複情報</th>
            <td>
                {{ $tRke?->rke_045 }}
            </td>
        </tr>

    </table>
    {{-- The whole world belongs to you. --}}
</div>
