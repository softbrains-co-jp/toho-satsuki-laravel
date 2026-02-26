@props([
    'name',
    'title' => null,
    'show' => false,
    'closeOnBackdrop' => true,
    'showCloseButton' => true,
    'maxWidthClass' => 'tw:max-w-2xl',
])

@php
    $show = filter_var($show, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? (bool) $show;
    $closeOnBackdrop = filter_var($closeOnBackdrop, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? (bool) $closeOnBackdrop;
    $showCloseButton = filter_var($showCloseButton, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? (bool) $showCloseButton;
@endphp

<div
    {{ $attributes->merge(['class' => 'tw:fixed tw:inset-0 tw:z-[1000]']) }}
    x-data="tohoDialogComponent({
        name: @js($name),
        initialOpen: @js($show),
        closeOnBackdrop: @js($closeOnBackdrop),
    })"
    x-show="isOpen"
    x-on:keydown.escape.window="close()"
    x-transition.opacity.duration.150ms
    style="display: none;"
>
    <div class="tw:absolute tw:inset-0 tw:bg-black/50" @click="onBackdropClick"></div>

    <div class="tw:relative tw:flex tw:min-h-screen tw:items-center tw:justify-center tw:p-4">
        <div
            class="{{ $maxWidthClass }} tw:rounded-lg tw:bg-white tw:text-black tw:shadow-2xl"
            role="dialog"
            aria-modal="true"
            @click.stop
        >
            @if($title || $showCloseButton)
                <div class="tw:flex tw:items-center tw:justify-between tw:border-b tw:border-slate-200 tw:px-4 tw:py-3 tw:bg-[#323280] tw:text-white">
                    <div class="tw:text-base tw:font-bold">
                        {{ $title }}
                    </div>

                    @if($showCloseButton)
                        <button
                            type="button"
                            class="tw:flex tw:h-8 tw:w-8 tw:items-center tw:justify-center tw:rounded tw:text-white hover:tw:bg-slate-100 hover:tw:text-slate-700"
                            @click="close()"
                            aria-label="閉じる"
                        >
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    @endif
                </div>
            @endif

            <div class="tw:px-4 tw:py-4 tw:flex tw:justify-center tw:bg-[#c3cbe1]">
                <div class="tw:inline tw:mx-auto">
                    {{ $slot }}
                </div>
            </div>
            <div>
                <x-button.gray @click="close()">閉じる</x-button.gray>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            function tohoDialogComponent(config) {
                return {
                    name: config.name,
                    isOpen: !!config.initialOpen,
                    closeOnBackdrop: !!config.closeOnBackdrop,
                    _openListener: null,
                    _closeListener: null,
                    _toggleListener: null,

                    init() {
                        window.__tohoDialogInstances = window.__tohoDialogInstances || {};

                        if (!window.tohoDialog) {
                            window.tohoDialog = {
                                open(name) {
                                    window.dispatchEvent(new CustomEvent('toho-dialog:open', { detail: { name } }));
                                },
                                close(name) {
                                    window.dispatchEvent(new CustomEvent('toho-dialog:close', { detail: { name } }));
                                },
                                toggle(name) {
                                    window.dispatchEvent(new CustomEvent('toho-dialog:toggle', { detail: { name } }));
                                },
                                get(name) {
                                    return window.__tohoDialogInstances?.[name] ?? null;
                                },
                            };
                        }

                        window.__tohoDialogInstances[this.name] = {
                            open: () => this.open(),
                            close: () => this.close(),
                            toggle: () => this.toggle(),
                            isOpen: () => this.isOpen,
                        };

                        this._openListener = (event) => {
                            if (event.detail?.name === this.name) {
                                this.open();
                            }
                        };

                        this._closeListener = (event) => {
                            if (event.detail?.name === this.name) {
                                this.close();
                            }
                        };

                        this._toggleListener = (event) => {
                            if (event.detail?.name === this.name) {
                                this.toggle();
                            }
                        };

                        window.addEventListener('toho-dialog:open', this._openListener);
                        window.addEventListener('toho-dialog:close', this._closeListener);
                        window.addEventListener('toho-dialog:toggle', this._toggleListener);
                    },

                    destroy() {
                        if (this._openListener) {
                            window.removeEventListener('toho-dialog:open', this._openListener);
                        }

                        if (this._closeListener) {
                            window.removeEventListener('toho-dialog:close', this._closeListener);
                        }

                        if (this._toggleListener) {
                            window.removeEventListener('toho-dialog:toggle', this._toggleListener);
                        }

                        if (window.__tohoDialogInstances?.[this.name]) {
                            delete window.__tohoDialogInstances[this.name];
                        }
                    },

                    open() {
                        this.isOpen = true;
                    },

                    close() {
                        this.isOpen = false;
                    },

                    toggle() {
                        this.isOpen = !this.isOpen;
                    },

                    onBackdropClick() {
                        if (!this.closeOnBackdrop) {
                            return;
                        }

                        this.close();
                    },
                };
            }
        </script>
    @endpush
@endonce
