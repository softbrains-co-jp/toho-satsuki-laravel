<div>
    @php
        $isToho = auth()->user()->is_toho;
    @endphp

    <table class="satsuki-table tw:w-full">
        <tr>
            <th>地上高民地</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_020" :value="$vConstProjectInfo?->khj_020" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <th>【地上高】　車道</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_022" :value="$vConstProjectInfo?->khj_022" />
            </td>
            <th>【地上高】　歩道</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_023" :value="$vConstProjectInfo?->khj_023" />
            </td>
            <th>道路横断有無</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_024" :value="$vConstProjectInfo?->khj_024" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
        </tr>
        <tr>
            <th>工事方都合</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="khj_025" :value="$vConstProjectInfo?->khj_025" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
            </td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td>{{ $vConstProjectInfo?->mRke083?->val }}</td>
            <th>工事詳細区分</th>
            <td>{{ $vConstProjectInfo?->mRke088?->val }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>再利用設計</th>
            <td>{{ $vConstProjectInfo?->mRke079?->val }}</td>
            <th>再利用回線依頼番号</th>
            <td>{{ $vConstProjectInfo?->rke_080 }}</td>
            <th>再利用先依頼番号</th>
            <td>{{ $vConstProjectInfo?->kik_007 }}</td>
            <th>設計時再利用不可理由</th>
            <td>{{ $vConstProjectInfo?->mRke082?->val }}</td>
        </tr>
        <tr>
            <th>流用回線依頼番号</th>
            <td>{{ $vConstProjectInfo?->rke_081 }}</td>
            <th>標準外工事種別</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_155" :value="$vConstProjectInfo?->rke_155" :options="$mNonStandardConstOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mRke155?->val }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>OSUホスト名</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_084 }}</td>
            <th>OSUスロット番号</th>
            <td>{{ $vConstProjectInfo?->rke_085 }}</td>
            <th>OSUポート番号</th>
            <td>{{ $vConstProjectInfo?->mRke086?->val }}</td>
            <td></td>
        </tr>
        <tr>
            <th>OSU速度区分</th>
            <td colspan="2">{{ $vConstProjectInfo?->mRke087?->val }}</td>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>SPL2名称</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_089 }}</td>
            <th>SPL2収容電柱名称</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_090 }}</td>
            <th>SPL2形状</th>
            <td>{{ $vConstProjectInfo?->mRke091?->val }}</td>
        </tr>
        <tr>
            <th>後２分岐専用ボックス名称</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_095 }}</td>
            <th>SPL2ポート番号</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_092 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>ドロップケーブル使用芯線番号</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_093 }}</td>
            <th>ケーブルキー番号</th>
            <td colspan="2">{{ $vConstProjectInfo?->rke_094 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>提供可否確定日</th>
            <td>{{ $vConstProjectInfo?->rke_150?->format('Y/m/d') }}</td>
            <th>提供可能年月日</th>
            <td>{{ $vConstProjectInfo?->rke_151?->format('Y/m/d') }}</td>
            <th>停止工事予定日</th>
            <td>{{ $vConstProjectInfo?->rke_166?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>引継コード1</th>
            <td colspan="3">{{ $vConstProjectInfo?->rke_170 }}</td>
            <th>引継コード2</th>
            <td colspan="3">{{ $vConstProjectInfo?->rke_171 }}</td>
        </tr>
        <tr>
            <th>引継コード3</th>
            <td colspan="3">{{ $vConstProjectInfo?->rke_172 }}</td>
            <th>引継コード4</th>
            <td colspan="3">{{ $vConstProjectInfo?->rke_173 }}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>成端箱設置位置予定</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_213" :value="$vConstProjectInfo?->rke_213" :options="$mInstallationPositionOptions" empty=" " class="tw:!w-full" />
            </td>
            <th>配管利用可否予定（成端箱～宅内）</th>
            <td class="tw:!p-0">
                <x-forms.table-select name="rke_216" :value="$vConstProjectInfo?->rke_216" :options="$mPropriety2Options" empty=" " class="tw:!w-full" />
            </td>
            <th>配管利用結果（成端箱～宅内）</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_217" :value="$vConstProjectInfo?->rke_217" :options="$mPropriety2Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mRke217?->val }}
                @endif
            </td>
            <th>現地調査希望有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_218" :value="$vConstProjectInfo?->rke_218" :options="$mExistence4Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mRke218?->val }}
                @endif
            </td>
        </tr>
        <tr>
            <th>棟工事完了結果</th>
            <td colspan="3" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="rke_221" :value="$vConstProjectInfo?->rke_221" :options="$mConstResultOptions" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mRke221?->val }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>棟固有情報メモ</th>
            <td colspan="7" @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-input name="rke_222" :value="$vConstProjectInfo?->rke_222" />
                @else
                    {{ $vConstProjectInfo?->rke_222 }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>かけつけ有無</th>
            <td>{{ $vConstProjectInfo?->mRke240?->val }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>かけつけ記事欄</th>
            <td colspan="7">{!! nl2br(e($vConstProjectInfo?->rke_241 ?? '')) !!}</td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>OP工事有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="khj_010" :value="$vConstProjectInfo?->khj_010" :options="$mExistence1Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mKhj010?->val }}
                @endif
            </td>
            <th>特殊引継ぎ有無</th>
            <td @class(['tw:!p-0' => $isToho])>
                @if ($isToho)
                    <x-forms.table-select name="khj_012" :value="$vConstProjectInfo?->khj_012" :options="$mExistence2Options" empty=" " class="tw:!w-full" />
                @else
                    {{ $vConstProjectInfo?->mKhj012?->val }}
                @endif
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>撤去希望有無</th>
            <td>{{ $vConstProjectInfo?->mRke236?->val }}</td>
            <th>撤去希望日</th>
            <td>{{ $vConstProjectInfo?->rke_237?->format('Y/m/d') }}</td>
            <th>撤去期限日</th>
            <td>{{ $vConstProjectInfo?->rke_238?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>APOLLO修正日</th>
            <td class="tw:!p-0">
                <x-forms.table-input-date name="khj_026" :value="$vConstProjectInfo?->khj_026" class="tw:!w-full" />
            </td>
            <th>APOLLO修正者</th>
            <td class="tw:!p-0">
                <x-forms.table-input name="khj_027" :value="$vConstProjectInfo?->khj_027" class="tw:!w-full" />
            </td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>宅内調査備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_013">{{ $vConstProjectInfo?->khj_013 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>外線工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_014">{{ $vConstProjectInfo?->khj_014 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>接続工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_015">{{ $vConstProjectInfo?->khj_015 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>宅内工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_016">{{ $vConstProjectInfo?->khj_016 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>オプション工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_017">{{ $vConstProjectInfo?->khj_017 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>撤去工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_018">{{ $vConstProjectInfo?->khj_018 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>かけつけ備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_019">{{ $vConstProjectInfo?->khj_019 }}</x-forms.table-textarea>
            </td>
        </tr>
        <tr>
            <th>宅内移設工事備考</th>
            <td colspan="7" class="tw:!p-0">
                <x-forms.table-textarea name="khj_021">{{ $vConstProjectInfo?->khj_021 }}</x-forms.table-textarea>
            </td>
        </tr>
    </table>
</div>
