<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>電話サービス電話番号1</th>
            <td>{{ $tRke?->rke_030 }}</td>
            <th>電話サービス電話番号2</th>
            <td>{{ $tRke?->rke_031 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>開通同時ポータ有無</th>
            <td>{{ $tRke?->mRke052?->val }}</td>
            <th>同番移転フラグ</th>
            <td>{{ $tRke?->mRke053?->val }}</td>
            <th>移転同時番ポフラグ</th>
            <td>{{ $tRke?->mRke054?->val }}</td>
            <th>同番移行フラグ</th>
            <td>{{ $tRke?->mRke055?->val }}</td>
        </tr>
        <tr>
            <th>同番移行<br>逆番ポ同時解約フラグ</th>
            <td>{{ $tRke?->mRke056?->val }}</td>
            <th>番号返却種別</th>
            <td colspan="5">{{ $tRke?->mRke057?->val }}</td>
        </tr>
        <tr>
            <th>オーナー了承有無<br>フラグ</th>
            <td>{{ $tRke?->mRke058?->val }}</td>
            <th>おまかせアドバイザー<br>希望フラグ</th>
            <td>{{ $tRke?->mRke059?->val }}</td>
            <th>おまかせアドバイザー<br>案件フラグ</th>
            <td>{{ $tRke?->mRke060?->val }}</td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <th>かけつけ有無</th>
            <td>{{ $tRke?->mRke240?->val }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>かけつけ記事欄</th>
            <td colspan="7">{!! nl2br($tRke?->rke_241) !!}</td>
        </tr>
        <tr>
            <th>電波障害エリア区分</th>
            <td>{{ $tRke?->mRke228?->val }}</td>
            <th>テレビ・ビデオ台数</th>
            <td>{{ $tRke?->rke_229 }}</td>
            <th>保安器位置</th>
            <td>{{ $tRke?->mRke230?->val }}</td>
            <th>衛星アンテナ有無</th>
            <td>{{ $tRke?->mRke231?->val }}</td>
        </tr>
        <tr>
            <th>CATV加入有無</th>
            <td>{{ $tRke?->mRke232?->val }}</td>
            <th>BS利用可能日</th>
            <td>{{ $tRke?->rke_242 }}</td>
            <th>放送サービス視聴有無</th>
            <td>{{ $tRke?->mRke243?->val }}</td>
            <th>光RF放送サービス申込有無</th>
            <td>{{ $tRke?->mRke275?->val }}</td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
