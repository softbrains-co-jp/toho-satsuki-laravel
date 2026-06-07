<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
    @endphp

    @foreach ($houseSurveyList as $index => $vHouseSurvey)
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="house_survey[{{ $index }}][rko_001]" value="{{ $vHouseSurvey?->rko_001 }}">
            <input type="hidden" name="house_survey[{{ $index }}][rko_039]" value="{{ $vHouseSurvey?->rko_039 }}">
            <input type="hidden" name="house_survey[{{ $index }}][rko_018]" value="{{ $vHouseSurvey?->rko_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $vHouseSurvey?->rko_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $vHouseSurvey?->rko_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $vHouseSurvey?->rko_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>宅内調査付託日</th>
                    <td>{{ $vHouseSurvey?->tck_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $vHouseSurvey?->rko_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $vHouseSurvey?->rko_032?->format('Y/m/d') }}</td>
                    <td>{{ $vHouseSurvey?->rko_120 }}</td>
                </tr>
            </table>

            <table x-show="showDetail" x-cloak class="satsuki-table tw:w-full tw:mt-[-1px]">
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事種別A</th>
                    <td>{{ $vHouseSurvey?->rko_041 }}</td>
                    <th>工事種別B</th>
                    <td>{{ $vHouseSurvey?->rko_042 }}</td>
                    <th>工事手配作成日</th>
                    <td>{{ $vHouseSurvey?->rko_030 }}</td>
                    <th>親店割当日時</th>
                    <td>{{ $vHouseSurvey?->rko_046 }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th>
                    <td>{{ $vHouseSurvey?->rko_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th>
                    <td>{{ $vHouseSurvey?->mRko104?->val }}</td>
                    <th>工事開始希望時刻</th>
                    <td>{{ $vHouseSurvey?->rko_105 }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th>
                    <td>{{ $vHouseSurvey?->rko_044 }}</td>
                    <th>子店割当日時</th>
                    <td>{{ $vHouseSurvey?->rko_047 }}</td>
                    <th>工事担当者コード1</th>
                    <td>{{ $vHouseSurvey?->rko_045 }}</td>
                    <th>担当者割当日時</th>
                    <td>{{ $vHouseSurvey?->rko_048 }}</td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>設置先住所コード</th>
                    <td>{{ $vHouseSurvey?->rko_018 }}</td>
                    <th>エリアコード</th>
                    <td>{{ $vHouseSurvey?->rko_019 }}</td>
                    <th>住居形態</th>
                    <td>{{ $vHouseSurvey?->mRko020?->val }}</td>
                    <th>住居所有区分</th>
                    <td>{{ $vHouseSurvey?->mRko021?->val }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th>
                    <td>{{ $vHouseSurvey?->mRko083?->val }}</td>
                    <th>開通同時ポータ有無</th>
                    <td>{{ $vHouseSurvey?->mRko090?->val }}</td>
                    <th>連絡指定日時</th>
                    <td>{{ $vHouseSurvey?->rko_099 }}</td>
                    <th>連絡可能時間帯</th>
                    <td>{{ $vHouseSurvey?->rko_100 }}</td>
                </tr>
                <tr>
                    <th>工事ステータス</th>
                    <td>{{ $vHouseSurvey?->mRko029?->val }}</td>
                    <th>未定延期フラグ</th>
                    <td>{{ $vHouseSurvey?->mRko052?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>指定連絡先メモ</th>
                    <td colspan="7">{!! nl2br(e($vHouseSurvey?->rko_101 ?? '')) !!}</td>
                </tr>
                <tr>
                    <th>工事手配メモ</th>
                    <td colspan="7">{{ $vHouseSurvey?->rko_053 }}</td>
                </tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'house_survey[' . $index . '][rko_054]'" :value="$vHouseSurvey?->rko_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th>
                    <td colspan="3">{{ $vHouseSurvey?->mRko072?->val }}</td>
                    <th>施工フェイズ<br>備考2（KDDI）</th>
                    <td colspan="3">{{ $vHouseSurvey?->mRko073?->val }}</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th>
                    <td colspan="3">{{ $vHouseSurvey?->mRko074?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_survey[' . $index . '][rko_075]'" :value="$vHouseSurvey?->rko_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vHouseSurvey?->mRko075?->val }}
                        @endif
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_survey[' . $index . '][rko_076]'" :value="$vHouseSurvey?->rko_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vHouseSurvey?->mRko076?->val }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>宅内調査付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_survey[' . $index . '][tck_003]'" :value="$vHouseSurvey?->tck_003" />
                        @else
                            {{ $vHouseSurvey?->tck_003?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>宅内調査業者</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_survey[' . $index . '][tck_004]'" :value="$vHouseSurvey?->tck_004" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseSurvey?->mTck004?->val }}
                        @endif
                    </td>
                    <th>宅内調査班</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input :name="'house_survey[' . $index . '][tck_005]'" :value="$vHouseSurvey?->tck_005" />
                    </td>
                    <th>宅内調査班連絡先</th>
                    <td>{{ $vHouseSurvey?->tck_007 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th>
                    <td>{{ $vHouseSurvey?->rko_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th>
                    <td>{{ $vHouseSurvey?->mRko051?->val }}</td>
                    <th>時間指定有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_survey[' . $index . '][tck_012]'" :value="$vHouseSurvey?->tck_012" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                    <th>枠外個別調整有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_survey[' . $index . '][tck_013]'" :value="$vHouseSurvey?->tck_013" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th>
                    <td>{{ $vHouseSurvey?->rko_055 }}</td>
                    <th>工事開始予定時刻区分</th>
                    <td>{{ $vHouseSurvey?->mRko056?->val }}</td>
                    <th>工事開始時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_survey[' . $index . '][rko_057]'" :value="$vHouseSurvey?->rko_057" />
                        @else
                            {{ $vHouseSurvey?->rko_057 }}
                        @endif
                    </td>
                    <th>工事完了時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_survey[' . $index . '][rko_058]'" :value="$vHouseSurvey?->rko_058" />
                        @else
                            {{ $vHouseSurvey?->rko_058 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>工事完了年月日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_survey[' . $index . '][rko_078]'" :value="$vHouseSurvey?->rko_078" />
                        @else
                            {{ $vHouseSurvey?->rko_078?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>工事完了区分</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_survey[' . $index . '][rko_077]'" :value="$vHouseSurvey?->rko_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseSurvey?->mRko077?->val }}
                        @endif
                    </td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>事前延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_survey[' . $index . '][tck_011]'" :value="$vHouseSurvey?->tck_011" />
                    </td>
                    <th>宅内調査延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_survey[' . $index . '][tck_010]'" :value="$vHouseSurvey?->tck_010" />
                    </td>
                    <th>工事延期コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_survey[' . $index . '][rko_067]'" :value="$vHouseSurvey?->rko_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>延期理由メモ</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-textarea :name="'house_survey[' . $index . '][rko_068]'">{{ $vHouseSurvey?->rko_068 }}</x-forms.table-textarea>
                    </td>
                </tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_survey[' . $index . '][rko_079]'" :value="$vHouseSurvey?->rko_079" />
                        @else
                            {{ $vHouseSurvey?->rko_079 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>宅内調査図面受領日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_survey[' . $index . '][tck_008]'" :value="$vHouseSurvey?->tck_008" />
                    </td>
                    <th>宅内調査図面提出日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_survey[' . $index . '][tck_009]'" :value="$vHouseSurvey?->tck_009" />
                    </td>
                    <th>工事報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_survey[' . $index . '][rko_080]'" :value="$vHouseSurvey?->rko_080" />
                        @else
                            {{ $vHouseSurvey?->rko_080?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_survey[' . $index . '][rko_081]'" :value="$vHouseSurvey?->rko_081" />
                        @else
                            {{ $vHouseSurvey?->rko_081?->format('Y/m/d') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <th>最終更新者</th>
                    <td>{{ $vHouseSurvey?->rko_120 }}</td>
                    <th>最終更新日時</th>
                    <td>{{ $vHouseSurvey?->rko_121?->format('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
