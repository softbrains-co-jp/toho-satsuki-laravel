<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>電話サービス電話番号1</th>
            <td>{{ $vServiceInfo?->rke_030 }}</td>
            <th>電話サービス電話番号2</th>
            <td>{{ $vServiceInfo?->rke_031 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>開通同時ポータ有無</th>
            <td>{{ $vServiceInfo?->mExistence1_052?->val }}</td>
            <th>同番移転フラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_053?->val }}</td>
            <th>移転同時番ポフラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_054?->val }}</td>
            <th>同番移行フラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_055?->val }}</td>
        </tr>
        <tr>
            <th>同番移行<br>逆番ポ同時解約フラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_056?->val }}</td>
            <th>番号返却種別</th>
            <td colspan="5">{{ $vServiceInfo?->mNumberReturn?->val }}</td>
        </tr>
        <tr>
            <th>オーナー了承有無<br>フラグ</th>
            <td>{{ $vServiceInfo?->mOwnerAgree?->val }}</td>
            <th>おまかせアドバイザー<br>希望フラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_059?->val }}</td>
            <th>おまかせアドバイザー<br>案件フラグ</th>
            <td>{{ $vServiceInfo?->mExistence1_060?->val }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>かけつけ有無</th>
            <td>{{ $vServiceInfo?->mExistence1_240?->val }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>かけつけ記事欄</th>
            <td colspan="7">{!! nl2br($vServiceInfo?->rke_241) !!}</td>
        </tr>
        <tr>
            <th>電波障害エリア区分</th>
            <td>{{ $vServiceInfo?->mRadioDisturbanceArea?->val }}</td>
            <th>テレビ・ビデオ台数</th>
            <td>{{ $vServiceInfo?->rke_229 }}</td>
            <th>保安器位置</th>
            <td>{{ $vServiceInfo?->mDevicePosition?->val }}</td>
            <th>衛星アンテナ有無</th>
            <td>{{ $vServiceInfo?->mExistence1_231?->val }}</td>
        </tr>
        <tr>
            <th>CATV加入有無</th>
            <td>{{ $vServiceInfo?->mExistence1_232?->val }}</td>
            <th>BS利用可能日</th>
            <td>{{ $vServiceInfo?->rke_242 }}</td>
            <th>放送サービス視聴有無</th>
            <td>{{ $vServiceInfo?->mExistence1_243?->val }}</td>
            <th>光RF放送サービス申込有無</th>
            <td>{{ $vServiceInfo?->mExistence1_275?->val }}</td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
