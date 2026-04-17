<div>
    @php
        $isToho = auth()->user()->is_toho;
        $gck = $tRke?->tGck;
        $khj = $tRke?->tKhj;
    @endphp
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>外線調査付託日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="gck_002" :value="$gck?->gck_002" />
                @else
                    {{ $gck?->gck_002?->format('Y/m/d') }}
                @endif
            </td>
            <th>外線調査業者</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_003" :value="$gck?->gck_003" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck003?->val }}
                @endif
            </td>
            <th>外線調査班</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_004" :value="$gck?->gck_004" />
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>外線/外観調査開始日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_077" :value="$tRke?->rke_077" />
                @else
                    {{ $tRke?->rke_077?->format('Y/m/d') }}
                @endif
            </td>
            <th>外線/外観調査完了日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_078" :value="$tRke?->rke_078" />
                @else
                    {{ $tRke?->rke_078?->format('Y/m/d') }}
                @endif
            </td>
            <th>外観調査報告日</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="gck_009" :value="$gck?->gck_009" />
            </td>
            <th>可否報告日</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="gck_025" :value="$gck?->gck_025" />
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>道路区分</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_124" :value="$tRke?->rke_124" :options="$mRoadOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>国道作業</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_006" :value="$khj?->khj_006" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>都道作業</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_007" :value="$khj?->khj_007" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>道路横断有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_024" :value="$khj?->khj_024" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <th>苦情エリア区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_123" :value="$tRke?->rke_123" :options="$mClaimAreaOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $tRke?->mRke123?->val }}
                @endif
            </td>
            <th>クレーム判定</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_009" :value="$khj?->khj_009" :options="$mClaimJudgeOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>ＮＴＴ小柱</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_008" :value="$khj?->khj_008" :options="$mNttColumnarOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>サービス種別</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_026" :value="$gck?->gck_026" :options="$mServiceOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck026?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>外調引込フラグ</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_011" :value="$gck?->gck_011" :options="$mControlDrawOptions" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>旧回線依頼番号</th>
            <td>{{ $tRke?->rke_021 }}</td>
            <th>外調員SPL-2変更</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_027" :value="$gck?->gck_027" :options="$mSpl2ChangeOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>SPL-2収容変更</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_028" :value="$gck?->gck_028" :options="$mSpl2HousingOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck028?->val }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>工事詳細区分</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_088" :value="$tRke?->rke_088" :options="$mCostDetailOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
            </td>
            <th>後２分岐専用ボックス名称</th>
            <td colspan="3">{{ $tRke?->rke_095 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_083" :value="$tRke?->rke_083" :options="$mOpenOptions" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>再利用設計</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_079" :value="$tRke?->rke_079" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $tRke?->mRke079?->val }}
                @endif
            </td>
            <th>再利用回線依頼番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_080" :value="$tRke?->rke_080" />
                @else
                    {{ $tRke?->rke_080 }}
                @endif
            </td>
            <th>調査結果再利用</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_134" :value="$tRke?->rke_134" :options="$mPropriety1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>調査結果再利用不可理由</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_135" :value="$tRke?->rke_135" :options="$mReuseImpossibleOptions" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>共架番号</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_100" :value="$tRke?->rke_100" />
                @else
                    {{ $tRke?->rke_100 }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>共架申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_101" :value="$tRke?->rke_101" />
                @else
                    {{ $tRke?->rke_101?->format('Y/m/d') }}
                @endif
            </td>
            <th>共架回答日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_102" :value="$tRke?->rke_102" />
                @else
                    {{ $tRke?->rke_102?->format('Y/m/d') }}
                @endif
            </td>
            <th>共架取消申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_108" :value="$tRke?->rke_108" />
                @else
                    {{ $tRke?->rke_108?->format('Y/m/d') }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>支社指示事項</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_110" :value="$tRke?->rke_110" />
                @else
                    {{ $tRke?->rke_110 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>可否判定申込日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_268" :value="$tRke?->rke_268" />
                @else
                    {{ $tRke?->rke_268?->format('Y/m/d') }}
                @endif
            </td>
            <th>可否判定通知日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_269" :value="$tRke?->rke_269" />
                @else
                    {{ $tRke?->rke_269?->format('Y/m/d') }}
                @endif
            </td>
            <th>開始通知日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_273" :value="$tRke?->rke_273" />
                @else
                    {{ $tRke?->rke_273?->format('Y/m/d') }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>可否判定結果</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_270" :value="$tRke?->rke_270" />
                @else
                    {{ $tRke?->rke_270 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>共架申請パターン</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_271" :value="$tRke?->rke_271" />
                @else
                    {{ $tRke?->rke_271 }}
                @endif
            </td>
            <th>本申込結果</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_272" :value="$tRke?->rke_272" />
                @else
                    {{ $tRke?->rke_272 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>共架申請メモ</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_274" :value="$tRke?->rke_274" />
                @else
                    {{ $tRke?->rke_274 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>NTT支店(添架)</th>
            <td colspan="3">{{ $tRke?->rke_252 }}</td>
            <th>NTT支社(添架)</th>
            <td colspan="3">{{ $tRke?->rke_099 }}</td>
        </tr>
        <tr>
            <th>添架番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_104" :value="$tRke?->rke_104" />
                @else
                    {{ $tRke?->rke_104 }}
                @endif
            </td>
            <th>添架申請種別</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_005" :value="$gck?->gck_005" :options="$mNecessity4Options" empty=" " class="tw:!w-full" />
            </td>
            <th>添架申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_105" :value="$tRke?->rke_105" />
                @else
                    {{ $tRke?->rke_105?->format('Y/m/d') }}
                @endif
            </td>
            <th>添架回答日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_106" :value="$tRke?->rke_106" />
                @else
                    {{ $tRke?->rke_106?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>添架申請書類到着日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="gck_006" :value="$gck?->gck_006" />
                @else
                    {{ $gck?->gck_006?->format('Y/m/d') }}
                @endif
            </td>
            <th>添架竣工報告日</th>
            <td>{{ $tRke?->rke_107?->format('Y/m/d') }}</td>
            <th>添架取消申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_109" :value="$tRke?->rke_109" />
                @else
                    {{ $tRke?->rke_109?->format('Y/m/d') }}
                @endif
            </td>
            <td
                class="tw:!pl-0"
                colspan="2"
                x-data='lineSurveyInfoOutLineHistory(
                    @json(route("out-line-history.index", ["requestNumber" => "__REQUEST_NUMBER__"])),
                    @json((string) ($tRke?->rke_019 ?? ""))
                )'
            >
                <x-button.red type="button" class="tw:!w-[150px] tw:!px-0 tw:!py-0 tw:!min-h-0" @click="openOutLineHistory">外線調査履歴</x-button.red>
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>次回チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="khj_004" :value="$khj?->khj_004" />
                @else
                    {{ $khj?->khj_004?->format('Y/m/d') }}
                @endif
            </td>
            <th>チェック者</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="khj_005" :value="$khj?->khj_005" />
                @else
                    {{ $khj?->khj_005 }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>調査工程管理コード1</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_125" :value="$tRke?->rke_125" :options="$mSurveyProcessCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke125?->val }}
                @endif
            </td>
            <th>調査工程管理コード1<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_126" :value="$tRke?->rke_126" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_126?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード1<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_127" :value="$tRke?->rke_127" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_127?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード2</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_128" :value="$tRke?->rke_128" :options="$mSurveyProcessCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke128?->val }}
                @endif
            </td>
            <th>調査工程管理コード2<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_129" :value="$tRke?->rke_129" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_129?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード2<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_130" :value="$tRke?->rke_130" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_130?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード3</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_131" :value="$tRke?->rke_131" :options="$mSurveyProcessCodeOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke131?->val }}
                @endif
            </td>
            <th>調査工程管理コード3<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_132" :value="$tRke?->rke_132" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_132?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード3<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_133" :value="$tRke?->rke_133" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_133?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>官庁申請要否</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_012" :value="$gck?->gck_012" :options="$mNecessity4Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck012?->val }}
                @endif
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>道路占有有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_119" :value="$tRke?->rke_119" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>道路管理者</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="rke_120" :value="$tRke?->rke_120" />
            </td>
            <th>占用種別1</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_140" :value="$tRke?->rke_140" :options="$mExclusiveUseOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $tRke?->mRke140?->val }}
                @endif
            </td>
            <th>占用管理者名1</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_141" :value="$tRke?->rke_141" />
                @else
                    {{ $tRke?->rke_141 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>審査結果メモ</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-textarea name="rke_142">{{ $tRke?->rke_142 }}</x-forms.table-textarea>
                @else
                    {!! nl2br(e($tRke?->rke_142)) !!}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>他社線接触交渉有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_143" :value="$tRke?->rke_143" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>他社線接触会社名</th>
            <td colspan="3" class="tw:!p-0">
                <x-forms.table-input name="rke_144" :value="$tRke?->rke_144" />
            </td>
            <th>回避策区分</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_145" :value="$tRke?->rke_145" :options="$mWorkaroundOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>回避策可否</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_146" :value="$tRke?->rke_146" :options="$mPropriety1Options" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>樹木伐採有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_117" :value="$tRke?->rke_117" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>樹木管理者</th>
            <td colspan="3" class="tw:!p-0">
                <x-forms.table-input name="rke_118" :value="$tRke?->rke_118" />
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>配電改修有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_111" :value="$tRke?->rke_111" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>配電改修予定日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_112" :value="$tRke?->rke_112" />
                @else
                    {{ $tRke?->rke_112?->format('Y/m/d') }}
                @endif
            </td>
            <th>配電改修設計番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_113" :value="$tRke?->rke_113" />
                @else
                    {{ $tRke?->rke_113 }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>民地交渉有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_114" :value="$tRke?->rke_114" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>民地交渉完了日</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="rke_115" :value="$tRke?->rke_115" />
            </td>
            <th>民地交渉結果</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_007" :value="$gck?->gck_007" :options="$mOkNgOptions" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>地権者</th>
            <td colspan="5" class="tw:!p-0">
                <x-forms.table-input name="rke_116" :value="$tRke?->rke_116" />
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>民地交渉承諾内容</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="gck_008">{{ $gck?->gck_008 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>引継コード1</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_170" :value="$tRke?->rke_170" />
                @else
                    {{ $tRke?->rke_170 }}
                @endif
            </td>
            <th>引継コード2</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_171" :value="$tRke?->rke_171" />
                @else
                    {{ $tRke?->rke_171 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>引継コード3</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_172" :value="$tRke?->rke_172" />
                @else
                    {{ $tRke?->rke_172 }}
                @endif
            </td>
            <th>引継コード4</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_173" :value="$tRke?->rke_173" />
                @else
                    {{ $tRke?->rke_173 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>設計フェーズ　備考1<br>（KDDI）</th>
            <td colspan="3">{{ $tRke?->mRke223?->val }}</td>
            <th>設計フェーズ　備考2<br>（KDDI）</th>
            <td colspan="3">{{ $tRke?->mRke224?->val }}</td>
        </tr>
        <tr>
            <th>設計フェーズ　備考3<br>（KDDI）</th>
            <td colspan="3">{{ $tRke?->mRke225?->val }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>設計フェーズ　備考5<br>（工事会社）</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_227" :value="$tRke?->rke_227" :options="$mDesignPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke227?->val }}
                @endif
            </td>
            <th>設計フェーズ　備考4<br>（工事会社）</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_226" :value="$tRke?->rke_226" :options="$mDesignPhaseNoteOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke226?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>宅内調査要否</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_010" :value="$gck?->gck_010" :options="$mNecessity4Options" empty=" " class="tw:!w-full" />
            </td>
            <th>宅内調査依頼日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_157" :value="$tRke?->rke_157" />
                @else
                    {{ $tRke?->rke_157 }}
                @endif
            </td>
            <th>可否完了日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="gck_063" :value="$gck?->gck_063" />
                @else
                    {{ $gck?->gck_063?->format('Y/m/d') }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>調査柱合計</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_014" :value="$gck?->gck_014" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（東電）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_015" :value="$gck?->gck_015" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（ＮＴＴ新規）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_016" :value="$gck?->gck_016" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（ＮＴＴ２条目以上）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_017" :value="$gck?->gck_017" class="tw:!h-[40px]" />
            </td>
        </tr>
        <tr>
            <th>外線調査数量（ｍ）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_019" :value="$gck?->gck_019" class="tw:!h-[40px]" />
            </td>
            <th>調査柱合計（本数）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_020" :value="$gck?->gck_020" class="tw:!h-[40px]" />
            </td>
            <th>メッセンジャー新設（間本）</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_058" :value="$gck?->gck_058" class="tw:!h-[40px]" />
            </td>
            <th>外線ルート上設備区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_059" :value="$gck?->gck_059" :options="$mLineEquipmentOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $gck?->mGck059?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>エリア検索対応</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_147" :value="$tRke?->rke_147" :options="$mAreaSearchOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $tRke?->mRke147?->val }}
                @endif
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>提供可否確定日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_150" :value="$tRke?->rke_150" />
                @else
                    {{ $tRke?->rke_150?->format('Y/m/d') }}
                @endif
            </td>
            <th>提供可能年月日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_151" :value="$tRke?->rke_151" />
                @else
                    {{ $tRke?->rke_151?->format('Y/m/d') }}
                @endif
            </td>
            <th>工事準備期間</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_154" :value="$tRke?->rke_154" />
                @else
                    {{ $tRke?->rke_154 }}
                @endif
            </td>
            <th>提供可能設定抑制フラグ</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_064" :value="$gck?->gck_064" :options="$mSettingSuppressionOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck064?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>提供可否結果</th>
            <td>{{ $tRke?->mRke148?->val }}</td>
            <th>提供可能設定者</th>
            <td>{{ $tRke?->rke_152 }}</td>
            <th>提供可否結果（工事会社）</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_149" :value="$tRke?->rke_149" :options="$mOfferProprietyOptions" empty=" " class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->mRke149?->val }}
                @endif
            </td>
            <th>提供可能設定者（工事会社）</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_153" :value="$tRke?->rke_153" class="tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_153 }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>不適合コード</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_136" :value="$tRke?->rke_136" :options="$mIncompatibilityCodeOptions" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>不適合申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_138" :value="$tRke?->rke_138" />
                @else
                    {{ $tRke?->rke_138?->format('Y/m/d') }}
                @endif
            </td>
            <th>再検討依頼日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_139" :value="$tRke?->rke_139" />
                @else
                    {{ $tRke?->rke_139?->format('Y/m/d') }}
                @endif
            </td>
            <th>提供不可理由</th>
            <td colspan="3" class="tw:!p-0">
                <x-forms.table-input name="rke_137" :value="$tRke?->rke_137" />
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>設計フェイズメモA</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-textarea name="rke_074">{{ $tRke?->rke_074 }}</x-forms.table-textarea>
                @else
                    {!! nl2br(e($tRke?->rke_074)) !!}
                @endif
            </td>
        </tr>
        <tr>
            <th>設計フェイズメモB</th>
            <td colspan="7">{!! nl2br(e($tRke?->rke_075)) !!}</td>
        </tr>
        <tr>
            <th>特記事項1（KDDI）</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-textarea name="rke_246">{{ $tRke?->rke_246 }}</x-forms.table-textarea>
                @else
                    {!! nl2br(e($tRke?->rke_246)) !!}
                @endif
            </td>
        </tr>
        <tr>
            <th>外線調査備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="gck_022">{{ $gck?->gck_022 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>申請備考</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-textarea name="gck_023">{{ $gck?->gck_023 }}</x-forms.table-textarea>
                @else
                    {!! nl2br(e($gck?->gck_023)) !!}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>追加申請・ルート変更</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_013" :value="$gck?->gck_013" :options="$mTouteOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck013?->val }}
                @endif
            </td>
            <th>外線調査付託日(追加)</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="gck_043" :value="$gck?->gck_043" />
                @else
                    {{ $gck?->gck_043?->format('Y/m/d') }}
                @endif
            </td>
            <th>外線調査業者(追加)</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="gck_044" :value="$gck?->gck_044" :options="$mMerchantOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $gck?->mGck044?->val }}
                @endif
            </td>
            <th>外線調査班(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_045" :value="$gck?->gck_045" />
            </td>
        </tr>
        <tr>
            <th>添架申請種別(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_047" :value="$gck?->gck_047" :options="$mNecessity4Options" empty=" " class="tw:!w-full" />
            </td>
            <th>ＮＴＴ支社(追加)</th>
            <td colspan="3" class="tw:!p-0">
                <x-forms.table-select name="gck_046" :value="$gck?->gck_046" :options="$mNttOfficeOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>ＮＴＴ小柱(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_042" :value="$gck?->gck_042" :options="$mNttColumnarOptions" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <th>配電改修有無(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_029" :value="$gck?->gck_029" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>民地交渉有無(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_030" :value="$gck?->gck_030" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>民地交渉完了日(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="gck_031" :value="$gck?->gck_031" />
            </td>
            <th>民地交渉結果(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_049" :value="$gck?->gck_049" :options="$mOkNgOptions" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <th>宅内調査要否(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_050" :value="$gck?->gck_050" :options="$mNecessity4Options" empty=" " class="tw:!w-full" />
            </td>
            <th>可否報告日(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="gck_057" :value="$gck?->gck_057" />
            </td>
            <th>不適合コード(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="gck_039" :value="$gck?->gck_039" :options="$mIncompatibilityCodeOptions" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>調査柱合計(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_051" :value="$gck?->gck_051" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（東電）(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_052" :value="$gck?->gck_052" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（ＮＴＴ新規）(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_053" :value="$gck?->gck_053" class="tw:!h-[40px]" />
            </td>
            <th>調査本数（ＮＴＴ２条目以上）(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_054" :value="$gck?->gck_054" class="tw:!h-[40px]" />
            </td>
        </tr>
        <tr>
            <th>外線調査数量（ｍ）(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_056" :value="$gck?->gck_056" class="tw:!h-[40px]" />
            </td>
            <th>メッセンジャー新設（間本）(追加)</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="gck_060" :value="$gck?->gck_060" class="tw:!h-[40px]" />
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>APOLLO修正日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="gck_061" :value="$gck?->gck_061" />
                @else
                    {{ $gck?->gck_061?->format('Y/m/d') }}
                @endif
            </td>
            <th>APOLLO修正者</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="gck_062" :value="$gck?->gck_062" />
                @else
                    {{ $gck?->gck_062 }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
    </table>
</div>

@once
    @push('scripts')
    <script>
        function lineSurveyInfoOutLineHistory(outLineHistoryUrlTemplate, rke019) {
            return {
                outLineHistoryUrlTemplate,
                rke019,
                openOutLineHistory() {
                    const requestNumber = String(this.rke019 ?? "").trim();

                    if (!requestNumber) {
                        alert("回線依頼番号が設定されていません。");
                        return;
                    }

                    const targetName = `out-line-history`;
                    const popupFeatures = "width=1220,height=540,resizable=yes,scrollbars=yes";
                    const outLineHistoryUrl = this.outLineHistoryUrlTemplate.replace(
                        "__REQUEST_NUMBER__",
                        encodeURIComponent(requestNumber),
                    );
                    const popup = window.open(outLineHistoryUrl, targetName, popupFeatures);
                    if (!popup) {
                        alert("別ウィンドウを開けませんでした。ポップアップブロック設定を確認してください。");
                    } else {
                        popup.focus();
                    }
                },
            };
        }
    </script>
    @endpush
@endonce
