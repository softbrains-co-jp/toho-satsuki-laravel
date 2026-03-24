<div>
    <table class="satsuki-table tw:w-full">
        <tr x-data="{ showParentStoreCodeSelect: false }">
            <th>オーダ種別</th>
            <td>{{ $tRke?->mRke233?->val }}</td>
            <th>工事会社（親店）コード</th>
            <td>
                <span x-show="!showParentStoreCodeSelect">
                    {{ $tRke?->mRke068?->val }}
                </span>
                <div x-show="showParentStoreCodeSelect" style="display: none;">
                    <x-forms.select name="rke_068" :value="$tRke?->rke_068" class="tw:!w-full" :options="$mParentStoreCodeOptions" />
                </div>
            </td>
            <td class="tw:!pl-0" colspan="4">
                @if(auth()->check() && auth()->user()->role)
                    <x-button.red type="button" x-on:click="showParentStoreCodeSelect = true" class="tw:!w-[150px] tw:!px-0 tw:!py-0 tw:!min-h-0">親工事会社コード訂正</x-button.red>
                @endif
            </td>
        </tr>
        <tr>
            <th>サービス登録日</th>
            <td>{{ $tRke?->rke_023?->format('Y/m/d') }}</td>
            <th>手配作成年月日</th>
            <td>{{ $tRke?->rke_004?->format('Y/m/d') }}</td>
            <th>手配更新年月日</th>
            <td>{{ $tRke?->rke_005?->format('Y/m/d') }}</td>
            <th>手配不可判定日</th>
            <td>{{ $tRke?->rke_010?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>基本契約登録年月日</th>
            <td>{{ $tRke?->rke_013?->format('Y/m/d') }}</td>
            <th>基本契約ステータス</th>
            <td>{{ $tRke?->rke_014 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>回線依頼取消日</th>
            <td>{{ $tRke?->rke_020?->format('Y/m/d') }}</td>
            <th>解約予定年月日</th>
            <td>{{ $tRke?->rke_049?->format('Y/m/d') }}</td>
            <th>申込取消年月日</th>
            <td>{{ $tRke?->rke_050?->format('Y/m/d') }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>事前予約ID</th>
            <td>{{ $tRke?->rke_061 }}</td>
            <th>予約ステータス</th>
            <td>{{ $tRke?->mRke064?->val }}</td>
            <th>予約申込日</th>
            <td>{{ $tRke?->rke_065?->format('Y/m/d') }}</td>
            <th>予約工事枠確定日</th>
            <td>{{ $tRke?->rke_066?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>予約工事日</th>
            <td>{{ $tRke?->rke_062?->format('Y/m/d') }}</td>
            <th>事前予約割当時間帯</th>
            <td>{{ $tRke?->mRke063?->val }}</td>
            <th>予約取消年月日</th>
            <td>{{ $tRke?->rke_067 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>連絡希望曜日</th>
            <td>{{ $tRke?->rke_028?->format('Y/m/d') }}</td>
            <th>連絡希望時間帯</th>
            <td>{{ $tRke?->rke_029 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>付託日時</th>
            <td>{{ $tRke?->rke_048?->format('Y/m/d H:i:s') }}</td>
            <th>机上設計完了日</th>
            <td>{{ $tRke?->rke_076?->format('Y/m/d') }}</td>
            <th>外線/外観調査開始日</th>
            <td>{{ $tRke?->rke_077?->format('Y/m/d') }}</td>
            <th>外線/外観調査完了日</th>
            <td>{{ $tRke?->rke_078?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>新築図面送付日</th>
            <td>{{ $tRke?->rke_096 }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>共架申請日</th>
            <td>{{ $tRke?->rke_101?->format('Y/m/d') }}</td>
            <th>共架回答日</th>
            <td>{{ $tRke?->rke_102?->format('Y/m/d') }}</td>
            <th>共架竣工報告日</th>
            <td>{{ $tRke?->rke_103?->format('Y/m/d') }}</td>
            <th>共架取消申請日</th>
            <td>{{ $tRke?->rke_108?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>添架申請日</th>
            <td>{{ $tRke?->rke_105?->format('Y/m/d') }}</td>
            <th>添架回答日</th>
            <td>{{ $tRke?->rke_106?->format('Y/m/d') }}</td>
            <th>添架竣工報告日</th>
            <td>{{ $tRke?->rke_107?->format('Y/m/d') }}</td>
            <th>添架取消申請日</th>
            <td>{{ $tRke?->rke_109?->format('Y/m/d') }}</td>
        </tr>
        <tr>
            <th>配電改修有無</th>
            <td>{{ $tRke?->mRke111?->val }}</td>
            <th>配電改修予定日</th>
            <td>{{ $tRke?->rke_112?->format('Y/m/d') }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>民地交渉有無</th>
            <td>{{ $tRke?->mRke114?->val }}</td>
            <th>民地交渉完了日</th>
            <td>{{ $tRke?->rke_115?->format('Y/m/d') }}</td>
            <th>地権者</th>
            <td>{{ $tRke?->rke_116 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>伐採有無</th>
            <td>{{ $tRke?->mRke117?->val }}</td>
            <th>樹木管理者</th>
            <td>{{ $tRke?->rke_118 }}</td>
            <th>道路占有有無</th>
            <td>{{ $tRke?->mRke119?->val }}</td>
            <th>道路管理者</th>
            <td>{{ $tRke?->rke_120 }}</td>
        </tr>
        <tr>
            <th>現地調査希望有無</th>
            <td>{{ $tRke?->mRke209?->val }}</td>
            <th>現地調査実施済み<br>フラグ</th>
            <td>{{ $tRke?->mRke211?->val }}</td>
            <th>営業担当同行有無</th>
            <td>{{ $tRke?->mRke210?->val }}</td>
            <th>オーナー立会い要否</th>
            <td>{{ $tRke?->mRke212?->val }}</td>
        </tr>
        <tr>
            <th>棟開通予定日</th>
            <td>{{ $tRke?->rke_219?->format('Y/m/d') }}</td>
            <th>棟開通日</th>
            <td>{{ $tRke?->rke_220?->format('Y/m/d') }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>不適合コード</th>
            <td>{{ $tRke?->mRke136?->val }}</td>
            <th>提供可能年月日</th>
            <td>{{ $tRke?->rke_151?->format('Y/m/d') }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>提供可否結果</th>
            <td>{{ $tRke?->mRke148?->val }}</td>
            <th>提供可能設定者</th>
            <td>{{ $tRke?->rke_152 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>提供可否結果<br>（工事会社）</th>
            <td>{{ $tRke?->mRke149?->val }}</td>
            <th>提供可能設定者<br>（工事会社）</th>
            <td>{{ $tRke?->rke_153 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="8">&nbsp;</td>
        </tr>
        <tr>
            <th>撤去希望有無</th>
            <td>{{ $tRke?->mRke236?->val }}</td>
            <th>撤去希望日</th>
            <td>{{ $tRke?->rke_237?->format('Y/m/d') }}</td>
            <th>撤去期限日</th>
            <td>{{ $tRke?->rke_238?->format('Y/m/d') }}</td>
            <th>取消発生フラグ</th>
            <td>{{ $tRke?->mRke244?->val }}</td>
        </tr>
        <tr>
            <th>竣工報告日</th>
            <td>{{ $tRke?->rke_168?->format('Y/m/d') }}</td>
            <th>検収完了日</th>
            <td>{{ $tRke?->rke_169?->format('Y/m/d') }}</td>
            <td colspan="4"></td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
