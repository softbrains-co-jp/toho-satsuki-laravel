<div class="tw:flex tw:flex-col tw:gap-y-5">
    @foreach($vConstRelationInfoList as $vConstRelationInfo)
        <div>
            <table class="satsuki-table tw:w-full">
                <tr>
                    <th>GRIP契約コード</th>
                    <td>{{ $vConstRelationInfo?->rke_012 }}</td>
                    <th>回線依頼番号</th>
                    <td><a href="{{ route('main.search-k', ['kNo' => $vConstRelationInfo?->rke_019]) }}">{{ $vConstRelationInfo?->rke_019 }}</a></td>
                    <th>サービス名称</th>
                    <td>{{ $vConstRelationInfo?->rke_006 }}</td>
                    <th>ISP名称</th>
                    <td>{{ $vConstRelationInfo?->rke_009 }}</td>
                </tr>
            </table>
        </div>
    @endforeach
</div>
