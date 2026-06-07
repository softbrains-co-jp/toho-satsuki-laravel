<div wire:poll.{{ $refreshIntervalSeconds }}s="refreshExclusion">
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>GRIP契約コード</th>
            <td>{{ $vBasicInfo?->rke_012 }}</td>
            <th>依頼指示区分</th>
            <td>{{ $vBasicInfo?->rke_009 }}</td>
            <th>サービス名称</th>
            <td>{{ $vBasicInfo?->rke_011 }}</td>
            <th>ISP名称</th>
            <td>{{ $vBasicInfo?->rke_042 }}</td>
        </tr>
        <tr>
            <th>回線依頼番号</th>
            <td>{{ $vBasicInfo?->rke_019 }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>顧客氏名（カナ）</th>
            <td colspan="7">{{ $vBasicInfo?->rke_027 }}</td>
        </tr>
        <tr>
            <th>顧客氏名（漢字）</th>
            <td colspan="7">{{ $vBasicInfo?->rke_026 }}</td>
        </tr>
        <tr>
            <th>設置先郵便番号</th>
            <td>{{ $vBasicInfo?->rke_033 }}</td>
            <th>設置先住所コード</th>
            <td>{{ $vBasicInfo?->rke_034 }}</td>
            <th>住居形態</th>
            <td>{{ $vBasicInfo?->mRke024?->val }}</td>
            <th>住居所有区分</th>
            <td>{{ $vBasicInfo?->mRke025?->val }}</td>
        </tr>
        <tr>
            <th>設置先住所</th>
            <td colspan="3">{{ $vBasicInfo?->rke_035 }}</td>
            <th>設置先住所補記</th>
            <td colspan="2">{{ $vBasicInfo?->rke_036 }}</td>
            <td></td>
        </tr>
        <tr>
            <th>入居・未入居</th>
            <td>{{ $vBasicInfo?->mRke044?->val }}</td>
            <th>入居予定年月日</th>
            <td>{{ $vBasicInfo?->rke_051 }}</td>
            <th>部屋重複情報</th>
            <td>{{ $vBasicInfo?->rke_045 }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>連絡先電話番号1</th>
            <td>{{ $vBasicInfo?->rke_046 }}</td>
            <th>連絡先電話番号2	</th>
            <td>{{ $vBasicInfo?->rke_047 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>設置先氏名</th>
            <td colspan="3">{{ $vBasicInfo?->rke_037 }}</td>
            <th>設置先部署名</th>
            <td colspan="3">{{ $vBasicInfo?->rke_040 }}</td>
        </tr>
        <tr>
            <th>設置先担当者名</th>
            <td colspan="3">{{ $vBasicInfo?->rke_038 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>設置先電話番号</th>
            <td>{{ $vBasicInfo?->rke_039 }}</td>
            <th>設置先担当者電話番号</th>
            <td>{{ $vBasicInfo?->rke_041 }}</td>
            <th>回線速度</th>
            <td>{{ $vBasicInfo?->mRke174?->val }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>申込書備考欄</th>
            <td colspan="7">{!! nl2br(e($vBasicInfo?->rke_032)) !!}</td>
        </tr>
        <tr>
            <th>申込ID</th>
            <td>{{ $vBasicInfo?->rke_008 }}</td>
            <th>手配ID</th>
            <td>{{ $vBasicInfo?->rke_003 }}</td>
            <th>手配イベント区分</th>
            <td>{{ $vBasicInfo?->rke_006 }}</td>
            <th>手配種別</th>
            <td>{{ $vBasicInfo?->rke_007 }}</td>
        </tr>
        <tr>
            <th>回線集約ID</th>
            <td>{{ $vBasicInfo?->rke_015 }}</td>
            <th>回線設備ID</th>
            <td>{{ $vBasicInfo?->rke_016 }}</td>
            <th>回線サービス提供ID</th>
            <td>{{ $vBasicInfo?->rke_017 }}</td>
            <th>サービス提供ID</th>
            <td>{{ $vBasicInfo?->rke_018 }}</td>
        </tr>
        <tr>
            <th>開通時回線依頼番号</th>
            <td>{{ $vBasicInfo?->rke_022 }}</td>
            <th>旧回線依頼番号</th>
            <td>{{ $vBasicInfo?->rke_021 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>ISP変更フラグ</th>
            <td>{{ $vBasicInfo?->mRke043?->val }}</td>
            <th>強制解約フラグ</th>
            <td>{{ $vBasicInfo?->mRke239?->val }}</td>
            <td colspan="4"></td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
