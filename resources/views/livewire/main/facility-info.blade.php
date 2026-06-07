<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>東電支店名</th>
            <td>{{ $vFacilityInfo?->rke_097 }}</td>
            <th>東電支社名</th>
            <td>{{ $vFacilityInfo?->rke_098 }}</td>
            <th>NTT支社(添架)</th>
            <td colspan="3">{{ $vFacilityInfo?->rke_099 }}</td>
        </tr>
        <tr>
            <th>開通区分</th>
            <td>{{ $vFacilityInfo?->mRke083?->val }}</td>
            <th>工事詳細区分</th>
            <td>{{ $vFacilityInfo?->mRke088?->val }}</td>
            <th>既設回線区分</th>
            <td>{{ $vFacilityInfo?->mRke071?->val }}</td>
            <th>既設回線状況</th>
            <td>{{ $vFacilityInfo?->mRke072?->val }}</td>
        </tr>
        <tr>
            <th>再利用設計</th>
            <td>{{ $vFacilityInfo?->mRke079?->val }}</td>
            <th>再利用回線依頼番号</th>
            <td>{{ $vFacilityInfo?->rke_080 }}</td>
            <th>流用回線依頼番号</th>
            <td>{{ $vFacilityInfo?->rke_081 }}</td>
            <th>光コンセント情報</th>
            <td>{{ $vFacilityInfo?->rke_073 }}</td>
        </tr>
        <tr>
            <th>auひかりホーム<br>既契約の有無</th>
            <td>{{ $vFacilityInfo?->mRke069?->val }}</td>
            <th>auひかりホーム既契約<br>の流用希望有無</th>
            <td>{{ $vFacilityInfo?->mRke070?->val }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>設計時再利用不可理由</th>
            <td colspan="7">{{ $vFacilityInfo?->mRke082?->val }}</td>
        </tr>
        <tr>
            <th>苦情エリア区分</th>
            <td>{{ $vFacilityInfo?->mRke123?->val }}</td>
            <th>道路区分</th>
            <td>{{ $vFacilityInfo?->mRke124?->val }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>OSUホスト名</th>
            <td>{{ $vFacilityInfo?->rke_084 }}</td>
            <th>OSUスロット番号</th>
            <td>{{ $vFacilityInfo?->rke_085 }}</td>
            <th>OSUポート番号</th>
            <td>{{ $vFacilityInfo?->mRke086?->val }}</td>
            <th>OSU速度区分</th>
            <td>{{ $vFacilityInfo?->mRke087?->val }}</td>
        </tr>
        <tr>
            <th>SPL2名称</th>
            <td>{{ $vFacilityInfo?->rke_089 }}</td>
            <th>SPL2収容電柱名称</th>
            <td>{{ $vFacilityInfo?->rke_090 }}</td>
            <th>SPL2形状</th>
            <td>{{ $vFacilityInfo?->mRke091?->val }}</td>
            <th>SPL2ポート番号</th>
            <td>{{ $vFacilityInfo?->rke_092 }}</td>
        </tr>
        <tr>
            <th>第2SP構築待ち電柱</th>
            <td>{{ $vFacilityInfo?->rke_121 }}</td>
            <th>第２スプリッタ構築<br>予定日</th>
            <td>{{ $vFacilityInfo?->rke_122 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>ドロップケーブル<br>使用芯線番号</th>
            <td>{{ $vFacilityInfo?->rke_093 }}</td>
            <th>ケーブルキー番号</th>
            <td>{{ $vFacilityInfo?->rke_094 }}</td>
            <th>後２分岐専用ボックス<br>名称</th>
            <td colspan="3">{{ $vFacilityInfo?->rke_095 }}</td>
        </tr>
        <tr>
            <th>残置お客様機器<br>送付フラグ</th>
            <td>{{ $vFacilityInfo?->mRke207?->val }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>特殊案件フラグ</th>
            <td>{{ $vFacilityInfo?->mRke205?->val }}</td>
            <th>ポート割当区分</th>
            <td>{{ $vFacilityInfo?->mRke206?->val }}</td>
            <th>成端箱設置位置予定</th>
            <td>{{ $vFacilityInfo?->mRke213?->val }}</td>
            <th>成端箱ポート番号</th>
            <td>{{ $vFacilityInfo?->rke_214 }}</td>
        </tr>
        <tr>
            <th>成端箱名称（機器番号）</th>
            <td>{{ $vFacilityInfo?->rke_215 }}</td>
            <th>配管利用可否予定<br>（成端箱～宅内）</th>
            <td>{{ $vFacilityInfo?->mRke216?->val }}</td>
            <th>配管利用結果<br>（成端箱～宅内）</th>
            <td>{{ $vFacilityInfo?->mRke217?->val }}</td>
            <th>現地調査希望有無<br>（予備）</th>
            <td>{{ $vFacilityInfo?->mRke218?->val }}</td>
        </tr>
        <tr>
            <th>設備状況フラグ</th>
            <td>{{ $vFacilityInfo?->mRke208?->val }}</td>
            <th>端末種別</th>
            <td>{{ $vFacilityInfo?->mRke247?->val }}</td>
            <th>端末台数</th>
            <td>{{ $vFacilityInfo?->rke_248 }}</td>
            <th>音声有無</th>
            <td>{{ $vFacilityInfo?->mRke249?->val }}</td>
        </tr>
        <tr>
            <th>Ｕ－ＡＤＰ有無</th>
            <td>{{ $vFacilityInfo?->mRke250?->val }}</td>
            <th>バックアップ機器有無</th>
            <td>{{ $vFacilityInfo?->mRke251?->val }}</td>
            <td colspan="4"></td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
