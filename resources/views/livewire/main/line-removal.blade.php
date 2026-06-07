<div>
    @php
        $isToho = auth()->user()->is_toho;
    @endphp

    <div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
        <table class="satsuki-table tw:w-full">
            <tr>
                <th>回線依頼番号</th>
                <td>{{ $vLineRemoval?->rke_019 }}</td>
                <th>外線撤去付託日</th>
                <td>{{ $vLineRemoval?->gtj_002?->format('Y/m/d') }}</td>
                <th>工事完了年月日</th>
                <td>{{ $vLineRemoval?->rke_265?->format('Y/m/d') }}</td>
                <th>最終更新者</th>
                <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                    <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                    <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                </td>
            </tr>
            <tr>
                <th>外線撤去撤去日</th>
                <td>{{ $vLineRemoval?->rke_257?->format('Y/m/d') }}</td>
                <th>SPL接続処理日</th>
                <td>{{ $vLineRemoval?->rke_259?->format('Y/m/d') }}</td>
                <th>引込線撤去日</th>
                <td>{{ $vLineRemoval?->rke_256?->format('Y/m/d') }}</td>
                <td>{{ $vLineRemoval?->rke_253 }}</td>
            </tr>
            <tr>
                <th>手配イベント区分</th>
                <td colspan="7">{{ $vLineRemoval?->rke_006 }}</td>
            </tr>
            <tr>
                <th>サービス名称</th>
                <td colspan="7">{{ $vLineRemoval?->rke_011 }}</td>
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
                <th>外線撤去付託日</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-input-date :name="'line_removal[gtj_002]'" :value="$vLineRemoval?->gtj_002" />
                    @else
                        {{ $vLineRemoval?->gtj_002?->format('Y/m/d') }}
                    @endif
                </td>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th>外線撤去業者</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-select :name="'line_removal[gtj_003]'" :value="$vLineRemoval?->gtj_003" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                    @else
                        {{ $vLineRemoval?->mGtj003?->val }}
                    @endif
                </td>
                <th>外線撤去班</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[gtj_004]'" :value="$vLineRemoval?->gtj_004" /></td>
                <th>架設撤去班連絡先</th>
                <td>{{ $vLineRemoval?->gtj_010 }}</td>
                <th>撤去ケーブル長</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[gtj_006]'" :value="$vLineRemoval?->gtj_006" /></td>
            </tr>
            <tr>
                <th>外線撤去予定日</th>
                <td class="tw:!p-0"><x-forms.table-input-date :name="'line_removal[rke_258]'" :value="$vLineRemoval?->rke_258" /></td>
                <th>外線撤去予定時間</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[gtj_005]'" :value="$vLineRemoval?->gtj_005" /></td>
                <th>外線撤去日</th>
                <td class="tw:!p-0"><x-forms.table-input-date :name="'line_removal[rke_257]'" :value="$vLineRemoval?->rke_257" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr><td colspan="8">&nbsp;</td></tr>
            <tr>
                <th>接続処理業者</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-select :name="'line_removal[gtj_007]'" :value="$vLineRemoval?->gtj_007" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                    @else
                        {{ $vLineRemoval?->mGtj007?->val }}
                    @endif
                </td>
                <th>接続処理班</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[gtj_008]'" :value="$vLineRemoval?->gtj_008" /></td>
                <th>接続処理班連絡先</th>
                <td>{{ $vLineRemoval?->gtj_011 }}</td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <th>SPL接続処理予定日</th>
                <td class="tw:!p-0"><x-forms.table-input-date :name="'line_removal[rke_260]'" :value="$vLineRemoval?->rke_260" /></td>
                <th>接続処理予定時間</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[gtj_009]'" :value="$vLineRemoval?->gtj_009" /></td>
                <th>SPL接続処理日</th>
                <td class="tw:!p-0"><x-forms.table-input-date :name="'line_removal[rke_259]'" :value="$vLineRemoval?->rke_259" /></td>
                <th>M/C開閉有無</th>
                <td class="tw:!p-0">
                    <x-forms.table-select :name="'line_removal[rke_261]'" :value="$vLineRemoval?->rke_261" :options="$mExistence1Options" empty=" " class="tw:!w-full tw:!h-[40px]" />
                </td>
            </tr>
            <tr>
                <th>M/C開閉電柱名称</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[rke_262]'" :value="$vLineRemoval?->rke_262" /></td>
                <th>SPL2名称</th>
                <td>{{ $vLineRemoval?->rke_089 }}</td>
                <th>SPL2収容電柱名称</th>
                <td>{{ $vLineRemoval?->rke_090 }}</td>
                <th>SPL2形状</th>
                <td>{{ $vLineRemoval?->mRke091?->val }}</td>
            </tr>
            <tr>
                <th>SPL2ポート番号</th>
                <td colspan="3">{{ $vLineRemoval?->rke_092 }}</td>
                <th>後２分岐専用ボックス名称</th>
                <td colspan="3">{{ $vLineRemoval?->rke_095 }}</td>
            </tr>
            <tr><td colspan="8">&nbsp;</td></tr>
            <tr>
                <th>引込線撤去日</th>
                <td class="tw:!p-0"><x-forms.table-input-date :name="'line_removal[rke_256]'" :value="$vLineRemoval?->rke_256" /></td>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th>架設撤去<br>接続処理班長名</th>
                <td class="tw:!p-0"><x-forms.table-input :name="'line_removal[rke_263]'" :value="$vLineRemoval?->rke_263" /></td>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
                <th>最終更新者</th>
                <td>{{ $vLineRemoval?->rke_253 }}</td>
                <th>最終更新日時</th>
                <td>{{ $vLineRemoval?->rke_254?->format('Y/m/d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
