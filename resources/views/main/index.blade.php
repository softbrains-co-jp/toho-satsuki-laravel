<x-auth-layout>
    <div
        class="tw:h-full tw:flex tw:flex-col"
        x-data="mainPageTimeout()"
    >
        <div class="tw:w-full tw:bg-[#323280]">
            <div class="tw:w-[1200px] tw:h-[40px] tw:mx-auto tw:flex tw:justify-between tw:items-center tw:font-bold">
                <div
                    class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('serviceInfo') }"
                    @click="toggleServiceInfo"
                >
                    サービス・物件情報<br><i class="fa-solid fa-angle-down tw:text-[#323280]"></i>
                </div>
                <div
                    class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('facilityInfo') }"
                    @click="toggleFacilityInfo"
                >
                    設備・工程進捗情報<br><i class="fa-solid fa-angle-down tw:text-[#323280]"></i>
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('remarksAggregation') }"
                    @click="toggleRemarksAggregation"
                >
                    備考集約
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('deskDesignInfo') }"
                    @click="toggleDeskDesignInfo"
                >
                    机上設計情報
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('lineSurveyInfo') }"
                    @click="toggleLineSurveyInfo"
                >
                    外線調査情報
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer"
                    :class="{ 'tw:text-[#323280] tw:bg-[#c3cbe1]': isSectionVisible('constProjectInfo') }"
                    @click="toggleConstProjectInfo"
                >
                    工事案件情報
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer">
                    竣工情報
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer">
                    精算情報
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer">
                    使用材料
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer">
                    成果物
                </div>
                <div class="tw:h-full tw:grow tw:pt-[15px] tw:leading-[0.9rem] tw:px-3 tw:text-center tw:cursor-pointer">
                    対応履歴
                </div>
            </div>
        </div>
        <form method="post" action="{{ route('main.post') }}" class="tw:flex tw:flex-col tw:flex-1 tw:min-h-0">
            @csrf
            <div class="tw:w-full tw:flex-1 tw:min-h-0 tw:py-[30px] tw:overflow-y-scroll">
                <div class="tw:flex tw:flex-col tw:gap-y-[50px] tw:px-[calc((100%-1200px)/2)]">
                    <div>
                        <x-section-title>お客様基本情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.basic-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('serviceInfo')" x-cloak>
                        <x-section-title>提供サービス情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.service-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('serviceInfo')" x-cloak>
                        <x-section-title>物件情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.article-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('facilityInfo')" x-cloak>
                        <x-section-title>設備情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.facility-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('facilityInfo')" x-cloak>
                        <x-section-title>工程進捗情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.progress-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div>
                        <x-section-title>関連工事情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.const-relation-info :kNo="$kNo" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('remarksAggregation')" x-cloak>
                        <x-section-title>備考集約</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.remarks-aggregation :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('deskDesignInfo')" x-cloak>
                        <x-section-title>机上設計情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.desk-design-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('lineSurveyInfo')" x-cloak>
                        <x-section-title>外線調査情報</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.line-survey-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>工事案件情報（総合）</x-section-title>
                        <div class="tw:pt-[25px]">
                            <livewire:main.const-project-info :kNo="$kNo" :tRke="$tRke" />
                        </div>
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>外線工事</x-section-title>
                        @if (($tRke?->rke_019 ?? '') !== '' && ($tRke?->tGkj?->gkj_001 ?? null) === $tRke?->rke_019)
                            <div class="tw:pt-[25px]">
                                <livewire:main.const-line :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>宅内調査</x-section-title>
                        @if ($showHouseSurvey ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.house-survery :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>宅内工事</x-section-title>
                        @if ($showHouseConst ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.house-const :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>オプション工事</x-section-title>
                        @if ($showConstOption ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.const-option :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>かけつけ設定</x-section-title>
                        @if ($showSetupRush ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.setup-rush :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>移設工事</x-section-title>
                        @if ($showConstRelocation ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.const-relocation :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>撤去工事</x-section-title>
                        @if ($showConstRemove ?? false)
                            <div class="tw:pt-[25px]">
                                <livewire:main.const-remove :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                    <div x-show="isSectionVisible('constProjectInfo')" x-cloak>
                        <x-section-title>外線撤去</x-section-title>
                        @if ($tRke !== null)
                            <div class="tw:pt-[25px]">
                                <livewire:main.line-removal :kNo="$kNo" :tRke="$tRke" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tw:w-full tw:py-0 tw:bg-[#323280]">
                <div class="tw:w-[1200px] tw:mx-auto tw:flex tw:justify-between tw:items-center" x-data="lineRequestSearch()">
                    <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                        <div>回線依頼番号</div>
                        <x-forms.input name="kNo" class="tw:!w-[150px] tw:h-[30px]" x-model.trim="kNo" maxlength="10" />
                        <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchK">検索</x-button.gray>
                        <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearK">クリア</x-button.gray>
                    </div>
                    <div class="tw:py-3 tw:flex tw:gap-x-1 tw:items-center">
                        <div>工事手配コード</div>
                        <x-forms.input name="mNo" class="tw:!w-[150px] tw:h-[30px]" x-model.trim="mNo" maxlength="10" />
                        <x-button.gray class="tw:!w-[80px]" size="sm" @click="searchM">検索</x-button.gray>
                        <x-button.gray class="tw:!w-[80px]" size="sm" @click="clearM">クリア</x-button.gray>
                    </div>
                    <div class="tw:px-5 tw:py-3 tw:bg-[#c3cbe1] tw:flex tw:gap-x-3 tw:items-center ">
                        <x-button.red type="submit" class="tw:!w-[130px]" :disabled="$isReadOnly">更新</x-button.red>
                        <x-button.red class="tw:!w-[130px]" :disabled="$isReadOnly">件名解放</x-button.red>
                    </div>
                </div>
            </div>
        </form>
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
                logoutListeners: [],
                sectionVisibility: {
                    serviceInfo: false,
                    facilityInfo: false,
                    remarksAggregation: false,
                    deskDesignInfo: false,
                    lineSurveyInfo: false,
                    constProjectInfo: false,
                },
                sectionVisibilityStorageKeys: {
                    serviceInfo: 'main:service-property-info-visible',
                    facilityInfo: 'main:facility-progress-info-visible',
                    remarksAggregation: 'main:remarks-aggregation-visible',
                    deskDesignInfo: 'main:desk-design-info-visible',
                    lineSurveyInfo: 'main:line-survey-info-visible',
                    constProjectInfo: 'main:const-project-info-visible',
                },
                logoutUrl: @json(route('logout')),
                timeoutTimerId: null,
                retentionTimerId: null,
                timedOut: false,
                lastOperation: {
                    type: null,
                    time: Date.now(),
                },
                init() {
                    this.restoreSectionVisibility();
                    this.bindLogoutHandlers();

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
                    this.logoutListeners.forEach(({ element, event, handler }) => {
                        element.removeEventListener(event, handler);
                    });
                    this.logoutListeners = [];
                },
                toggleServiceInfo() {
                    this.toggleSectionVisibility('serviceInfo');
                },
                toggleFacilityInfo() {
                    this.toggleSectionVisibility('facilityInfo');
                },
                toggleRemarksAggregation() {
                    this.toggleSectionVisibility('remarksAggregation');
                },
                toggleDeskDesignInfo() {
                    this.toggleSectionVisibility('deskDesignInfo');
                },
                toggleLineSurveyInfo() {
                    this.toggleSectionVisibility('lineSurveyInfo');
                },
                toggleConstProjectInfo() {
                    this.toggleSectionVisibility('constProjectInfo');
                },
                toggleSectionVisibility(sectionKey) {
                    if (!Object.prototype.hasOwnProperty.call(this.sectionVisibility, sectionKey)) {
                        return;
                    }

                    this.sectionVisibility[sectionKey] = !this.sectionVisibility[sectionKey];
                    this.persistSectionVisibility(sectionKey);
                },
                isSectionVisible(sectionKey) {
                    return !!this.sectionVisibility[sectionKey];
                },
                restoreSectionVisibility() {
                    Object.keys(this.sectionVisibility).forEach((sectionKey) => {
                        this.restoreSectionVisibilityByKey(sectionKey);
                    });
                },
                restoreSectionVisibilityByKey(sectionKey) {
                    const storageKey = this.sectionVisibilityStorageKeys[sectionKey];
                    if (!storageKey) {
                        this.sectionVisibility[sectionKey] = false;
                        return;
                    }

                    try {
                        this.sectionVisibility[sectionKey] = window.localStorage.getItem(storageKey) === '1';
                    } catch (error) {
                        this.sectionVisibility[sectionKey] = false;
                    }
                },
                persistSectionVisibility(sectionKey) {
                    const storageKey = this.sectionVisibilityStorageKeys[sectionKey];
                    if (!storageKey) {
                        return;
                    }

                    try {
                        window.localStorage.setItem(storageKey, this.sectionVisibility[sectionKey] ? '1' : '0');
                    } catch (error) {
                        // localStorage unavailable
                    }
                },
                clearSectionVisibility() {
                    Object.keys(this.sectionVisibility).forEach((sectionKey) => {
                        this.sectionVisibility[sectionKey] = false;
                        const storageKey = this.sectionVisibilityStorageKeys[sectionKey];

                        if (!storageKey) {
                            return;
                        }

                        try {
                            window.localStorage.removeItem(storageKey);
                        } catch (error) {
                            // localStorage unavailable
                        }
                    });
                },
                isLogoutTarget(url) {
                    if (!url || !this.logoutUrl) {
                        return false;
                    }

                    try {
                        const target = new URL(url, window.location.origin);
                        const logout = new URL(this.logoutUrl, window.location.origin);
                        return target.pathname === logout.pathname;
                    } catch (error) {
                        return url === this.logoutUrl;
                    }
                },
                bindLogoutHandlers() {
                    const handlers = [];
                    const anchors = Array.from(document.querySelectorAll('a[href]')).filter((anchor) => {
                        return this.isLogoutTarget(anchor.getAttribute('href'));
                    });
                    const forms = Array.from(document.querySelectorAll('form[action]')).filter((form) => {
                        return this.isLogoutTarget(form.getAttribute('action'));
                    });

                    anchors.forEach((anchor) => {
                        const handler = () => this.clearSectionVisibility();
                        anchor.addEventListener('click', handler);
                        handlers.push({ element: anchor, event: 'click', handler });
                    });

                    forms.forEach((form) => {
                        const handler = () => this.clearSectionVisibility();
                        form.addEventListener('submit', handler);
                        handlers.push({ element: form, event: 'submit', handler });
                    });

                    this.logoutListeners = handlers;
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
