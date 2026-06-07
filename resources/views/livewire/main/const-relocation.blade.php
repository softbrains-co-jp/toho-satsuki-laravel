<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
        $br = fn ($value) => nl2br(e($value ?? ''));
    @endphp

    @foreach ($constRelocationList as $index => $vConstRelocation)
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="const_relocation[{{ $index }}][rko_001]" value="{{ $vConstRelocation?->rko_001 }}">
            <input type="hidden" name="const_relocation[{{ $index }}][rko_018]" value="{{ $vConstRelocation?->rko_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $vConstRelocation?->rko_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $vConstRelocation?->rko_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $vConstRelocation?->rko_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>移設工事付託日</th>
                    <td>{{ $vConstRelocation?->tik_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $vConstRelocation?->rko_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $vConstRelocation?->rko_032?->format('Y/m/d') }}</td>
                    <td>{{ $vConstRelocation?->rko_120 }}</td>
                </tr>
            </table>

            <table x-show="showDetail" x-cloak class="satsuki-table tw:!w-full tw:mt-[-1px]" style="width: 100%;">
                <colgroup>
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                </colgroup>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>工事種別A</th><td>{{ $vConstRelocation?->rko_041 }}</td>
                    <th>工事種別B</th><td>{{ $vConstRelocation?->rko_042 }}</td>
                    <th>工事手配作成日</th><td>{{ $vConstRelocation?->rko_030?->format('Y/m/d H:i:s') }}</td>
                    <th>親店割当日時</th><td>{{ $vConstRelocation?->rko_046?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th><td>{{ $vConstRelocation?->rko_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th><td>{{ $vConstRelocation?->mRko104?->val }}</td>
                    <th>工事開始希望時刻</th><td>{{ $vConstRelocation?->rko_105 }}</td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th><td>{{ $vConstRelocation?->rko_044 }}</td>
                    <th>子店割当日時</th><td>{{ $vConstRelocation?->rko_047?->format('Y/m/d H:i:s') }}</td>
                    <th>工事担当者コード1</th><td>{{ $vConstRelocation?->rko_045 }}</td>
                    <th>担当者割当日時</th><td>{{ $vConstRelocation?->rko_048?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>作業内容</th><td>{{ $vConstRelocation?->mTik014?->val }}</td>
                    <th>本復旧要否</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_relocation[' . $index . '][tik_016]'" :value="$vConstRelocation?->tik_016" :options="$mNecessity1Options" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>設置先住所コード</th><td>{{ $vConstRelocation?->rko_018 }}</td>
                    <th>エリアコード</th><td>{{ $vConstRelocation?->rko_019 }}</td>
                    <th>住居形態</th><td>{{ $vConstRelocation?->mRko020?->val }}</td>
                    <th>住居所有区分</th><td>{{ $vConstRelocation?->mRko021?->val }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th><td>{{ $vConstRelocation?->mRko083?->val }}</td>
                    <th>開通同時ポータ有無</th><td>{{ $vConstRelocation?->mRko090?->val }}</td>
                    <th>連絡指定日時</th><td>{{ $vConstRelocation?->rko_099?->format('Y/m/d H:i:s') }}</td>
                    <th>連絡可能時間帯</th><td>{{ $vConstRelocation?->rko_100 }}</td>
                </tr>
                <tr>
                    <th>工事ステータス</th><td>{{ $vConstRelocation?->mRko029?->val }}</td>
                    <th>未定延期フラグ</th><td>{{ $vConstRelocation?->mRko052?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr><th>指定連絡先メモ</th><td colspan="7">{{ $vConstRelocation?->rko_101 }}</td></tr>
                <tr><th>工事手配メモ</th><td colspan="7">{{ $vConstRelocation?->rko_053 }}</td></tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'const_relocation[' . $index . '][rko_054]'" :value="$vConstRelocation?->rko_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th><td colspan="3">{{ $vConstRelocation?->mRko072?->val }}</td>
                    <th>施工フェイズ<br>備考2（KDDI）</th><td colspan="3">{{ $vConstRelocation?->mRko073?->val }}</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th><td colspan="3">{{ $vConstRelocation?->mRko074?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_relocation[' . $index . '][rko_075]'" :value="$vConstRelocation?->rko_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vConstRelocation?->mRko075?->val }}
                        @endif
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_relocation[' . $index . '][rko_076]'" :value="$vConstRelocation?->rko_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vConstRelocation?->mRko076?->val }}
                        @endif
                    </td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>移設工事付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_003]'" :value="$vConstRelocation?->tik_003" />@else{{ $vConstRelocation?->tik_003?->format('Y/m/d') }}@endif</td>
                    <th>移設工事業者</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_relocation[' . $index . '][tik_004]'" :value="$vConstRelocation?->tik_004" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRelocation?->mTik004?->val }}@endif</td>
                    <th>移設工事班</th>
                    <td class="tw:!p-0"><x-forms.table-input :name="'const_relocation[' . $index . '][tik_005]'" :value="$vConstRelocation?->tik_005" /></td>
                    <th>移設工事班連絡先</th><td>{{ $vConstRelocation?->tik_007 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th><td>{{ $vConstRelocation?->rko_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th><td>{{ $vConstRelocation?->mRko051?->val }}</td>
                    <th>時間指定有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_relocation[' . $index . '][tik_017]'" :value="$vConstRelocation?->tik_017" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $vConstRelocation?->mTik017?->val }}@endif</td>
                    <th>枠外個別調整有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_relocation[' . $index . '][tik_018]'" :value="$vConstRelocation?->tik_018" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $vConstRelocation?->mTik018?->val }}@endif</td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th><td>{{ $vConstRelocation?->rko_055 }}</td>
                    <th>工事開始予定時刻区分</th><td>{{ $vConstRelocation?->mRko056?->val }}</td>
                    <th>工事開始時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][rko_057]'" :value="$vConstRelocation?->rko_057" />@else{{ $vConstRelocation?->rko_057 }}@endif</td>
                    <th>工事完了時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][rko_058]'" :value="$vConstRelocation?->rko_058" />@else{{ $vConstRelocation?->rko_058 }}@endif</td>
                </tr>
                <tr>
                    <th>工事完了年月日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_relocation[' . $index . '][rko_078]'" :value="$vConstRelocation?->rko_078" />@else{{ $vConstRelocation?->rko_078?->format('Y/m/d') }}@endif</td>
                    <th>工事完了区分</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_relocation[' . $index . '][rko_077]'" :value="$vConstRelocation?->rko_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRelocation?->mRko077?->val }}@endif</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>CS取り付け有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_relocation[' . $index . '][tik_015]'" :value="$vConstRelocation?->tik_015" :options="$mExistence1Options" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>事前延期日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_009]'" :value="$vConstRelocation?->tik_009" /></td>
                    <th>移設工事延期日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_008]'" :value="$vConstRelocation?->tik_008" /></td>
                    <th>工事延期コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_relocation[' . $index . '][rko_067]'" :value="$vConstRelocation?->rko_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                </tr>
                <tr><th>延期理由メモ</th><td colspan="7" class="tw:!p-0"><x-forms.table-textarea :name="'const_relocation[' . $index . '][rko_068]'">{{ $vConstRelocation?->rko_068 }}</x-forms.table-textarea></td></tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][rko_079]'" :value="$vConstRelocation?->rko_079" />@else{{ $vConstRelocation?->rko_079 }}@endif</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>移設工事図面受領日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_010]'" :value="$vConstRelocation?->tik_010" /></td>
                    <th>移設工事図面提出日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_011]'" :value="$vConstRelocation?->tik_011" /></td>
                    <th>完了報告書受領日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_012]'" :value="$vConstRelocation?->tik_012" /></td>
                    <th>完了報告書送付日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_013]'" :value="$vConstRelocation?->tik_013" /></td>
                </tr>
                <tr>
                    <th>工事報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_relocation[' . $index . '][rko_080]'" :value="$vConstRelocation?->rko_080" />@else{{ $vConstRelocation?->rko_080?->format('Y/m/d') }}@endif</td>
                    <th>竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_relocation[' . $index . '][rko_081]'" :value="$vConstRelocation?->rko_081" />@else{{ $vConstRelocation?->rko_081?->format('Y/m/d') }}@endif</td>
                    <th>移設工事精算月</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][tik_019]'" :value="$vConstRelocation?->tik_019" />@else{{ $vConstRelocation?->tik_019 }}@endif</td>
                    <th>移設竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_relocation[' . $index . '][tik_020]'" :value="$vConstRelocation?->tik_020" />@else{{ $vConstRelocation?->tik_020?->format('Y/m/d') }}@endif</td>
                </tr>
                <tr>
                    <th>移設遅延理由</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_relocation[' . $index . '][tik_022]'" :value="$vConstRelocation?->tik_022" :options="$mReasonDelayOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRelocation?->mTik022?->val }}@endif</td>
                    <th>移設竣工作成者</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][tik_023]'" :value="$vConstRelocation?->tik_023" />@else{{ $vConstRelocation?->tik_023 }}@endif</td>
                    <th>移設竣工備考</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_relocation[' . $index . '][tik_024]'" :value="$vConstRelocation?->tik_024" />@else{{ $vConstRelocation?->tik_024 }}@endif</td>
                </tr>
                <tr>
                    <th>工事種別（移設）</th><td>{{ $vConstRelocation?->tik_021 }}</td>
                    <td colspan="2">&nbsp;</td>
                    <th>最終更新者</th><td>{{ $vConstRelocation?->rko_120 }}</td>
                    <th>最終更新日時</th><td>{{ $vConstRelocation?->rko_121?->format('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
