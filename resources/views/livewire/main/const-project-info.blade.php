<div>
    @php
        $isToho = auth()->user()->is_toho;
        $khj = $tRke?->tKhj;
        $kik = $tRke?->tKik;
    @endphp

    <table class="satsuki-table tw:w-full">
        <tr>
            <th>地上高民地</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_020" :value="$khj?->khj_020" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>【地上高】　車道</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_022" :value="$khj?->khj_022" />
            </td>
            <th>【地上高】　歩道</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_023" :value="$khj?->khj_023" />
            </td>
            <th>道路横断有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_024" :value="$khj?->khj_024" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <th>工事方都合</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_025" :value="$khj?->khj_025" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td>{{ $mOpenOptions[$tRke?->rke_083] ?? '' }}</td>
            <th>工事詳細区分</th>
            <td>{{ $mCostDetailOptions[$tRke?->rke_088] ?? '' }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>再利用設計</th>
            <td>{{ $mExistence1Options[$tRke?->rke_079] ?? '' }}</td>
            <th>再利用回線依頼番号</th>
            <td>{{ $tRke?->rke_080 }}</td>
            <th>再利用先依頼番号</th>
            <td>{{ $kik?->kik_007 }}</td>
            <th>設計時再利用不可理由</th>
            <td>{{ $mReuseImpossibleOptions[$tRke?->rke_082] ?? '' }}</td>
        </tr>
        <tr>
            <th>流用回線依頼番号</th>
            <td>{{ $tRke?->rke_081 }}</td>
            <th>標準外工事種別</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_155" :value="$tRke?->rke_155" :options="$mNonStandardConstOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $mNonStandardConstOptions[$tRke?->rke_155] ?? '' }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>OSUホスト名</th>
            <td colspan="2">{{ $tRke?->rke_084 }}</td>
            <th>OSUスロット番号</th>
            <td>{{ $tRke?->rke_085 }}</td>
            <th>OSUポート番号</th>
            <td>{{ $mOsuPortOptions[$tRke?->rke_086] ?? '' }}</td>
            <td></td>
        </tr>
        <tr>
            <th>OSU速度区分</th>
            <td colspan="2">{{ $mOsuSpeedOptions[$tRke?->rke_087] ?? '' }}</td>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>SPL2名称</th>
            <td colspan="2">{{ $tRke?->rke_089 }}</td>
            <th>SPL2収容電柱名称</th>
            <td colspan="2">{{ $tRke?->rke_090 }}</td>
            <th>SPL2形状</th>
            <td>{{ $mSpl2ShapeOptions[$tRke?->rke_091] ?? '' }}</td>
        </tr>
        <tr>
            <th>後２分岐専用ボックス名称</th>
            <td colspan="2">{{ $tRke?->rke_095 }}</td>
            <th>SPL2ポート番号</th>
            <td colspan="2">{{ $tRke?->rke_092 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>ドロップケーブル使用芯線番号</th>
            <td colspan="2">{{ $tRke?->rke_093 }}</td>
            <th>ケーブルキー番号</th>
            <td colspan="2">{{ $tRke?->rke_094 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>提供可否確定日</th>
            <td>{{ $tRke?->rke_150?->format('Y/m/d') }}</td>
            <th>提供可能年月日</th>
            <td>{{ $tRke?->rke_151?->format('Y/m/d') }}</td>
            <th>停止工事予定日</th>
            <td>{{ $tRke?->rke_166?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>引継コード1</th>
            <td colspan="3">{{ $tRke?->rke_170 }}</td>
            <th>引継コード2</th>
            <td colspan="3">{{ $tRke?->rke_171 }}</td>
        </tr>
        <tr>
            <th>引継コード3</th>
            <td colspan="3">{{ $tRke?->rke_172 }}</td>
            <th>引継コード4</th>
            <td colspan="3">{{ $tRke?->rke_173 }}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>成端箱設置位置予定</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_213" :value="$tRke?->rke_213" :options="$mInstallationPositionOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>配管利用可否予定（成端箱～宅内）</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_216" :value="$tRke?->rke_216" :options="$mPropriety2Options" empty=" " class="tw:!w-full" />
            </td>
            <th>配管利用結果（成端箱～宅内）</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_217" :value="$tRke?->rke_217" :options="$mPropriety2Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $mPropriety2Options[$tRke?->rke_217] ?? '' }}
                @endif
            </td>
            <th>現地調査希望有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_218" :value="$tRke?->rke_218" :options="$mExistence4Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $mExistence4Options[$tRke?->rke_218] ?? '' }}
                @endif
            </td>
        </tr>
        <tr>
            <th>棟工事完了結果</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_221" :value="$tRke?->rke_221" :options="$mConstResultOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $mConstResultOptions[$tRke?->rke_221] ?? '' }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>棟固有情報メモ</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_222" :value="$tRke?->rke_222" />
                @else
                    {{ $tRke?->rke_222 }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>かけつけ有無</th>
            <td>{{ $mExistence1Options[$tRke?->rke_240] ?? '' }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>かけつけ記事欄</th>
            <td colspan="7">{!! nl2br(e($tRke?->rke_241 ?? '')) !!}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>OP工事有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="khj_010" :value="$khj?->khj_010" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $mExistence1Options[$khj?->khj_010] ?? '' }}
                @endif
            </td>
            <th>特殊引継ぎ有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="khj_012" :value="$khj?->khj_012" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $mExistence2Options[$khj?->khj_012] ?? '' }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>撤去希望有無</th>
            <td>{{ $mExistence1Options[$tRke?->rke_236] ?? '' }}</td>
            <th>撤去希望日</th>
            <td>{{ $tRke?->rke_237?->format('Y/m/d') }}</td>
            <th>撤去期限日</th>
            <td>{{ $tRke?->rke_238?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>APOLLO修正日</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="khj_026" :value="$khj?->khj_026" class="tw:!w-full" />
            </td>
            <th>APOLLO修正者</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_027" :value="$khj?->khj_027" class="tw:!w-full" />
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>宅内調査備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_013">{{ $khj?->khj_013 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>外線工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_014">{{ $khj?->khj_014 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>接続工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_015">{{ $khj?->khj_015 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>宅内工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_016">{{ $khj?->khj_016 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>オプション工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_017">{{ $khj?->khj_017 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>撤去工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_018">{{ $khj?->khj_018 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>かけつけ備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_019">{{ $khj?->khj_019 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>宅内移設工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_021">{{ $khj?->khj_021 }}</x-forms.table-textarea>
            </td>
        </tr>
    </table>
</div>
