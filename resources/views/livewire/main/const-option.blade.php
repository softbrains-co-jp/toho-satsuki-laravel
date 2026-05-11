<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
    @endphp

    @foreach ($constOptionList as $index => $rko)
        @php
            $okk = $rko?->tOkk;
        @endphp
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="const_options[{{ $index }}][rko_001]" value="{{ $rko?->rko_001 }}">
            <input type="hidden" name="const_options[{{ $index }}][rko_039]" value="{{ $rko?->rko_039 }}">
            <input type="hidden" name="const_options[{{ $index }}][rko_018]" value="{{ $rko?->rko_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $rko?->rko_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $rko?->rko_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $rko?->rko_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>オプション工事工事付託日</th>
                    <td>{{ $okk?->okk_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $rko?->rko_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $rko?->rko_032?->format('Y/m/d') }}</td>
                    <td>{{ $rko?->rko_120 }}</td>
                </tr>
            </table>

            <table x-show="showDetail" x-cloak class="satsuki-table tw:w-full tw:mt-[-1px]">
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事種別A</th>
                    <td>{{ $rko?->rko_041 }}</td>
                    <th>工事種別B</th>
                    <td>{{ $rko?->rko_042 }}</td>
                    <th>工事手配作成日</th>
                    <td>{{ $rko?->rko_030?->format('Y/m/d H:i:s') }}</td>
                    <th>親店割当日時</th>
                    <td>{{ $rko?->rko_046?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th>
                    <td>{{ $rko?->rko_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th>
                    <td>{{ $mConstHopeOptions[$rko?->rko_104] ?? '' }}</td>
                    <th>工事開始希望時刻</th>
                    <td>{{ $rko?->rko_105 }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th>
                    <td>{{ $rko?->rko_044 }}</td>
                    <th>子店割当日時</th>
                    <td>{{ $rko?->rko_047?->format('Y/m/d H:i:s') }}</td>
                    <th>工事担当者コード1</th>
                    <td>{{ $rko?->rko_045 }}</td>
                    <th>担当者割当日時</th>
                    <td>{{ $rko?->rko_048?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>工事手配種別</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_options[' . $index . '][okk_008]'" :value="$okk?->okk_008" :options="$mConstArrangementOptions" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>設置先住所コード</th>
                    <td>{{ $rko?->rko_018 }}</td>
                    <th>エリアコード</th>
                    <td>{{ $rko?->rko_019 }}</td>
                    <th>住居形態</th>
                    <td>{{ $mHouseStyleOptions[$rko?->rko_020] ?? '' }}</td>
                    <th>住居所有区分</th>
                    <td>{{ $mHouseOwnershipOptions[$rko?->rko_021] ?? '' }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th>
                    <td>{{ $mCustomerOptions[$rko?->rko_083] ?? '' }}</td>
                    <th>開通同時ポータ有無</th>
                    <td>{{ $mExistence1Options[$rko?->rko_090] ?? '' }}</td>
                    <th>連絡指定日時</th>
                    <td>{{ $rko?->rko_099?->format('Y/m/d H:i:s') }}</td>
                    <th>連絡可能時間帯</th>
                    <td>{{ $rko?->rko_100 }}</td>
                </tr>
                <tr>
                    <th>工事ステータス</th>
                    <td>{{ $mConstStatusOptions[$rko?->rko_029] ?? '' }}</td>
                    <th>未定延期フラグ</th>
                    <td>{{ $mUndecidedDelayOptions[$rko?->rko_052] ?? '' }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>指定連絡先メモ</th>
                    <td colspan="7">{!! nl2br(e($rko?->rko_101 ?? '')) !!}</td>
                </tr>
                <tr>
                    <th>工事手配メモ</th>
                    <td colspan="7">{{ $rko?->rko_053 }}</td>
                </tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'const_options[' . $index . '][rko_054]'" :value="$rko?->rko_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th>
                    <td colspan="3">{{ $mConstPhaseNoteOptions[$rko?->rko_072] ?? '' }}</td>
                    <th>施工フェイズ<br>備考2（KDDI）</th>
                    <td colspan="3">{{ $mConstPhaseNoteOptions[$rko?->rko_073] ?? '' }}</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th>
                    <td colspan="3">{{ $mConstPhaseNoteOptions[$rko?->rko_074] ?? '' }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_options[' . $index . '][rko_075]'" :value="$rko?->rko_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $mConstPhaseNoteOptions[$rko?->rko_075] ?? '' }}
                        @endif
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_options[' . $index . '][rko_076]'" :value="$rko?->rko_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $mConstPhaseNoteOptions[$rko?->rko_076] ?? '' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>オプション工事工事付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'const_options[' . $index . '][okk_003]'" :value="$okk?->okk_003" />
                        @else
                            {{ $okk?->okk_003?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>オプション工事実施業者</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_options[' . $index . '][okk_004]'" :value="$okk?->okk_004" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $mMerchantOptions[$okk?->okk_004] ?? '' }}
                        @endif
                    </td>
                    <th>オプション工事実施班</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input :name="'const_options[' . $index . '][okk_005]'" :value="$okk?->okk_005" />
                    </td>
                    <th>オプション工事実施班連絡先</th>
                    <td>{{ $okk?->okk_007 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th>
                    <td>{{ $rko?->rko_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th>
                    <td>{{ $mAllocationTimeOptions[$rko?->rko_051] ?? '' }}</td>
                    <th>時間指定有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_options[' . $index . '][okk_014]'" :value="$okk?->okk_014" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                    <th>枠外個別調整有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_options[' . $index . '][okk_015]'" :value="$okk?->okk_015" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th>
                    <td>{{ $rko?->rko_055 }}</td>
                    <th>工事開始予定時刻区分</th>
                    <td>{{ $mConstStartTimeOptions[$rko?->rko_056] ?? '' }}</td>
                    <th>工事開始時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'const_options[' . $index . '][rko_057]'" :value="$rko?->rko_057" />
                        @else
                            {{ $rko?->rko_057 }}
                        @endif
                    </td>
                    <th>工事完了時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'const_options[' . $index . '][rko_058]'" :value="$rko?->rko_058" />
                        @else
                            {{ $rko?->rko_058 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>工事完了年月日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'const_options[' . $index . '][rko_078]'" :value="$rko?->rko_078" />
                        @else
                            {{ $rko?->rko_078?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>工事完了区分</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_options[' . $index . '][rko_077]'" :value="$rko?->rko_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $mConstCompletionOptions[$rko?->rko_077] ?? '' }}
                        @endif
                    </td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>事前延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'const_options[' . $index . '][okk_010]'" :value="$okk?->okk_010" />
                    </td>
                    <th>オプション工事延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'const_options[' . $index . '][okk_011]'" :value="$okk?->okk_011" />
                    </td>
                    <th>工事延期コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_options[' . $index . '][rko_067]'" :value="$rko?->rko_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>延期理由メモ</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-textarea :name="'const_options[' . $index . '][rko_068]'">{{ $rko?->rko_068 }}</x-forms.table-textarea>
                    </td>
                </tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'const_options[' . $index . '][rko_079]'" :value="$rko?->rko_079" />
                        @else
                            {{ $rko?->rko_079 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>完了報告書受領日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'const_options[' . $index . '][okk_012]'" :value="$okk?->okk_012" />
                    </td>
                    <th>完了報告書送付日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'const_options[' . $index . '][okk_013]'" :value="$okk?->okk_013" />
                    </td>
                    <th>工事報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'const_options[' . $index . '][rko_080]'" :value="$rko?->rko_080" />
                        @else
                            {{ $rko?->rko_080?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'const_options[' . $index . '][rko_081]'" :value="$rko?->rko_081" />
                        @else
                            {{ $rko?->rko_081?->format('Y/m/d') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>オプション工事精算月</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'const_options[' . $index . '][okk_016]'" :value="$okk?->okk_016" />
                        @else
                            {{ $okk?->okk_016 }}
                        @endif
                    </td>
                    <th>ONU交換精算月</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'const_options[' . $index . '][okk_017]'" :value="$okk?->okk_017" />
                        @else
                            {{ $okk?->okk_017 }}
                        @endif
                    </td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事種別（OP）</th>
                    <td>{{ $okk?->okk_018 }}</td>
                    <td colspan="2">&nbsp;</td>
                    <th>最終更新者</th>
                    <td>{{ $rko?->rko_120 }}</td>
                    <th>最終更新日時</th>
                    <td>{{ $rko?->rko_121?->format('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
