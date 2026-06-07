<div>
    @php
        $isToho = auth()->user()->is_toho;
    @endphp
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>SPL2収容電柱名称</th>
            <td >{{ $vDeskDesignInfo?->rke_090 }}</td>
            <th>SPL-2使用線番</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="kik_002" :value="$vDeskDesignInfo?->kik_002" class="" />
                @else
                    {{ $vDeskDesignInfo?->kik_002 }}
                @endif
            </td>
            <th>SPL2ポート番号</th>
            <td>
                {{ $vDeskDesignInfo?->rke_092 }}
            </td>
            <th>道路区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_124" :value="$vDeskDesignInfo?->rke_124" class="tw:!w-full" :options="$mRoadOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke124?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>苦情エリア区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_123" :value="$vDeskDesignInfo?->rke_123" class="tw:!w-full" :options="$mClaimAreaOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke123?->val }}
                @endif
            </td>
            <th>机上設計完了日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_076" :value="$vDeskDesignInfo?->rke_076" class="" />
                @else
                    {{ $vDeskDesignInfo?->rke_076?->format('Y/m/d') }}
                @endif
            </td>
            <th>机上設計実施者</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="kik_004" :value="$vDeskDesignInfo?->kik_004" class="" />
                @else
                    {{ $vDeskDesignInfo?->kik_004 }}
                @endif
            </td>
            <th>机上設計確認日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="kik_003" :value="$vDeskDesignInfo?->kik_003" />
                @else
                    {{ $vDeskDesignInfo?->kik_003?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>再利用回線依頼番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_080" :value="$vDeskDesignInfo?->rke_080" />
                @else
                    {{ $vDeskDesignInfo?->rke_080 }}
                @endif
            </td>
            <th>再利用設計</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_079" :value="$vDeskDesignInfo?->rke_079" class="tw:!w-full" :options="$mExistence1Options" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke079?->val }}
                @endif
            </td>
            <th>再利用先依頼番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="kik_007" :value="$vDeskDesignInfo?->kik_007" class="" />
                @else
                    {{ $vDeskDesignInfo?->kik_007 }}
                @endif
            </td>
            <th>設備重複先番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="kik_006" :value="$vDeskDesignInfo?->kik_006" />
                @else
                    {{ $vDeskDesignInfo?->kik_006 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_083" :value="$vDeskDesignInfo?->rke_083" class="tw:!w-full" :options="$mOpenOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke083?->val }}
                @endif
            </td>
            <th>工事詳細区分</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_088" :value="$vDeskDesignInfo?->rke_088" class="tw:!w-full" :options="$mCostDetailOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke088?->val }}
                @endif
            </td>
            <th>設計時再利用不可理由</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_082" :value="$vDeskDesignInfo?->rke_082" class="tw:!w-full" :options="$mReuseImpossibleOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke082?->val }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>既設回線区分</th>
            <td>
                {{ $vDeskDesignInfo?->mRke071?->val }}
            </td>
            <th>既設回線状況</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_072" :value="$vDeskDesignInfo?->rke_072" class="tw:!w-full" :options="$mLineSituationOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke072?->val }}
                @endif
            </td>
            <th>流用回線依頼番号</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_081" :value="$vDeskDesignInfo?->rke_081" />
                @else
                    {{ $vDeskDesignInfo?->rke_081 }}
                @endif
            </td>
            <th>旧回線依頼番号</th>
            <td>
                {{ $vDeskDesignInfo?->rke_021 }}
            </td>
        </tr>
        <tr>
            <th>auひかりホーム<br>既契約の有無</th>
            <td>
                {{ $vDeskDesignInfo?->mRke069?->val }}
            </td>
            <th>auひかりホーム既契約<br>の流用希望有無</th>
            <td>
                {{ $vDeskDesignInfo?->mRke070?->val }}
            </td>
            <th>光コンセント情報</th>
            <td>
                {{ $vDeskDesignInfo?->rke_073 }}
            </td>
            <th>部屋重複情報</th>
            <td>
                {{ $vDeskDesignInfo?->rke_045 }}
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>設計フェイズメモA</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="7">
                @if ($isToho)
                    <x-forms.table-input name="rke_074" :value="$vDeskDesignInfo?->rke_074" />
                @else
                    {{ $vDeskDesignInfo?->rke_074 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>机上設計備考</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="7">
                @if ($isToho)
                    <x-forms.table-input name="kik_008" :value="$vDeskDesignInfo?->kik_008" />
                @else
                    {{ $vDeskDesignInfo?->kik_008 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>外線調査備考</th>
            <td colspan="7">
                {{ $vDeskDesignInfo?->gck_022 }}
            </td>
        </tr>
        <tr>
            <th>申込書備考欄</th>
            <td colspan="7">
                {{ $vDeskDesignInfo?->rke_032 }}
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>APOLLO修正日　</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="khj_026" :value="$vDeskDesignInfo?->khj_026" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->khj_026?->format('Y/m/d') }}
                @endif
            </td>
            <th>APOLLO修正者</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="khj_027" :value="$vDeskDesignInfo?->khj_027" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->khj_027 }}
                @endif
            </td>
            <th>新設ASC長</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="skk_002" :value="$vDeskDesignInfo?->skk_002" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->skk_002 }}
                @endif
            </td>
            <th>撤去ASC長</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="skk_016" :value="$vDeskDesignInfo?->skk_016" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->skk_016 }}
                @endif
            </td>
        </tr>
        <tr>
            <th colspan="2">ＦＴＴＨ事業用 ドロップケーブル2芯</th>
            <th>レングス（自）</th>
            <td>
                {{ $vDeskDesignInfo?->skk_014 }}
            </td>
            <th>レングス（至）</th>
            <td>
                {{ $vDeskDesignInfo?->skk_015 }}
            </td>
            <th>シリアルNo</th>
            <td>
                {{ $vDeskDesignInfo?->skk_013 }}
            </td>
        </tr>
        <tr>
            <th>竣工備考</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="7">
                @if ($isToho)
                    <x-forms.table-textarea name="ksk_003">{{ $vDeskDesignInfo?->ksk_003 }}</x-forms.table-textarea>
                @else
                    {!! nl2br(e($vDeskDesignInfo?->ksk_003)) !!}
                @endif
            </td>
        </tr>
        <tr>
            <th>遅延理由</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="7">
                @if ($isToho)
                    <x-forms.table-input name="ksk_016" :value="$vDeskDesignInfo?->ksk_016" />
                @else
                    {{ $vDeskDesignInfo?->ksk_016 }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>不適合申請日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_138" :value="$vDeskDesignInfo?->rke_138" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->rke_138?->format('Y/m/d') }}
                @endif
            </td>
            <th>不適合コード</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_136" :value="$vDeskDesignInfo?->rke_136" class="tw:!w-full" :options="$mIncompatibilityCodeOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke136?->val }}
                @endif
            </td>
            <th>再検討依頼日</th>
            <td>
                {{ $vDeskDesignInfo?->rke_139?->format('Y/m/d') }}
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>提供不可理由</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="5">
                @if ($isToho)
                    <x-forms.table-input name="rke_137" :value="$vDeskDesignInfo?->rke_137" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->rke_137 }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>調査工程管理コード1</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-select name="rke_125" :value="$vDeskDesignInfo?->rke_125" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke125?->val }}
                @endif
            </td>
            <th>調査工程管理コード1<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_126" :value="$vDeskDesignInfo?->rke_126" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_126?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード1<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_127" :value="$vDeskDesignInfo?->rke_127" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_127?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード2</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-select name="rke_128" :value="$vDeskDesignInfo?->rke_128" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke128?->val }}
                @endif
            </td>
            <th>調査工程管理コード2<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_129" :value="$vDeskDesignInfo?->rke_129" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_129?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード2<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_130" :value="$vDeskDesignInfo?->rke_130" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_130?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード3</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-select name="rke_131" :value="$vDeskDesignInfo?->rke_131" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke131?->val }}
                @endif
            </td>
            <th>調査工程管理コード3<br>報告日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_132" :value="$vDeskDesignInfo?->rke_132" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_132?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード3<br>チェック日</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input-date name="rke_133" :value="$vDeskDesignInfo?->rke_133" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_133?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>第2SP構築待ち電柱</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-input name="rke_121" :value="$vDeskDesignInfo?->rke_121" class="tw:!w-full" />
                @else
                    {{ $vDeskDesignInfo?->rke_121 }}
                @endif
            </td>
            <th class="tw:!pr-0">第2スプリッタ構築予定日</th>
            <td>{{ $vDeskDesignInfo?->rke_122?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>OSUホスト名</th>
            <td colspan="3">{{ $vDeskDesignInfo?->rke_084 }}</td>
            <th>OSUスロット番号</th>
            <td>{{ $vDeskDesignInfo?->rke_085 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>基本契約ステータス</th>
            <td>{{ $vDeskDesignInfo?->rke_014 }}</td>
            <th>回線依頼取消日</th>
            <td>{{ $vDeskDesignInfo?->rke_020?->format('Y/m/d') }}</td>
            <th>解約予定年月日</th>
            <td>{{ $vDeskDesignInfo?->rke_049?->format('Y/m/d') }}</td>
            <th>申込取消年月日</th>
            <td>{{ $vDeskDesignInfo?->rke_050?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>設計フェイズメモB</th>
            <td colspan="7">{{ $vDeskDesignInfo?->rke_075 }}</td>
        </tr>
        <tr>
            <th>特記事項1（KDDI）</th>
            <td colspan="7">{{ $vDeskDesignInfo?->rke_246 }}</td>
        </tr>
        <tr>
            <th>提供可否結果<br>（工事会社）</th>
            <td>{{ $vDeskDesignInfo?->mRke149?->val }}</td>
            <th>提供可否確定日</th>
            <td>{{ $vDeskDesignInfo?->rke_150?->format('Y/m/d') }}</td>
            <th>提供可能年月日</th>
            <td>{{ $vDeskDesignInfo?->rke_151?->format('Y/m/d') }}</td>
            <th>提供可能設定者（工事会社）</th>
            <td>{{ $vDeskDesignInfo?->rke_153 }}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>引継コード1</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-input name="rke_170" :value="$vDeskDesignInfo?->rke_170" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_170 }}
                @endif
            </td>
            <th>設計フェーズ　備考1<br>（KDDI）</th>
            <td colspan="3">
                {{ $vDeskDesignInfo?->mRke223?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード2</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-input name="rke_171" :value="$vDeskDesignInfo?->rke_171" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_171 }}
                @endif
            </td>
            <th>設計フェーズ　備考2<br>（KDDI）</th>
            <td colspan="3">
                {{ $vDeskDesignInfo?->mRke224?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード3</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-input name="rke_172" :value="$vDeskDesignInfo?->rke_172" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_172 }}
                @endif
            </td>
            <th>設計フェーズ　備考3<br>（KDDI）</th>
            <td colspan="3">
                {{ $vDeskDesignInfo?->mRke225?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード4</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-input name="rke_173" :value="$vDeskDesignInfo?->rke_173" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $vDeskDesignInfo?->rke_173 }}
                @endif
            </td>
            <th>設計フェーズ　備考4<br>（工事会社）</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-select name="rke_226" :value="$vDeskDesignInfo?->rke_226" class="tw:!w-full tw:!h-[40px]" :options="$mDesignPhaseNoteOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke226?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th></th>
            <td colspan="3"></td>
            <th>設計フェーズ　備考5<br>（工事会社）</th>
            <td @class(['tw:!p-0' => $isToho]) colspan="3">
                @if ($isToho)
                    <x-forms.table-select name="rke_227" :value="$vDeskDesignInfo?->rke_227" class="tw:!w-full tw:!h-[40px]" :options="$mDesignPhaseNoteOptions" empty=" " />
                @else
                    {{ $vDeskDesignInfo?->mRke227?->val }}
                @endif
            </td>
        </tr>

    </table>
    {{-- The whole world belongs to you. --}}
</div>
