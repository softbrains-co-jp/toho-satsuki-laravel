<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
    @endphp

    @foreach ($houseConstList as $index => $vHouseConst)
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="house_const[{{ $index }}][rko_001]" value="{{ $vHouseConst?->rko_001 }}">
            <input type="hidden" name="house_const[{{ $index }}][rko_039]" value="{{ $vHouseConst?->rko_039 }}">
            <input type="hidden" name="house_const[{{ $index }}][rko_018]" value="{{ $vHouseConst?->rko_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $vHouseConst?->rko_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $vHouseConst?->rko_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $vHouseConst?->rko_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>工事付託日</th>
                    <td>{{ $vHouseConst?->kkk_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $vHouseConst?->rko_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $vHouseConst?->rko_032?->format('Y/m/d') }}</td>
                    <td>{{ $vHouseConst?->rko_120 }}</td>
                </tr>
            </table>

            <table x-show="showDetail" x-cloak class="satsuki-table tw:w-full tw:mt-[-1px]">
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事種別A</th>
                    <td>{{ $vHouseConst?->rko_041 }}</td>
                    <th>工事種別B</th>
                    <td>{{ $vHouseConst?->rko_042 }}</td>
                    <th>工事手配作成日</th>
                    <td>{{ $vHouseConst?->rko_030 }}</td>
                    <th>親店割当日時</th>
                    <td>{{ $vHouseConst?->rko_046 }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th>
                    <td>{{ $vHouseConst?->rko_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th>
                    <td>{{ $vHouseConst?->mRko104?->val }}</td>
                    <th>工事開始希望時刻</th>
                    <td>{{ $vHouseConst?->rko_105 }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th>
                    <td>{{ $vHouseConst?->rko_044 }}</td>
                    <th>子店割当日時</th>
                    <td>{{ $vHouseConst?->rko_047 }}</td>
                    <th>工事担当者コード1</th>
                    <td>{{ $vHouseConst?->rko_045 }}</td>
                    <th>担当者割当日時</th>
                    <td>{{ $vHouseConst?->rko_048 }}</td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>設置先住所コード</th>
                    <td>{{ $vHouseConst?->rko_018 }}</td>
                    <th>エリアコード</th>
                    <td>{{ $vHouseConst?->rko_019 }}</td>
                    <th>住居形態</th>
                    <td>{{ $vHouseConst?->mRko020?->val }}</td>
                    <th>住居所有区分</th>
                    <td>{{ $vHouseConst?->mRko021?->val }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th>
                    <td>{{ $vHouseConst?->mRko083?->val }}</td>
                    <th>開通同時ポータ有無</th>
                    <td>{{ $vHouseConst?->mRko090?->val }}</td>
                    <th>連絡指定日時</th>
                    <td>{{ $vHouseConst?->rko_099 }}</td>
                    <th>連絡可能時間帯</th>
                    <td>{{ $vHouseConst?->rko_100 }}</td>
                </tr>
                <tr>
                    <th>工事ステータス</th>
                    <td>{{ $vHouseConst?->mRko029?->val }}</td>
                    <th>未定延期フラグ</th>
                    <td>{{ $vHouseConst?->mRko052?->val }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>指定連絡先メモ</th>
                    <td colspan="7">{!! nl2br(e($vHouseConst?->rko_101 ?? '')) !!}</td>
                </tr>
                <tr>
                    <th>工事手配メモ</th>
                    <td colspan="7">{{ $vHouseConst?->rko_053 }}</td>
                </tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'house_const[' . $index . '][rko_054]'" :value="$vHouseConst?->rko_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th>
                    <td colspan="3" class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_072]'" :value="$vHouseConst?->rko_072" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>施工フェイズ<br>備考2（KDDI）</th>
                    <td colspan="3" class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_073]'" :value="$vHouseConst?->rko_073" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th>
                    <td colspan="3" class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_074]'" :value="$vHouseConst?->rko_074" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_075]'" :value="$vHouseConst?->rko_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_076]'" :value="$vHouseConst?->rko_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_const[' . $index . '][kkk_003]'" :value="$vHouseConst?->kkk_003" />
                        @else
                            {{ $vHouseConst?->kkk_003?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>宅内施工業者</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][kkk_005]'" :value="$vHouseConst?->kkk_005" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mKkk005?->val }}
                        @endif
                    </td>
                    <th>宅内施工班</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input :name="'house_const[' . $index . '][kkk_006]'" :value="$vHouseConst?->kkk_006" />
                    </td>
                    <th>宅内工事班連絡先</th>
                    <td>{{ $vHouseConst?->kkk_008 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th>
                    <td>{{ $vHouseConst?->rko_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th>
                    <td>{{ $vHouseConst?->mRko051?->val }}</td>
                    <th>時間指定有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][kkk_019]'" :value="$vHouseConst?->kkk_019" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                    <th>枠外個別調整有無</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][kkk_020]'" :value="$vHouseConst?->kkk_020" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                    </td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th>
                    <td>{{ $vHouseConst?->rko_055 }}</td>
                    <th>工事開始予定時刻区分</th>
                    <td>{{ $vHouseConst?->mRko056?->val }}</td>
                    <th>工事開始時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_057]'" :value="$vHouseConst?->rko_057" />
                        @else
                            {{ $vHouseConst?->rko_057 }}
                        @endif
                    </td>
                    <th>工事完了時刻</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_058]'" :value="$vHouseConst?->rko_058" />
                        @else
                            {{ $vHouseConst?->rko_058 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>工事完了年月日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_const[' . $index . '][rko_078]'" :value="$vHouseConst?->rko_078" />
                        @else
                            {{ $vHouseConst?->rko_078?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>宅内工事結果</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][kkk_011]'" :value="$vHouseConst?->kkk_011" :options="$mHouseConstResultOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mKkk011?->val }}
                        @endif
                    </td>
                    <th>工事完了区分</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][rko_077]'" :value="$vHouseConst?->rko_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mRko077?->val }}
                        @endif
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th>事前延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_const[' . $index . '][kkk_010]'" :value="$vHouseConst?->kkk_010" />
                    </td>
                    <th>工事延期日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_const[' . $index . '][kkk_009]'" :value="$vHouseConst?->kkk_009" />
                    </td>
                    <th>工事延期コード</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][rko_067]'" :value="$vHouseConst?->rko_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>延期理由メモ</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-textarea :name="'house_const[' . $index . '][rko_068]'">{{ $vHouseConst?->rko_068 }}</x-forms.table-textarea>
                    </td>
                </tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_079]'" :value="$vHouseConst?->rko_079" />
                        @else
                            {{ $vHouseConst?->rko_079 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>架設ルート変更有無（宅内）</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][kkk_014]'" :value="$vHouseConst?->kkk_014" :options="$mRouteChangeOptions" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <th>ケーブル接続方法</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][rko_060]'" :value="$vHouseConst?->rko_060" :options="$mCableConnectOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mRko060?->val }}
                        @endif
                    </td>
                    <th>スリーブ取付高</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_064]'" :value="$vHouseConst?->rko_064" />
                        @else
                            {{ $vHouseConst?->rko_064 }}
                        @endif
                    </td>
                    <th>直引き理由</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][rko_065]'" :value="$vHouseConst?->rko_065" :options="$mDirectReasonOptions" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mRko065?->val }}
                        @endif
                    </td>
                    <th>分界点受信レベル</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][kkk_012]'" :value="$vHouseConst?->kkk_012" />
                        @else
                            {{ $vHouseConst?->kkk_012 }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>宅内側ドロップケーブル長</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_061]'" :value="$vHouseConst?->rko_061" />
                        @else
                            {{ $vHouseConst?->rko_061 }}
                        @endif
                    </td>
                    <th>光コード長</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][rko_063]'" :value="$vHouseConst?->rko_063" :options="$mCodeLength1Options" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mRko063?->val }}
                        @endif
                    </td>
                    <th>ONU受信レベル</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input :name="'house_const[' . $index . '][rko_059]'" :value="$vHouseConst?->rko_059" />
                        @else
                            {{ $vHouseConst?->rko_059 }}
                        @endif
                    </td>
                    <th>HGW接続有無</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'house_const[' . $index . '][rko_066]'" :value="$vHouseConst?->rko_066" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                        @else
                            {{ $vHouseConst?->mRko066?->val }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>開通工事同時OP</th>
                    <td class="tw:!p-0">
                        <x-forms.table-select :name="'house_const[' . $index . '][kkk_015]'" :value="$vHouseConst?->kkk_015" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
                    </td>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
                <tr>
                    <th>完了報告書受領日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_const[' . $index . '][kkk_017]'" :value="$vHouseConst?->kkk_017" />
                    </td>
                    <th>完了報告書送付日</th>
                    <td class="tw:!p-0">
                        <x-forms.table-input-date :name="'house_const[' . $index . '][kkk_018]'" :value="$vHouseConst?->kkk_018" />
                    </td>
                    <th>工事報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_const[' . $index . '][rko_080]'" :value="$vHouseConst?->rko_080" />
                        @else
                            {{ $vHouseConst?->rko_080?->format('Y/m/d') }}
                        @endif
                    </td>
                    <th>竣工報告日</th>
                    <td @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-input-date :name="'house_const[' . $index . '][rko_081]'" :value="$vHouseConst?->rko_081" />
                        @else
                            {{ $vHouseConst?->rko_081?->format('Y/m/d') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <th>最終更新者</th>
                    <td>{{ $vHouseConst?->rko_120 }}</td>
                    <th>最終更新日時</th>
                    <td>{{ $vHouseConst?->rko_121?->format('Y/m/d H:i:s') }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
