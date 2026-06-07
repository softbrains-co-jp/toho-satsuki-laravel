<div x-data="{ showDetail: false }" class="tw:flex tw:flex-col">
        @php
            $isToho = auth()->user()->is_toho;
        @endphp

        <table class="satsuki-table tw:w-full">
            <tr>
                <th>回線依頼番号</th>
                <td>{{ $vConstLine?->rke_019 }}</td>
                <th>外線工事付託日</th>
                <td>{{ $vConstLine?->gkj_002?->format('Y/m/d') }}</td>
                <th>工事完了年月日</th>
                <td>{{ $vConstLine?->rke_167?->format('Y/m/d') }}</td>
                <th>最終更新者</th>
                <td rowspan="2" class="tw:w-[138px] tw:!p-0 tw:align-middle tw:text-center">
                    <x-button.red type="button" class="tw:!h-[40px] tw:!w-full" x-show="!showDetail" @click="showDetail = true">詳細を表示</x-button.red>
                    <x-button.dark-gray type="button" class="tw:!h-[40px] tw:!w-full" x-show="showDetail" x-cloak @click="showDetail = false">詳細を非表示</x-button.dark-gray>
                </td>
            </tr>
            <tr>
                <th>外線工事日</th>
                <td>{{ $vConstLine?->rke_159?->format('Y/m/d') }}</td>
                <th>SPL接続工事日</th>
                <td>{{ $vConstLine?->rke_161?->format('Y/m/d') }}</td>
                <th>引込線工事日</th>
                <td>{{ $vConstLine?->rke_158?->format('Y/m/d') }}</td>
                <td>{{ $vConstLine?->rke_253 }}</td>
            </tr>
            <tr>
                <th>手配イベント区分</th>
                <td colspan="7">{{ $vConstLine?->rke_006 }}</td>
            </tr>
            <tr>
                <th>サービス名称</th>
                <td colspan="7">{{ $vConstLine?->rke_011 }}</td>
            </tr>
        </table>

        <table x-show="showDetail" x-cloak class="satsuki-table tw:w-full tw:mt-[-1px]">
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <th>外線工事付託日</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-input-date name="gkj_002" :value="$vConstLine?->gkj_002" />
                    @else
                        {{ $vConstLine?->gkj_002?->format('Y/m/d') }}
                    @endif
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <th>架線施工業者</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-select name="gkj_003" :value="$vConstLine?->gkj_003" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                    @else
                        {{ $vConstLine?->mGkj003?->val }}
                    @endif
                </td>
                <th>架線施工班</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="gkj_004" :value="$vConstLine?->gkj_004" />
                </td>
                <th>架設工事班連絡先</th>
                <td>{{ $vConstLine?->gkj_010 }}</td>
                <th>使用ケーブル数量</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="gkj_006" :value="$vConstLine?->gkj_006" />
                </td>
            </tr>
            <tr>
                <th>外線工事予定日</th>
                <td class="tw:!p-0">
                    <x-forms.table-input-date name="rke_160" :value="$vConstLine?->rke_160" />
                </td>
                <th>架設工事予定時間</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="gkj_005" :value="$vConstLine?->gkj_005" />
                </td>
                <th>外線工事日</th>
                <td class="tw:!p-0">
                    <x-forms.table-input-date name="rke_159" :value="$vConstLine?->rke_159" />
                </td>
                <th>架設ルート変更有無（外線）</th>
                <td class="tw:!p-0">
                    <x-forms.table-select name="gkj_012" :value="$vConstLine?->gkj_012" :options="$mRouteChangeOptions" empty=" " class="tw:!w-full" />
                </td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <th>接続施工業者</th>
                <td @class(['tw:!p-0' => $isToho])>
                    @if ($isToho)
                        <x-forms.table-select name="gkj_007" :value="$vConstLine?->gkj_007" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                    @else
                        {{ $vConstLine?->mGkj007?->val }}
                    @endif
                </td>
                <th>接続施工班</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="gkj_008" :value="$vConstLine?->gkj_008" />
                </td>
                <th>接続工事班連絡先</th>
                <td>{{ $vConstLine?->gkj_011 }}</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <th>SPL接続予定日</th>
                <td class="tw:!p-0">
                    <x-forms.table-input-date name="rke_162" :value="$vConstLine?->rke_162" />
                </td>
                <th>接続工事予定時間</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="gkj_009" :value="$vConstLine?->gkj_009" />
                </td>
                <th>SPL接続工事日</th>
                <td class="tw:!p-0">
                    <x-forms.table-input-date name="rke_161" :value="$vConstLine?->rke_161" />
                </td>
                <th>M/C開閉有無</th>
                <td class="tw:!p-0">
                    <x-forms.table-select name="rke_163" :value="$vConstLine?->rke_163" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
                </td>
            </tr>
            <tr>
                <th>M/C開閉電柱名称</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="rke_164" :value="$vConstLine?->rke_164" />
                </td>
                <th>SPL2名称</th>
                <td>{{ $vConstLine?->rke_089 }}</td>
                <th>SPL2収容電柱名称</th>
                <td>{{ $vConstLine?->rke_090 }}</td>
                <th>SPL2形状</th>
                <td>{{ $vConstLine?->mRke091?->val }}</td>
            </tr>
            <tr>
                <th>SPL2ポート番号</th>
                <td colspan="3">{{ $vConstLine?->rke_092 }}</td>
                <th>後２分岐専用ボックス名称</th>
                <td colspan="3">{{ $vConstLine?->rke_095 }}</td>
            </tr>
            <tr>
                <td colspan="8">&nbsp;</td>
            </tr>
            <tr>
                <th>引込線工事日</th>
                <td class="tw:!p-0">
                    <x-forms.table-input-date name="rke_158" :value="$vConstLine?->rke_158" />
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <th>架設/接続班長名</th>
                <td class="tw:!p-0">
                    <x-forms.table-input name="rke_165" :value="$vConstLine?->rke_165" />
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <th>最終更新者</th>
                <td>{{ $vConstLine?->rke_253 }}</td>
                <th>最終更新日時</th>
                <td>{{ $vConstLine?->rke_254 }}</td>
            </tr>
        </table>
</div>
