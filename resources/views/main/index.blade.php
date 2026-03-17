<x-auth-layout>
    <div
        class="tw:h-full tw:flex tw:flex-col"
        x-data="mainPageTimeout()"
    >
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
                    <x-section-title>お客様基本情報</x-section-title>
                    <div class="tw:pt-[30px] tw:pb-[50px]">
                        <livewire:main.basic-info :kNo="$kNo" />
                    </div>
                </div>
                <div class="tw:pt-[30px]">
                    <x-section-title>関連工事情報</x-section-title>
                    <div class="tw:pt-[30px] tw:pb-[50px]">
                        <livewire:main.const-relation-info :kNo="$kNo" />
                    </div>
                </div>
            </div>
        </div>
        <div class="tw:w-full tw:py-0 tw:bg-[#323280]">
            <div class="tw:w-[1200px] tw:mx-auto tw:flex tw:justify-between tw:items-center" x-data="lineRequestSearch()">
                <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                    <div>回線依頼番号</div>
                    <x-forms.input class="tw:!w-[150px] tw:h-[30px]" x-model.trim="kNo" maxlength="10" />
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchK">検索</x-button.gray>
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearK">クリア</x-button.gray>
                </div>
                <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                    <div>工事手配コード</div>
                    <x-forms.input class="tw:!w-[150px] tw:h-[30px]" x-model.trim="mNo" maxlength="10" />
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchM">検索</x-button.gray>
                    <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearM">クリア</x-button.gray>
                </div>
                <div class="tw:px-5 tw:py-3 tw:bg-[#c3cbe1] tw:flex tw:gap-x-3 tw:items-center ">
                    <x-button.red class="tw:!w-[130px]" :disabled="$isReadOnly">更新</x-button.red>
                    <x-button.red class="tw:!w-[130px]" :disabled="$isReadOnly">件名解放</x-button.red>
                </div>
            </div>
        </div>
    </div>
    <x-dialog name="sample-dialog" title="確認" close-on-backdrop="false" :show="$isReadOnly && !is_null($mExclusionNumber)" :showCloseButton="true">
        現在、別のユーザが使用しているので更新できません。<br>
        読み取り専用で聞きます<br>
        <br>
        ユーザ名：{{ $mExclusionNumber?->mUser?->name }}
    </x-dialog>
    @push('scripts')
    <script>
        function mainPageTimeout() {
            return {
                requestNumber: @json((string) ($requestNumber ?? '')),
                timeoutMinutes: @json((int) config('lock.operation_timeout_minutes', 30)),
                retentionMinutes: @json(max((int) config('lock.refresh_interval_minutes', 3), 1)),
                retainUrl: @json(route('main.lock-retain')),
                releaseUrl: @json(route('main.lock-release')),
                redirectUrl: @json(route('main.index')),
                watchEvents: ['scroll', 'resize', 'click', 'contextmenu', 'mousemove', 'wheel', 'keypress', 'touchstart', 'touchend', 'touchmove', 'touchcancel'],
                listeners: [],
                timeoutTimerId: null,
                retentionTimerId: null,
                timedOut: false,
                lastOperation: {
                    type: null,
                    time: Date.now(),
                },
                init() {
                    if (!this.requestNumber) {
                        return;
                    }

                    this.watchEvents.forEach((type) => {
                        const handler = () => this.updateLastOperation(type);
                        window.addEventListener(type, handler, { passive: true });
                        this.listeners.push({ type, handler });
                    });

                    this.timeoutTimerId = window.setInterval(() => {
                        const timeoutMsec = this.timeoutMinutes * 60 * 1000;
                        const timeoutFlag = (Date.now() - this.lastOperation.time) > timeoutMsec;

                        if (!timeoutFlag || this.timedOut) {
                            return;
                        }

                        this.handleTimeout();
                    }, 1000);

                    this.retentionTimerId = window.setInterval(() => {
                        this.retainLock();
                    }, this.retentionMinutes * 60 * 1000);
                },
                destroy() {
                    this.clearTimers();
                    this.listeners.forEach(({ type, handler }) => {
                        window.removeEventListener(type, handler);
                    });
                    this.listeners = [];
                },
                clearTimers() {
                    if (this.timeoutTimerId) {
                        window.clearInterval(this.timeoutTimerId);
                        this.timeoutTimerId = null;
                    }

                    if (this.retentionTimerId) {
                        window.clearInterval(this.retentionTimerId);
                        this.retentionTimerId = null;
                    }
                },
                updateLastOperation(type, time = null) {
                    this.lastOperation.type = type;
                    this.lastOperation.time = time ?? Date.now();
                },
                csrfToken() {
                    return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
                },
                async postJson(url, payload, options = {}) {
                    try {
                        await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': this.csrfToken(),
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            body: JSON.stringify(payload),
                            keepalive: !!options.keepalive,
                        });
                    } catch (error) {
                        console.error(error);
                    }
                },
                async retainLock() {
                    if (!this.requestNumber) {
                        return;
                    }

                    await this.postJson(this.retainUrl, {
                        request_number: this.requestNumber,
                    });
                },
                async releaseLock() {
                    if (!this.requestNumber) {
                        return;
                    }

                    await this.postJson(this.releaseUrl, {
                        request_number: this.requestNumber,
                    }, { keepalive: true });
                },
                async handleTimeout() {
                    this.timedOut = true;
                    this.clearTimers();

                    await this.releaseLock();

                    alert(this.timeoutMinutes + '分未操作のため、回線依頼番号を自動開放します。');
                    window.location.assign(this.redirectUrl);
                },
            };
        }

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
