<div class="tw:flex tw:flex-col tw:gap-y-5">
    @php
        $isToho = auth()->user()->is_toho;
        $br = fn ($value) => nl2br(e($value ?? ''));
        $fmt = fn ($value, $format = 'Y/m/d') => $value instanceof \Carbon\CarbonInterface ? $value->format($format) : $value;
    @endphp

    @foreach ($setupRushList as $index => $rkk)
        @php
            $ktk = $rkk?->tKtk;
        @endphp
        <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
            <input type="hidden" name="setup_rush[{{ $index }}][rkk_001]" value="{{ $rkk?->rkk_001 }}">
            <input type="hidden" name="setup_rush[{{ $index }}][rkk_039]" value="{{ $rkk?->rkk_039 }}">
            <input type="hidden" name="setup_rush[{{ $index }}][rkk_018]" value="{{ $rkk?->rkk_018 }}">

            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>回線依頼番号</th>
                    <td>{{ $rkk?->rkk_039 }}</td>
                    <th>工事手配コード</th>
                    <td>{{ $rkk?->rkk_001 }}</td>
                    <th>工事手配日</th>
                    <td>{{ $rkk?->rkk_031?->format('Y/m/d') }}</td>
                    <th>最終更新者</th>
                    <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                        <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                        <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                    </td>
                </tr>
                <tr>
                    <th>かけつけ設定付託日</th>
                    <td>{{ $ktk?->ktk_003?->format('Y/m/d') }}</td>
                    <th>確定工事日</th>
                    <td>{{ $rkk?->rkk_049?->format('Y/m/d') }}</td>
                    <th>工事取消日</th>
                    <td>{{ $rkk?->rkk_032?->format('Y/m/d') }}</td>
                    <td>{{ $rkk?->rkk_226 }}</td>
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
                    <th>工事種別A</th><td>{{ $rkk?->rkk_041 }}</td>
                    <th>工事種別B</th><td>{{ $rkk?->rkk_042 }}</td>
                    <th>工事手配作成日</th><td>{{ $rkk?->rkk_030?->format('Y/m/d H:i:s') }}</td>
                    <th>親店割当日時</th><td>{{ $rkk?->rkk_046?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>工事希望日</th><td>{{ $rkk?->rkk_103?->format('Y/m/d') }}</td>
                    <th>工事希望日区分</th><td>{{ $mConstHopeOptions[$rkk?->rkk_104] ?? '' }}</td>
                    <th>工事開始希望時刻</th><td>{{ $rkk?->rkk_105 }}</td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事会社（子店）コード</th><td>{{ $rkk?->rkk_044 }}</td>
                    <th>子店割当日時</th><td>{{ $rkk?->rkk_047?->format('Y/m/d H:i:s') }}</td>
                    <th>工事担当者コード1</th><td>{{ $rkk?->rkk_045 }}</td>
                    <th>担当者割当日時</th><td>{{ $rkk?->rkk_048?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>設置先住所コード</th><td>{{ $rkk?->rkk_018 }}</td>
                    <th>エリアコード</th><td>{{ $rkk?->rkk_019 }}</td>
                    <th>住居形態</th><td>{{ $mHouseStyleOptions[$rkk?->rkk_020] ?? '' }}</td>
                    <th>住居所有区分</th><td>{{ $mHouseOwnershipOptions[$rkk?->rkk_021] ?? '' }}</td>
                </tr>
                <tr>
                    <th>顧客区分</th><td>{{ $mCustomerOptions[$rkk?->rkk_083] ?? '' }}</td>
                    <th>連絡指定日時</th><td>{{ $rkk?->rkk_099?->format('Y/m/d H:i:s') }}</td>
                    <th>連絡可能時間帯</th><td>{{ $rkk?->rkk_100 }}</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事ステータス</th><td>{{ $mConstStatusOptions[$rkk?->rkk_029] ?? '' }}</td>
                    <th>未定延期フラグ</th><td>{{ $mUndecidedDelayOptions[$rkk?->rkk_052] ?? '' }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr><th>指定連絡先メモ</th><td colspan="7">{!! $br($rkk?->rkk_101) !!}</td></tr>
                <tr><th>工事手配メモ</th><td colspan="7">{{ $rkk?->rkk_053 }}</td></tr>
                <tr>
                    <th>工事手配メモ<br>（工事会社用）</th>
                    <td colspan="7" class="tw:!p-0">
                        <x-forms.table-input :name="'setup_rush[' . $index . '][rkk_054]'" :value="$rkk?->rkk_054" class="tw:!h-[40px]" />
                    </td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考1（KDDI）</th><td colspan="3">{{ $mConstPhaseNoteOptions[$rkk?->rkk_072] ?? '' }}</td>
                    <th>施工フェイズ<br>備考2（KDDI）</th><td colspan="3">{{ $mConstPhaseNoteOptions[$rkk?->rkk_073] ?? '' }}</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考3（KDDI）</th><td colspan="3">{{ $mConstPhaseNoteOptions[$rkk?->rkk_074] ?? '' }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>施工フェイズ<br>備考4（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'setup_rush[' . $index . '][rkk_075]'" :value="$rkk?->rkk_075" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $mConstPhaseNoteOptions[$rkk?->rkk_075] ?? '' }}
                        @endif
                    </td>
                    <th>施工フェイズ<br>備考5（工事会社）</th>
                    <td colspan="3" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-select :name="'setup_rush[' . $index . '][rkk_076]'" :value="$rkk?->rkk_076" :options="$mConstPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                        @else
                            {{ $mConstPhaseNoteOptions[$rkk?->rkk_076] ?? '' }}
                        @endif
                    </td>
                </tr>
                <tr><th>申込書備考欄</th><td colspan="7">{!! $br($rkk?->rkk_128) !!}</td></tr>
                <tr><th>特記事項1（KDDI）</th><td colspan="7">{!! $br($rkk?->rkk_129) !!}</td></tr>
                <tr>
                    <th>記事欄</th>
                    <td colspan="7" class="tw:!p-0"><x-forms.table-textarea :name="'setup_rush[' . $index . '][rkk_153]'">{{ $rkk?->rkk_153 }}</x-forms.table-textarea></td>
                </tr>
                <tr><th>宅内工事メモ</th><td colspan="7">{!! $br($rkk?->rkk_154) !!}</td></tr>
                <tr>
                    <th>履歴メモ</th>
                    <td colspan="7" class="tw:!p-0"><x-forms.table-input :name="'setup_rush[' . $index . '][rkk_151]'" :value="$rkk?->rkk_151" /></td>
                </tr>
                <tr>
                    <th>キャンペーン申込日</th><td>{{ $ktk?->ktk_016?->format('Y/m/d') }}</td>
                    <th>キャンペーン申込年月日</th><td>{{ $rkk?->rkk_164?->format('Y/m/d') }}</td>
                    <th>初回かけつけフラグ</th><td>{{ $mFirstRushOptions[$rkk?->rkk_106] ?? '' }}</td>
                    <th>女性かけつけ希望</th><td>{{ $mExistence1Options[$rkk?->rkk_107] ?? '' }}</td>
                </tr>
                <tr>
                    <th>キャンペーン内容</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-textarea :name="'setup_rush[' . $index . '][ktk_017]'">{{ $ktk?->ktk_017 }}</x-forms.table-textarea>
                        @else
                            {!! $br($ktk?->ktk_017) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>安心トータルサポート／おうちどこでもWi-Fi申込有無</th><td>{{ $rkk?->rkk_193 }}</td>
                    <th>安心トータルサポートサービス契約日</th><td>{{ $rkk?->rkk_194?->format('Y/m/d') }}</td>
                    <th>安心トータルサポートサービス解約日</th><td>{{ $rkk?->rkk_195?->format('Y/m/d') }}</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>サービス提供ID(NET)</th><td>{{ $rkk?->rkk_136 }}</td>
                    <th>サービス提供ID(TEL1)</th><td>{{ $rkk?->rkk_137 }}</td>
                    <th>サービス提供ID(TEL2)</th><td>{{ $rkk?->rkk_138 }}</td>
                    <th>サービス提供ID(TV)</th><td>{{ $rkk?->rkk_139 }}</td>
                </tr>
                <tr>
                    <th>ポーター有無</th><td>{{ $mExistence1Options[$rkk?->rkk_124] ?? '' }}</td>
                    <th>電話サービス電話番号1</th><td>{{ $rkk?->rkk_141 }}</td>
                    <th>電話サービス電話番号2</th><td>{{ $rkk?->rkk_142 }}</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>アポイント付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_020]'" :value="$ktk?->ktk_020" />@else{{ $ktk?->ktk_020?->format('Y/m/d') }}@endif</td>
                    <th>次回アポ予定日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_015]'" :value="$ktk?->ktk_015" />@else{{ $ktk?->ktk_015?->format('Y/m/d') }}@endif</td>
                    <th>連絡希望曜日</th><td>{{ $rkk?->rkk_135 }}</td>
                    <td>&nbsp;</td><td>&nbsp;</td>
                </tr>
                <tr>
                    <th>工事→アポイント引継ぎ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>
                        @if ($isToho)
                            <x-forms.table-textarea :name="'setup_rush[' . $index . '][ktk_018]'">{{ $ktk?->ktk_018 }}</x-forms.table-textarea>
                        @else
                            {!! $br($ktk?->ktk_018) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>かけつけ設定付託日</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_003]'" :value="$ktk?->ktk_003" />@else{{ $ktk?->ktk_003?->format('Y/m/d') }}@endif</td>
                    <th>かけつけ設定実施業者</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][ktk_004]'" :value="$ktk?->ktk_004" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />@else{{ $mMerchantOptions[$ktk?->ktk_004] ?? '' }}@endif</td>
                    <th>かけつけ設定実施班</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'setup_rush[' . $index . '][ktk_005]'" :value="$ktk?->ktk_005" />@else{{ $ktk?->ktk_005 }}@endif</td>
                    <th>かけつけ設定実施班連絡先</th><td>{{ $ktk?->ktk_006 }}</td>
                </tr>
                <tr>
                    <th>確定工事日</th><td>{{ $rkk?->rkk_049?->format('Y/m/d') }}</td>
                    <th>割当時間帯</th><td>{{ $mAllocationTimeOptions[$rkk?->rkk_051] ?? '' }}</td>
                    <th>時間指定有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][ktk_013]'" :value="$ktk?->ktk_013" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $mExistence2Options[$ktk?->ktk_013] ?? '' }}@endif</td>
                    <th>枠外個別調整有無</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][ktk_014]'" :value="$ktk?->ktk_014" :options="$mExistence2Options" empty=" " class="tw:!w-full" />@else{{ $mExistence2Options[$ktk?->ktk_014] ?? '' }}@endif</td>
                </tr>
                <tr>
                    <th>工事開始予定時刻</th><td>{{ $rkk?->rkk_055 }}</td>
                    <th>工事開始予定時刻区分</th><td>{{ $mConstStartTimeOptions[$rkk?->rkk_056] ?? '' }}</td>
                    <th>工事終了予定時刻</th><td class="tw:!p-0"><x-forms.table-input :name="'setup_rush[' . $index . '][rkk_156]'" :value="$rkk?->rkk_156" /></td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事開始時刻</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'setup_rush[' . $index . '][rkk_057]'" :value="$rkk?->rkk_057" />@else{{ $rkk?->rkk_057 }}@endif</td>
                    <th>工事完了時刻</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'setup_rush[' . $index . '][rkk_058]'" :value="$rkk?->rkk_058" />@else{{ $rkk?->rkk_058 }}@endif</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事完了年月日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][rkk_078]'" :value="$rkk?->rkk_078" />@else{{ $rkk?->rkk_078?->format('Y/m/d') }}@endif</td>
                    <th>工事完了区分</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][rkk_077]'" :value="$rkk?->rkk_077" :options="$mConstCompletionOptions" empty=" " class="tw:!w-full" />@else{{ $mConstCompletionOptions[$rkk?->rkk_077] ?? '' }}@endif</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>事前延期日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_010]'" :value="$ktk?->ktk_010" />@else{{ $ktk?->ktk_010?->format('Y/m/d') }}@endif</td>
                    <th>かけつけ設定延期日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_009]'" :value="$ktk?->ktk_009" />@else{{ $ktk?->ktk_009?->format('Y/m/d') }}@endif</td>
                    <th>工事延期コード</th><td class="tw:!p-0"><x-forms.table-select :name="'setup_rush[' . $index . '][rkk_067]'" :value="$rkk?->rkk_067" :options="$mConstDelayCodeOptions" empty=" " class="tw:!w-full" /></td>
                    <th>指定連絡先</th><td class="tw:!p-0"><x-forms.table-input :name="'setup_rush[' . $index . '][rkk_134]'" :value="$rkk?->rkk_134" /></td>
                </tr>
                <tr><th>延期理由メモ</th><td colspan="7" class="tw:!p-0"><x-forms.table-textarea :name="'setup_rush[' . $index . '][rkk_068]'">{{ $rkk?->rkk_068 }}</x-forms.table-textarea></td></tr>
                <tr>
                    <th>工事結果理由</th>
                    <td class="tw:!p-0"><x-forms.table-select :name="'setup_rush[' . $index . '][rkk_155]'" :value="$rkk?->rkk_155" :options="$mConstResultReasonOptions" empty=" " class="tw:!w-full" /></td>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <th>工事結果理由メモ</th>
                    <td colspan="7" @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'setup_rush[' . $index . '][rkk_079]'" :value="$rkk?->rkk_079" />@else{{ $rkk?->rkk_079 }}@endif</td>
                </tr>
                <tr>
                    <th>完了報告書受領日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_007]'" :value="$ktk?->ktk_007" />@else{{ $ktk?->ktk_007?->format('Y/m/d') }}@endif</td>
                    <th>完了報告書送付日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][ktk_008]'" :value="$ktk?->ktk_008" />@else{{ $ktk?->ktk_008?->format('Y/m/d') }}@endif</td>
                    <th>工事報告日</th><td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input-date :name="'setup_rush[' . $index . '][rkk_080]'" :value="$rkk?->rkk_080" />@else{{ $rkk?->rkk_080?->format('Y/m/d') }}@endif</td>
                    <th>工事完了報告日</th><td>{{ $rkk?->rkk_157?->format('Y/m/d') }}</td>
                </tr>
                <tr>
                    <th>かけつけ設定精算月</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-input :name="'setup_rush[' . $index . '][ktk_012]'" :value="$ktk?->ktk_012" />@else{{ $ktk?->ktk_012 }}@endif</td>
                    <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <th>最終更新者</th><td>{{ $rkk?->rkk_226 }}</td>
                    <th>最終更新日時</th><td>{{ $rkk?->rkk_227?->format('Y/m/d H:i:s') }}</td>
                </tr>
                <tr><td colspan="8">&nbsp;</td></tr>
                <tr>
                    <th>足回り種別</th><td colspan="3">{{ $rkk?->rkk_225 }}</td>
                    <th>進捗ステータス</th><td class="tw:!p-0"><x-forms.table-select :name="'setup_rush[' . $index . '][rkk_152]'" :value="$rkk?->rkk_152" :options="$mProgressStatusOptions" empty=" " class="tw:!w-full" /></td>
                    <td colspan="2">&nbsp;</td>
                </tr>

                @php
                    $rows = [
                        [['基本契約番号', $rkk?->rkk_120], ['集約情報ID', $rkk?->rkk_125], ['申込情報ID', $rkk?->rkk_126], ['既存契約情報', $rkk?->rkk_127]],
                        [['基本契約ステータス', $rkk?->rkk_144], ['基本契約登録年月日', $fmt($rkk?->rkk_145)], ['一次確定日', $fmt($rkk?->rkk_159)], ['精算確定日', $fmt($rkk?->rkk_160)]],
                        [['ＫＤＤＩ回線番号（Ｒ番）', $rkk?->rkk_119], ['利用状況調査有無', $mExistence1Options[$rkk?->rkk_123] ?? ''], ['', ''], ['', '']],
                        [['メール', $rkk?->rkk_131, 3], ['アドレス区分', $rkk?->rkk_132, 3]],
                        [['通停情報', $mStopInformationOptions[$rkk?->rkk_133] ?? ''], ['', '', 6]],
                        [['顧客住所', $rkk?->rkk_130, 3], ['', '', 4]],
                        [['物件名', $rkk?->rkk_146, 3], ['マンション回線タイプ', $rkk?->rkk_140], ['UR・民間', $mUrPrivateOptions[$rkk?->rkk_148] ?? '']],
                        [['棟名称', $rkk?->rkk_147, 3], ['引込棟番号', $rkk?->rkk_149], ['引込棟構成', $mDrawConstOptions[$rkk?->rkk_150] ?? '']],
                        [['かけつけ手配No', $rkk?->rkk_161], ['かけつけ種別', $rkk?->rkk_162, 2], ['', '', 3]],
                        [['かけつけ先郵便番号', $rkk?->rkk_180], ['かけつけ先住所コード', $rkk?->rkk_181], ['', ''], ['かけつけ手配', $rkk?->rkk_163, 2]],
                        [['かけつけ先住所<br>(都道府県)', $rkk?->rkk_182], ['かけつけ先住所<br>（市区町村）', $rkk?->rkk_183, 2], ['かけつけ先住所<br>(町大字)', $rkk?->rkk_184, 2]],
                        [['かけつけ先住所<br>（丁目）', $rkk?->rkk_185], ['かけつけ先住所<br>（番地）', $rkk?->rkk_186], ['', '', 4]],
                        [['かけつけ先住所<br>（マンション・フロア名）', $rkk?->rkk_187, 3], ['かけつけ先住所<br>（部屋番号）', $rkk?->rkk_188, 2], ['', '']],
                        [['かけつけ先氏名（漢字）', $rkk?->rkk_189], ['かけつけ先氏名（カナ）', $rkk?->rkk_190], ['かけつけ先電話番号（１）', $rkk?->rkk_191], ['かけつけ先電話番号（２）', $rkk?->rkk_192]],
                    ];
                @endphp
                @foreach ($rows as $row)
                    <tr>
                        @foreach ($row as $cell)
                            @if (($cell[0] ?? '') !== '')
                                <th>{!! $cell[0] !!}</th>
                            @endif
                            <td colspan="{{ $cell[2] ?? 1 }}">{{ $cell[1] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach

                <tr>
                    <th>工事立会お客様名</th>
                    <td class="tw:!p-0"><x-forms.table-input :name="'setup_rush[' . $index . '][rkk_158]'" :value="$rkk?->rkk_158" /></td>
                    <td colspan="6">&nbsp;</td>
                </tr>

                @php
                    $dateRows = [
                        [['課金開始日<br>(アクセス回線)', $fmt($rkk?->rkk_165)], ['解約日<br>(アクセス回線)', $fmt($rkk?->rkk_166)], ['キャンペーン申込年月日<br>(アクセス回線)', $fmt($rkk?->rkk_167)], ['', '', 2]],
                        [['課金開始日<br>(NET)', $fmt($rkk?->rkk_168)], ['解約日<br>(NET)', $fmt($rkk?->rkk_169)], ['キャンペーン申込年月日<br>(NET)', $fmt($rkk?->rkk_170)], ['', '', 2]],
                        [['課金開始日<br>(TEL1)', $fmt($rkk?->rkk_171)], ['解約日<br>(TEL1)', $fmt($rkk?->rkk_172)], ['キャンペーン申込年月日<br>(TEL1)', $fmt($rkk?->rkk_173)], ['', '', 2]],
                        [['課金開始日<br>(TEL2)', $fmt($rkk?->rkk_174)], ['解約日<br>(TEL2)', $fmt($rkk?->rkk_175)], ['キャンペーン申込年月日<br>(TEL2)', $fmt($rkk?->rkk_176)], ['', '', 2]],
                        [['課金開始日<br>(TV)', $fmt($rkk?->rkk_177)], ['解約日<br>(TV)', $fmt($rkk?->rkk_178)], ['キャンペーン申込年月日<br>(TV)', $fmt($rkk?->rkk_179)], ['', '', 2]],
                        [['', ''], ['初回訪問設置フラグ<br>(au HOME)', $mFirstRushOptions[$rkk?->rkk_231] ?? ''], ['キャンペーン申込年月日<br>(au HOME)', $fmt($rkk?->rkk_229)], ['', '', 2]],
                    ];
                @endphp
                @foreach ($dateRows as $row)
                    <tr>
                        @foreach ($row as $cell)
                            @if (($cell[0] ?? '') !== '')
                                <th>{!! $cell[0] !!}</th>
                            @else
                                <th></th>
                            @endif
                            <td colspan="{{ $cell[2] ?? 1 }}">{{ $cell[1] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach

                <tr>
                    <th>機器手配依頼番号<br>（オールインワン端末１）</th><td>{{ $rkk?->rkk_110 }}</td>
                    <th>機器手配依頼番号<br>（オールインワン端末２）</th><td>{{ $rkk?->rkk_111 }}</td>
                    <th>機器手配依頼番号<br>（オールインワン端末３）</th><td>{{ $rkk?->rkk_121 }}</td>
                    <th>機器手配依頼番号<br>（オールインワン端末４）</th><td>{{ $rkk?->rkk_122 }}</td>
                </tr>
                <tr>
                    <th>機器手配依頼番号<br>（Ｕ－ＡＤＰ）</th><td>{{ $rkk?->rkk_112 }}</td>
                    <th>機器手配依頼番号<br>（バックアップ機器）</th><td>{{ $rkk?->rkk_113 }}</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <th>基本PC-OS</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][rkk_108]'" :value="$rkk?->rkk_108" :options="$mBasicPcOsOptions" empty=" " class="tw:!w-full" />@else{{ $mBasicPcOsOptions[$rkk?->rkk_108] ?? '' }}@endif</td>
                    <th>無線LAN設定希望</th>
                    <td @class(['tw:!p-0' => $isToho])>@if ($isToho)<x-forms.table-select :name="'setup_rush[' . $index . '][rkk_109]'" :value="$rkk?->rkk_109" :options="$mWlanSetupHopeOptions" empty=" " class="tw:!w-full" />@else{{ $mWlanSetupHopeOptions[$rkk?->rkk_109] ?? '' }}@endif</td>
                    <th>端末種別</th><td>{{ $mTerminalOptions[$rkk?->rkk_114] ?? '' }}</td>
                    <th>端末台数</th><td>{{ $rkk?->rkk_115 }}</td>
                </tr>
                <tr>
                    <th>音声有無</th><td>{{ $mExistence1Options[$rkk?->rkk_116] ?? '' }}</td>
                    <th>Ｕ－ＡＤＰ有無</th><td>{{ $mExistence1Options[$rkk?->rkk_117] ?? '' }}</td>
                    <th>バックアップ機器有無</th><td>{{ $mExistence1Options[$rkk?->rkk_118] ?? '' }}</td>
                    <th>LANカード・ボード設定<br>要否</th><td>{{ $mNecessity2Options[$rkk?->rkk_102] ?? '' }}</td>
                </tr>
                <tr>
                    <th>1契約電話2本</th><td>{{ $mOneContractTwoPhoneOptions[$rkk?->rkk_143] ?? '' }}</td>
                    <th>BSデジタル放送サービス<br>申込有無</th><td>{{ $mExistence1Options[$rkk?->rkk_196] ?? '' }}</td>
                    <th>放送サービス視聴有無</th><td>{{ $mExistence1Options[$rkk?->rkk_197] ?? '' }}</td>
                    <th>TTS伝票番号</th><td>{{ $rkk?->rkk_199 }}</td>
                </tr>

                @php
                    $tailRows = [
                        [['顧客紐付管理ID', $rkk?->rkk_200], ['報告書受領日', $fmt($rkk?->rkk_201)], ['', '', 4]],
                        [['回線申請依頼番号', $rkk?->rkk_205], ['回線ID', $rkk?->rkk_206], ['NTTシステム取消', $rkk?->rkk_209], ['初回稼動確保日', $fmt($rkk?->rkk_210)]],
                        [['取消発生フラグ', $mCancelOccurOptions[$rkk?->rkk_211] ?? ''], ['オーナー了承有無フラグ', $mOwnerAgreeOptions[$rkk?->rkk_212] ?? ''], ['電話種別', $rkk?->rkk_213], ['KDDI_現地調査完了日', $fmt($rkk?->rkk_214)]],
                        [['確定工事日（暫定）', $fmt($rkk?->rkk_215)], ['同時工事スキーム', $mConstSchemeOptions[$rkk?->rkk_216] ?? ''], ['', '', 4]],
                        [['GC局名1', $rkk?->rkk_217, 3], ['GC局名（確定）', $rkk?->rkk_218, 3]],
                        [['GC局名（申請用）', $rkk?->rkk_219, 3], ['', '', 4]],
                        [['開通工事ステータス', $rkk?->rkk_220], ['工事予定時間帯', $rkk?->rkk_221], ['NTT確定工事日', $fmt($rkk?->rkk_222)], ['NTT確定工事日_受領日時', $rkk?->rkk_223]],
                        [['オプション工事有無<br>フラグ', $mExistence1Options[$rkk?->rkk_224] ?? ''], ['', '', 6]],
                    ];
                @endphp
                @foreach ($tailRows as $row)
                    <tr>
                        @foreach ($row as $cell)
                            @if (($cell[0] ?? '') !== '')
                                <th>{!! $cell[0] !!}</th>
                            @endif
                            <td colspan="{{ $cell[2] ?? 1 }}">{{ $cell[1] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach

                <tr><th>かけつけ記事欄</th><td colspan="7">{!! $br($rkk?->rkk_198) !!}</td></tr>
                <tr><th>訪問設置記事欄</th><td colspan="7">{!! $br($rkk?->rkk_230) !!}</td></tr>
                <tr><th>保守_鍵情報</th><td colspan="7">{!! $br($rkk?->rkk_202) !!}</td></tr>
                <tr><th>保守_宅内共通特殊情報</th><td colspan="7">{!! $br($rkk?->rkk_203) !!}</td></tr>
                <tr><th>保守_その他情報</th><td colspan="7">{!! $br($rkk?->rkk_204) !!}</td></tr>
                <tr><th>次回架電メモ</th><td colspan="7">{!! $br($rkk?->rkk_207) !!}</td></tr>
                <tr><th>現地調査メモ</th><td colspan="7">{!! $br($rkk?->rkk_208) !!}</td></tr>
            </table>
        </div>
    @endforeach
</div>
