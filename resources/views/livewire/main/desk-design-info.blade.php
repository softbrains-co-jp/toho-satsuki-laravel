<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>SPL2収容電柱名称</th>
            <td >{{ $tRke?->rke_090 }}</td>
            <th>SPL-2使用線番</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_002" :value="$tRke?->tKik?->kik_002" class="" />
                @else
                    {{ $tRke?->tKik?->kik_002 }}
                @endif
            </td>
            <th>SPL2ポート番号</th>
            <td>
                {{ $tRke?->rke_092 }}
            </td>
            <th>道路区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_124" :value="$tRke?->rke_124" class="tw:!w-full" :options="$mRoadOptions" empty=" " />
                @else
                    {{ $tRke?->mRke124?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>苦情エリア区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_123" :value="$tRke?->rke_123" class="tw:!w-full" :options="$mClaimAreaOptions" empty=" " />
                @else
                    {{ $tRke?->mRke123?->val }}
                @endif
            </td>
            <th>机上設計完了日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_076" :value="$tRke?->rke_076" class="" />
                @else
                    {{ $tRke?->rke_076?->format('Y/m/d') }}
                @endif
            </td>
            <th>机上設計実施者</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_004" :value="$tRke?->tKik?->kik_004" class="" />
                @else
                    {{ $tRke?->tKik?->kik_004 }}
                @endif
            </td>
            <th>机上設計確認日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="kik_003" :value="$tRke?->tKik?->kik_003" />
                @else
                    {{ $tRke?->tKik?->kik_003?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>再利用回線依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_080" :value="$tRke?->rke_080" />
                @else
                    {{ $tRke?->rke_080?->val }}
                @endif
            </td>
            <th>再利用設計</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_079" :value="$tRke?->rke_079" class="tw:!w-full" :options="$mExistence1Options" empty=" " />
                @else
                    {{ $tRke?->mRke079?->val }}
                @endif
            </td>
            <th>再利用先依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_007" :value="$tRke?->tKik?->kik_007" class="" />
                @else
                    {{ $tRke?->tKik?->kik_007 }}
                @endif
            </td>
            <th>設備重複先番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_006" :value="$tRke?->tKik?->kik_006" />
                @else
                    {{ $tRke?->tKik?->kik_006 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_083" :value="$tRke?->rke_083" class="tw:!w-full" :options="$mOpenOptions" empty=" " />
                @else
                    {{ $tRke?->mRke083?->val }}
                @endif
            </td>
            <th>工事詳細区分</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_088" :value="$tRke?->rke_088" class="tw:!w-full" :options="$mCostDetailOptions" empty=" " />
                @else
                    {{ $tRke?->mRke088?->val }}
                @endif
            </td>
            <th>設計時再利用不可理由</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_082" :value="$tRke?->rke_082" class="tw:!w-full" :options="$mReuseImpossibleOptions" empty=" " />
                @else
                    {{ $tRke?->mRke082?->val }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>既設回線区分</th>
            <td>
                {{ $tRke?->mRke071?->val }}
            </td>
            <th>既設回線状況</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_072" :value="$tRke?->rke_072" class="tw:!w-full" :options="$mLineSituationOptions" empty=" " />
                @else
                    {{ $tRke?->mRke072?->val }}
                @endif
            </td>
            <th>流用回線依頼番号</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_081" :value="$tRke?->rke_081" />
                @else
                    {{ $tRke?->rke_081 }}
                @endif
            </td>
            <th>旧回線依頼番号</th>
            <td>
                {{ $tRke?->rke_021 }}
            </td>
        </tr>
        <tr>
            <th>auひかりホーム<br>既契約の有無</th>
            <td>
                {{ $tRke?->mRke069?->val }}
            </td>
            <th>auひかりホーム既契約<br>の流用希望有無</th>
            <td>
                {{ $tRke?->mRke070?->val }}
            </td>
            <th>光コンセント情報</th>
            <td>
                {{ $tRke?->rke_073 }}
            </td>
            <th>部屋重複情報</th>
            <td>
                {{ $tRke?->rke_045 }}
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>設計フェイズメモ</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="7">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_074" :value="$tRke?->rke_074" />
                @else
                    {{ $tRke?->rke_074 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>机上設計備考</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="7">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="kik_008" :value="$tRke?->tKik?->kik_008" />
                @else
                    {{ $tRke?->kik_008 }}
                @endif
            </td>
        </tr>
        <tr>
            <th>外線調査備考</th>
            <td colspan="7">
                {{ $tRke?->tGck?->gck_022 }}
            </td>
        </tr>
        <tr>
            <th>申込書備考欄</th>
            <td colspan="7">
                {{ $tRke?->rke_032 }}
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>APOLLO修正日　</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="khj_026" :value="$tRke?->tKhj?->khj_026" class="tw:!w-full" />
                @else
                    {{ $tRke?->tKhj?->khj_026?->format('Y/m/d') }}
                @endif
            </td>
            <th>APOLLO修正者</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="khj_027" :value="$tRke?->tKhj?->khj_027" class="tw:!w-full" />
                @else
                    {{ $tRke?->tKhj?->khj_027 }}
                @endif
            </td>
            <th>新設ASC長</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="skk_002" :value="$tRke?->tSkk?->skk_002" class="tw:!w-full" />
                @else
                    {{ $tRke?->tSkk?->skk_002 }}
                @endif
            </td>
            <th>撤去ASC長</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="skk_016" :value="$tRke?->tSkk?->skk_016" class="tw:!w-full" />
                @else
                    {{ $tRke?->tSkk?->skk_016 }}
                @endif
            </td>
        </tr>
        <tr>
            <th colspan="2">ＦＴＴＨ事業用 ドロップケーブル2芯</th>
            <th>レングス（自）</th>
            <td>
                {{ $tRke?->tSkk?->skk_014 }}
            </td>
            <th>レングス（至）</th>
            <td>
                {{ $tRke?->tSkk?->skk_015 }}
            </td>
            <th>シリアルNo</th>
            <td>
                {{ $tRke?->tSkk?->skk_013 }}
            </td>
        </tr>
        <tr>
            <th>竣工備考</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="7">
                @if (auth()->user()->is_toho)
                    <x-forms.table-textarea name="ksk_003">{{ $tRke?->tKsk?->ksk_003 }}</x-forms.table-textarea>
                @else
                    {!! nl2br($tRke?->tKsk?->ksk_003) !!}
                @endif
            </td>
        </tr>
        <tr>
            <th>遅延理由</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="7">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="ksk_016" :value="$tRke?->tKsk?->ksk_016" />
                @else
                    {{ $tRke?->tKsk?->ksk_016 }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>不適合申請日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_138" :value="$tRke?->rke_138" class="tw:!w-full" />
                @else
                    {{ $tRke?->rke_138?->format('Y/m/d') }}
                @endif
            </td>
            <th>不適合コード</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_136" :value="$tRke?->rke_136" class="tw:!w-full" :options="$mIncompatibilityCodeOptions" empty=" " />
                @else
                    {{ $tRke?->mRke136?->val }}
                @endif
            </td>
            <th>再検討依頼日</th>
            <td>
                {{ $tRke?->rke_139?->format('Y/m/d') }}
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>提供不可理由</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="5">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_137" :value="$tRke?->rke_137" class="tw:!w-full" />
                @else
                    {{ $tRke?->rke_137 }}
                @endif
            </td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>調査工程管理コード1</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_125" :value="$tRke?->rke_125" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $tRke?->mRke125?->val }}
                @endif
            </td>
            <th>調査工程管理コード1<br>報告日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_126" :value="$tRke?->rke_126" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_126?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード1<br>チェック日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_127" :value="$tRke?->rke_127" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_127?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード2</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_128" :value="$tRke?->rke_128" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $tRke?->mRke128?->val }}
                @endif
            </td>
            <th>調査工程管理コード2<br>報告日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_129" :value="$tRke?->rke_129" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_129?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード2<br>チェック日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_130" :value="$tRke?->rke_130" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_130?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <th>調査工程管理コード3</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_131" :value="$tRke?->rke_131" class="tw:!w-full tw:!h-[40px]" :options="$mSurveyProcessCodeOptions" empty=" " />
                @else
                    {{ $tRke?->mRke131?->val }}
                @endif
            </td>
            <th>調査工程管理コード3<br>報告日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_132" :value="$tRke?->rke_132" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_132?->format('Y/m/d') }}
                @endif
            </td>
            <th>調査工程管理コード3<br>チェック日</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho])>
                @if (auth()->user()->is_toho)
                    <x-forms.table-input-date name="rke_133" :value="$tRke?->rke_133" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_133?->format('Y/m/d') }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>第2SP構築待ち電柱</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_121" :value="$tRke?->rke_121" class="tw:!w-full" />
                @else
                    {{ $tRke?->rke_121 }}
                @endif
            </td>
            <th class="tw:!pr-0">第2スプリッタ構築予定日</th>
            <td>{{ $tRke?->rke_122?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>OSUホスト名</th>
            <td colspan="3">{{ $tRke?->rke_084 }}</td>
            <th>OSUホスト名</th>
            <td>{{ $tRke?->rke_085 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>基本契約ステータス</th>
            <td>{{ $tRke?->rke_014 }}</td>
            <th>回線依頼取消日</th>
            <td>{{ $tRke?->rke_020?->format('Y/m/d') }}</td>
            <th>解約予定年月日</th>
            <td>{{ $tRke?->rke_049?->format('Y/m/d') }}</td>
            <th>申込取消年月日</th>
            <td>{{ $tRke?->rke_050?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>設計フェイズメモB</th>
            <td colspan="7">{{ $tRke?->rke_075 }}</td>
        </tr>
        <tr>
            <th>特記事項1（KDDI）</th>
            <td colspan="7">{{ $tRke?->rke_246 }}</td>
        </tr>
        <tr>
            <th>提供可否結果<br>（工事会社）</th>
            <td>{{ $tRke?->mRke149?->val }}</td>
            <th>提供可否確定日</th>
            <td>{{ $tRke?->rke_150?->format('Y/m/d') }}</td>
            <th>解約予定年月日</th>
            <td>{{ $tRke?->rke_151?->format('Y/m/d') }}</td>
            <th>提供可能設定者（工事会社）</th>
            <td>{{ $tRke?->rke_153 }}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>引継コード1</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_170" :value="$tRke?->rke_170" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_170 }}
                @endif
            </td>
            <th>設計フェーズ　備考1<br>（KDDI）</th>
            <td colspan="3">
                {{ $tRke?->mRke223?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード2</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_171" :value="$tRke?->rke_171" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_171 }}
                @endif
            </td>
            <th>設計フェーズ　備考2<br>（KDDI）</th>
            <td colspan="3">
                {{ $tRke?->mRke224?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード3</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_172" :value="$tRke?->rke_172" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_172 }}
                @endif
            </td>
            <th>設計フェーズ　備考3<br>（KDDI）</th>
            <td colspan="3">
                {{ $tRke?->mRke225?->val }}
            </td>
        </tr>
        <tr>
            <th>引継コード4</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-input name="rke_173" :value="$tRke?->rke_173" class="tw:!w-full tw:!h-[40px]" />
                @else
                    {{ $tRke?->rke_173 }}
                @endif
            </td>
            <th>設計フェーズ　備考4<br>（KDDI）</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_226" :value="$tRke?->rke_226" class="tw:!w-full tw:!h-[40px]" :options="$mDesignPhaseNoteOptions" empty=" " />
                @else
                    {{ $tRke?->mRke226?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th></th>
            <td colspan="3"></td>
            <th>設計フェーズ　備考5<br>（KDDI）</th>
            <td @class(['tw:!p-0' => auth()->user()->is_toho]) colspan="3">
                @if (auth()->user()->is_toho)
                    <x-forms.table-select name="rke_227" :value="$tRke?->rke_227" class="tw:!w-full tw:!h-[40px]" :options="$mDesignPhaseNoteOptions" empty=" " />
                @else
                    {{ $tRke?->mRke227?->val }}
                @endif
            </td>
        </tr>

    </table>
    {{-- The whole world belongs to you. --}}
</div>
