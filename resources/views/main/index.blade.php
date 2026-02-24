<x-auth-layout>
    <div class="tw:h-full tw:flex tw:flex-col">
        <div class="tw:w-full tw:py-[10px] tw:bg-[#323280]">
            <div class="tw:w-[1200px] tw:mx-auto tw:flex tw:justify-between tw:items-center tw:font-bold">
                <div class="tw:py-1 tw:px-3">
                    サービス・物件情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    設備・工程進捗情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    備考集約
                </div>
                <div class="tw:py-1 tw:px-3">
                    机上設計情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    外線調査情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    工事案件情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    竣工情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    精算情報
                </div>
                <div class="tw:py-1 tw:px-3">
                    使用材料
                </div>
                <div class="tw:py-1 tw:px-3">
                    成果物
                </div>
                <div class="tw:py-1 tw:px-3">
                    対応履歴
                </div>
            </div>
        </div>
        <div class="tw:w-full tw:flex-1">
            <div class="tw:px-[calc((100%-1200px)/2)]">
                <div class="tw:pt-[30px]">
                    <x-section-title class="tw:mx-auto">お客様基本情報</x-section-title>
                </div>
            </div>
        </div>
        <div class="tw:w-full tw:py-0 tw:bg-[#323280]">
            <div class="tw:w-[1200px] tw:mx-auto tw:flex tw:justify-between tw:items-center" x-data="lineRequestSearch()">
                <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                    <div>回線依頼番号</div>
                    <x-forms.input class="tw:!w-[150px] tw:h-[30px]" x-model.trim="kNo" />
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchK">検索</x-button.gray>
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearK">クリア</x-button.gray>
                </div>
                <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                    <div>工事手配コード</div>
                    <x-forms.input class="tw:!w-[150px] tw:h-[30px]" x-model.trim="mNo" />
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchM">検索</x-button.gray>
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearM">クリア</x-button.gray>
                </div>
                <div class="tw:px-5 tw:py-3 tw:bg-[#c3cbe1] tw:flex tw:gap-x-3 tw:items-center ">
                    <x-button.red class="tw:!w-[130px]">更新</x-button.red>
                    <x-button.red class="tw:!w-[130px]">件名解放</x-button.red>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function lineRequestSearch() {
            return {
                kNo: @json((string) request()->route('kNo', '')),
                mNo: @json((string) request()->route('mNo', '')),
                searchK() {
                    if (!this.kNo) {
                        return;
                    }

                    const url = @json(route('main.search-k', ['kNo' => '__K_NO__']));
                    window.location.href = url.replace('__K_NO__', encodeURIComponent(this.kNo));
                },
                clearK() {
                    this.kNo = '';
                },
                searchM() {
                    if (!this.mNo) {
                        return;
                    }

                    const url = @json(route('main.search-m', ['mNo' => '__M_NO__']));
                    window.location.href = url.replace('__M_NO__', encodeURIComponent(this.mNo));
                },
                clearM() {
                    this.mNo = '';
                },
            };
        }
    </script>
    @endpush
</x-auth-layout>
