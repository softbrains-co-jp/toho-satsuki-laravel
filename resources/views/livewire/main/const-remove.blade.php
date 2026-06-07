<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
        $br = fn ($value) => nl2br(e($value ?? ''));
    @endphp

    @foreach ($constRemoveList as $index => $vConstRemove)
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="const_remove[{{ $index }}][rko_001]" value="{{ $vConstRemove?->rko_001 }}">
            <input type="hidden" name="const_remove[{{ $index }}][rko_018]" value="{{ $vConstRemove?->rko_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $vConstRemove?->rko_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $vConstRemove?->rko_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $vConstRemove?->rko_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>撤去工事付託日</th>
                    <td>{{ $vConstRemove?->tkk_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $vConstRemove?->rko_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $vConstRemove?->rko_032?->format('Y/m/d') }}</td>
                    <td>{{ $vConstRemove?->rko_120 }}</td>
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
                    <th>開通時回線依頼番号</th>
                    <td>{{ $vConstRemove?->rko_040 }}</td>
                    <th>撤去コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_remove[' . $index . '][tkk_025]'" :value="$vConstRemove?->tkk_025" :options="$mRemovalCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>撤去期限日（工事会社）</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_031]'" :value="$vConstRemove?->tkk_031" />@else{{ $vConstRemove?->tkk_031?->format('Y/m/d') }}@endif</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>撤去期限日(KDDI入力）</th>
                    <td>{{ $vConstRemove?->rko_069?->format('Y/m/d') }}</td>
                    <th>宅内撤去予定日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_022]'" :value="$vConstRemove?->tkk_022" />@else{{ $vConstRemove?->tkk_022?->format('Y/m/d') }}@endif</td>
                    <th>撤去パターン</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_remove[' . $index . '][rko_070]'" :value="$vConstRemove?->rko_070" :options="$mRemovalPatternOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>返却コード</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_014]'" :value="$vConstRemove?->tkk_014" />@else{{ $vConstRemove?->tkk_014 }}@endif</td>
                </tr>
                <tr>
                    <th>工事種別A</th><td>{{ $vConstRemove?->rko_041 }}</td>
                    <th>工事種別B</th><td>{{ $vConstRemove?->rko_042 }}</td>
                    <th>工事手配作成日</th><td>{{ $vConstRemove?->rko_030?->format('Y/m/d H:i:s') }}</td>
                    <th>親店割当日時</th><td>{{ $vConstRemove?->rko_046?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th><td>{{ $vConstRemove?->rko_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th><td>{{ $vConstRemove?->mRko104?->val }}</td>
                    <th>工事開始希望時刻</th><td>{{ $vConstRemove?->rko_105 }}</td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th><td>{{ $vConstRemove?->rko_044 }}</td>
                    <th>子店割当日時</th><td>{{ $vConstRemove?->rko_047?->format('Y/m/d H:i:s') }}</td>
                    <th>工事担当者コード1</th><td>{{ $vConstRemove?->rko_045 }}</td>
                    <th>担当者割当日時</th><td>{{ $vConstRemove?->rko_048?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>撤去種別</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][tkk_004]'" :value="$vConstRemove?->tkk_004" :options="$mRemovalOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mTkk004?->val }}@endif</td>
                    <th>APOLLO修正者（撤去）</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_032]'" :value="$vConstRemove?->tkk_032" />@else{{ $vConstRemove?->tkk_032 }}@endif</td>
                    <th>APOLLO修正日（撤去）</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_033]'" :value="$vConstRemove?->tkk_033" />@else{{ $vConstRemove?->tkk_033?->format('Y/m/d') }}@endif</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>設置先住所コード</th><td>{{ $vConstRemove?->rko_018 }}</td>
                    <th>エリアコード</th><td>{{ $vConstRemove?->rko_019 }}</td>
                    <th>住居形態</th><td>{{ $vConstRemove?->mRko020?->val }}</td>
                    <th>住居所有区分</th><td>{{ $vConstRemove?->mRko021?->val }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th><td>{{ $vConstRemove?->mRko083?->val }}</td>
                    <th>開通同時ポータ有無</th><td>{{ $vConstRemove?->mRko090?->val }}</td>
                    <th>連絡指定日時</th><td>{{ $vConstRemove?->rko_099?->format('Y/m/d H:i:s') }}</td>
                    <th>連絡可能時間帯</th><td>{{ $vConstRemove?->rko_100 }}</td>
                </tr>
                <tr>
                    <th>工事ステータス</th><td>{{ $vConstRemove?->mRko029?->val }}</td>
                    <th>未定延期フラグ</th><td>{{ $vConstRemove?->mRko052?->val }}</td>
                    <th>引き込み方法区分</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_remove[' . $index . '][tkk_013]'" :value="$vConstRemove?->tkk_013" :options="$mDrawMethodOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr><th>指定連絡先メモ</th><td colspan="7">{!! $br($vConstRemove?->rko_101) !!}</td></tr>
                <tr><th>工事手配メモ</th><td colspan="7">{{ $vConstRemove?->rko_053 }}</td></tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'const_remove[' . $index . '][rko_054]'" :value="$vConstRemove?->rko_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th><td colspan="3">{{ $vConstRemove?->mRko072?->val }}</td>
                    <th>施工フェイズ<br>備考2（KDDI）</th><td colspan="3">{{ $vConstRemove?->mRko073?->val }}</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th><td colspan="3">{{ $vConstRemove?->mRko074?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_remove[' . $index . '][rko_075]'" :value="$vConstRemove?->rko_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vConstRemove?->mRko075?->val }}
                        @endif
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'const_remove[' . $index . '][rko_076]'" :value="$vConstRemove?->rko_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $vConstRemove?->mRko076?->val }}
                        @endif
                    </td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>撤去工事付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_003]'" :value="$vConstRemove?->tkk_003" />@else{{ $vConstRemove?->tkk_003?->format('Y/m/d') }}@endif</td>
                    <th>宅内撤去業者</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][tkk_005]'" :value="$vConstRemove?->tkk_005" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mTkk005?->val }}@endif</td>
                    <th>宅内撤去班</th>
                    <td class="tw:!p-0"><x-forms.table-input :name="'const_remove[' . $index . '][tkk_006]'" :value="$vConstRemove?->tkk_006" /></td>
                    <th>宅内撤去班連絡先</th><td>{{ $vConstRemove?->tkk_009 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th><td>{{ $vConstRemove?->rko_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th><td>{{ $vConstRemove?->mRko051?->val }}</td>
                    <th>時間指定有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][tkk_019]'" :value="$vConstRemove?->tkk_019" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mTkk019?->val }}@endif</td>
                    <th>枠外個別調整有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][tkk_020]'" :value="$vConstRemove?->tkk_020" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mTkk020?->val }}@endif</td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th><td>{{ $vConstRemove?->rko_055 }}</td>
                    <th>工事開始予定時刻区分</th><td>{{ $vConstRemove?->mRko056?->val }}</td>
                    <th>工事開始時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][rko_057]'" :value="$vConstRemove?->rko_057" />@else{{ $vConstRemove?->rko_057 }}@endif</td>
                    <th>工事完了時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][rko_058]'" :value="$vConstRemove?->rko_058" />@else{{ $vConstRemove?->rko_058 }}@endif</td>
                </tr>
                <tr>
                    <th>工事完了年月日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][rko_078]'" :value="$vConstRemove?->rko_078" />@else{{ $vConstRemove?->rko_078?->format('Y/m/d') }}@endif</td>
                    <th>工事完了区分</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][rko_077]'" :value="$vConstRemove?->rko_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mRko077?->val }}@endif</td>
                    <th>アポチェック日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_027]'" :value="$vConstRemove?->tkk_027" />@else{{ $vConstRemove?->tkk_027?->format('Y/m/d') }}@endif</td>
                    <th>アポ内容</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_028]'" :value="$vConstRemove?->tkk_028" />@else{{ $vConstRemove?->tkk_028 }}@endif</td>
                </tr>
                <tr>
                    <th>事前延期日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_018]'" :value="$vConstRemove?->tkk_018" /></td>
                    <th>宅内撤去延期日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_008]'" :value="$vConstRemove?->tkk_008" /></td>
                    <th>工事延期コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_remove[' . $index . '][rko_067]'" :value="$vConstRemove?->rko_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>全撤去理由コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'const_remove[' . $index . '][rko_071]'" :value="$vConstRemove?->rko_071" :options="$mRemovalReasonCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                </tr>
                <tr><th>全撤去理由詳細</th><td colspan="7" class="tw:!p-0"><x-forms.table-input :name="'const_remove[' . $index . '][tkk_012]'" :value="$vConstRemove?->tkk_012" /></td></tr>
                <tr><th>延期理由メモ</th><td colspan="7" class="tw:!p-0"><x-forms.table-textarea :name="'const_remove[' . $index . '][rko_068]'">{{ $vConstRemove?->rko_068 }}</x-forms.table-textarea></td></tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][rko_079]'" :value="$vConstRemove?->rko_079" />@else{{ $vConstRemove?->rko_079 }}@endif</td>
                </tr>
                <tr><th>残置ケーブル撤去備考</th><td colspan="7" class="tw:!p-0"><x-forms.table-input :name="'const_remove[' . $index . '][tkk_015]'" :value="$vConstRemove?->tkk_015" /></td></tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>完了報告書受領日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_010]'" :value="$vConstRemove?->tkk_010" />@else{{ $vConstRemove?->tkk_010?->format('Y/m/d') }}@endif</td>
                    <th>完了報告書送付日</th>
                    <td class="tw:!p-0"><x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_011]'" :value="$vConstRemove?->tkk_011" /></td>
                    <th>工事報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][rko_080]'" :value="$vConstRemove?->rko_080" />@else{{ $vConstRemove?->rko_080?->format('Y/m/d') }}@endif</td>
                    <th>竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][rko_081]'" :value="$vConstRemove?->rko_081" />@else{{ $vConstRemove?->rko_081?->format('Y/m/d') }}@endif</td>
                </tr>
                <tr>
                    <th>撤去竣工図書受領日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_021]'" :value="$vConstRemove?->tkk_021" />@else{{ $vConstRemove?->tkk_021?->format('Y/m/d') }}@endif</td>
                    <th>撤去竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_016]'" :value="$vConstRemove?->tkk_016" />@else{{ $vConstRemove?->tkk_016?->format('Y/m/d') }}@endif</td>
                    <th>撤去清算月</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_017]'" :value="$vConstRemove?->tkk_017" />@else{{ $vConstRemove?->tkk_017 }}@endif</td>
                    <th>工事種別（撤去）</th><td>{{ $vConstRemove?->tkk_026 }}</td>
                </tr>
                <tr>
                    <th>撤去遅延理由</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'const_remove[' . $index . '][tkk_029]'" :value="$vConstRemove?->tkk_029" :options="$mReasonDelayOptions" empty=" " class="tw:!w-full" />@else{{ $vConstRemove?->mTkk029?->val }}@endif</td>
                    <th>撤去遅延備考</th>
                    <td colspan="5" @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_030]'" :value="$vConstRemove?->tkk_030" />@else{{ $vConstRemove?->tkk_030 }}@endif</td>
                </tr>
                <tr>
                    <th>撤去竣工作成者</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'const_remove[' . $index . '][tkk_023]'" :value="$vConstRemove?->tkk_023" />@else{{ $vConstRemove?->tkk_023 }}@endif</td>
                    <th>竣工作成開始日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'const_remove[' . $index . '][tkk_024]'" :value="$vConstRemove?->tkk_024" />@else{{ $vConstRemove?->tkk_024?->format('Y/m/d') }}@endif</td>
                    <th>最終更新者</th><td>{{ $vConstRemove?->rko_120 }}</td>
                    <th>最終更新日時</th><td>{{ $vConstRemove?->rko_121?->format('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
