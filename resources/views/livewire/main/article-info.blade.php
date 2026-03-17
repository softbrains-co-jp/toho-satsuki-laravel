<div>
    <table class="satsuki-table tw:w-full">
        <tr>
            <th>物件番号</th>
            <td>{{ $tRke?->rke_175 }}</td>
            <th>物件名</th>
            <td>{{ $tRke?->rke_178 }}</td>
            <th>新築・既築</th>
            <td>{{ $tRke?->mRke188?->val }}</td>
            <th>分譲・賃貸</th>
            <td>{{ $tRke?->mRke189?->val }}</td>
        </tr>
        <tr>
            <th>契約者区分</th>
            <td>{{ $tRke?->mRke195?->val }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>契約者住所</th>
            <td colspan="3">{{ $tRke?->rke_183 }}</td>
            <th>契約者住所補記</th>
            <td colspan="3">{{ $tRke?->rke_184 }}</td>
        </tr>
        <tr>
            <th>部屋番号</th>
            <td>{{ $tRke?->rke_177 }}</td>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th>契約者氏名(漢字)</th>
            <td colspan="7">{{ $tRke?->rke_180 }}</td>
        </tr>
        <tr>
            <th>契約者氏名(カナ)</th>
            <td colspan="7">{{ $tRke?->rke_181 }}</td>
        </tr>
        <tr>
            <th>棟ID</th>
            <td>{{ $tRke?->rke_176 }}</td>
            <th>棟名</th>
            <td>{{ $tRke?->rke_179 }}</td>
            <th>棟戸数</th>
            <td>{{ $tRke?->rke_190 }}</td>
            <th>棟郵便番号</th>
            <td>{{ $tRke?->rke_185 }}</td>
        </tr>
        <tr>
            <th>棟住所</th>
            <td colspan="3">{{ $tRke?->rke_186 }}</td>
            <th>棟住所補記</th>
            <td colspan="3">{{ $tRke?->rke_187 }}</td>
        </tr>
        <tr>
            <th>竣工年月日</th>
            <td>{{ $tRke?->rke_191 }}</td>
            <th>マンション種別</th>
            <td>{{ $tRke?->mRke192?->val }}</td>
            <th>オートロック有無</th>
            <td>{{ $tRke?->mRke234?->val }}</td>
            <th>MDF鍵有無</th>
            <td>{{ $tRke?->mRke235?->val }}</td>
        </tr>
        <tr>
            <th>設備設置契約締結有無</th>
            <td>{{ $tRke?->mRke193?->val }}</td>
            <th>設備設置承諾書記入日</th>
            <td>{{ $tRke?->rke_194 }}</td>
            <th>管理会社部署名</th>
            <td>{{ $tRke?->rke_197 }}</td>
            <th>管理会社担当者名</th>
            <td>{{ $tRke?->rke_198 }}</td>
        </tr>
        <tr>
            <th>理事長部屋番号</th>
            <td>{{ $tRke?->rke_196 }}</td>
            <th>ご連絡先電話番号(1)</th>
            <td>{{ $tRke?->rke_199 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>契約者在宅時間<br>(FROM)時分</th>
            <td>{{ $tRke?->rke_200 }}</td>
            <th>契約者在宅時間<br>(TO)時分</th>
            <td>{{ $tRke?->rke_201 }}</td>
            <td colspan="4"></td>
        </tr>
        <tr>
            <th>キーマン情報</th>
            <td colspan="7">{{ $tRke?->rke_202 }}</td>
        </tr>
        <tr>
            <th>キーマン<br>（管理会社、担当者）<br>連絡先電話番号1</th>
            <td>{{ $tRke?->rke_203 }}</td>
            <th>キーマン<br>（管理会社、担当者）<br>連絡先電話番号2</th>
            <td>{{ $tRke?->rke_204 }}</td>
            <td colspan="4"></td>
        </tr>
    </table>
    {{-- The whole world belongs to you. --}}
</div>
