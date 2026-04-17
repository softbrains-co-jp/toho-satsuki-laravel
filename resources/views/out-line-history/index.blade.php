<x-modal-layout title="Satsuki - 外線調査履歴">
    <form method="post" action="{{ route('out-line-history.update', ['requestNumber' => $requestNumber]) }}">
        @csrf
        <div class="tw:w-full tw:pt-[30px] tw:px-[10px]" x-data="outLineHistoryButtonState()">
            <x-section-title :showMoveTop="false">外線調査履歴</x-section-title>
            <div class="tw:mt-[20px]">
                <table class="satsuki-table tw:w-full">
                    <tr>
                        <th>共架申請日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_002?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_002" :value="$tGcr->gcr_002" />
                            </div>
                        </td>
                        <th>共架回答日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_007?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_007" :value="$tGcr->gcr_007" />
                            </div>
                        </td>
                        <th>共架番号1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_012 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_012" :value="$tGcr->gcr_012" />
                            </div>
                        </td>
                        <th>共架取消申請日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_017?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_017" :value="$tGcr->gcr_017" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>共架申請日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_003?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_003" :value="$tGcr->gcr_003" />
                            </div>
                        </td>
                        <th>共架回答日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_008?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_008" :value="$tGcr->gcr_008" />
                            </div>
                        </td>
                        <th>共架番号2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_013 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_013" :value="$tGcr->gcr_013" />
                            </div>
                        </td>
                        <th>共架取消申請日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_018?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_018" :value="$tGcr->gcr_018" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>共架申請日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_004?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_004" :value="$tGcr->gcr_004" />
                            </div>
                        </td>
                        <th>共架回答日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_009?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_009" :value="$tGcr->gcr_009" />
                            </div>
                        </td>
                        <th>共架番号3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_014 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_014" :value="$tGcr->gcr_014" />
                            </div>
                        </td>
                        <th>共架取消申請日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_019?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_019" :value="$tGcr->gcr_019" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>共架申請日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_005?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_005" :value="$tGcr->gcr_005" />
                            </div>
                        </td>
                        <th>共架回答日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_010?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_010" :value="$tGcr->gcr_010" />
                            </div>
                        </td>
                        <th>共架番号4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_015 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_015" :value="$tGcr->gcr_015" />
                            </div>
                        </td>
                        <th>共架取消申請日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_020?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_020" :value="$tGcr->gcr_020" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>共架申請日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_006?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_006" :value="$tGcr->gcr_006" />
                            </div>
                        </td>
                        <th>共架回答日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_011?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_011" :value="$tGcr->gcr_011" />
                            </div>
                        </td>
                        <th>共架番号5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_016 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_016" :value="$tGcr->gcr_016" />
                            </div>
                        </td>
                        <th>共架取消申請日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_021?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_021" :value="$tGcr->gcr_021" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tw:mt-[20px]">
                <table class="satsuki-table tw:w-full">
                    <tr>
                        <th>添架申請日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_022?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_022" :value="$tGcr->gcr_022" />
                            </div>
                        </td>
                        <th>添架回答日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_027?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_027" :value="$tGcr->gcr_027" />
                            </div>
                        </td>
                        <th>添架番号1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_032 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_032" :value="$tGcr->gcr_032" />
                            </div>
                        </td>
                        <th>添架取消申請日1</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_037?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_037" :value="$tGcr->gcr_037" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>添架申請日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_023?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_023" :value="$tGcr->gcr_023" />
                            </div>
                        </td>
                        <th>添架回答日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_028?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_028" :value="$tGcr->gcr_028" />
                            </div>
                        </td>
                        <th>添架番号2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_033 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_033" :value="$tGcr->gcr_033" />
                            </div>
                        </td>
                        <th>添架取消申請日2</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_038?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_038" :value="$tGcr->gcr_038" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>添架申請日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_024?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_024" :value="$tGcr->gcr_024" />
                            </div>
                        </td>
                        <th>添架回答日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_029?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_029" :value="$tGcr->gcr_029" />
                            </div>
                        </td>
                        <th>添架番号3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_034 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_034" :value="$tGcr->gcr_034" />
                            </div>
                        </td>
                        <th>添架取消申請日3</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_039?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_039" :value="$tGcr->gcr_039" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>添架申請日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_025?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_025" :value="$tGcr->gcr_025" />
                            </div>
                        </td>
                        <th>添架回答日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_030?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_030" :value="$tGcr->gcr_030" />
                            </div>
                        </td>
                        <th>添架番号4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_035 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_035" :value="$tGcr->gcr_035" />
                            </div>
                        </td>
                        <th>添架取消申請日4</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_040?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_040" :value="$tGcr->gcr_040" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>添架申請日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_026?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_026" :value="$tGcr->gcr_026" />
                            </div>
                        </td>
                        <th>添架回答日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_031?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_031" :value="$tGcr->gcr_031" />
                            </div>
                        </td>
                        <th>添架番号5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_036 }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input name="gcr_036" :value="$tGcr->gcr_036" />
                            </div>
                        </td>
                        <th>添架取消申請日5</th>
                        <td x-bind:class="{ 'tw:!p-0': isUpdating }">
                            <div x-show="!isUpdating" >{{ $tGcr->gcr_041?->format('Y/m/d') }}</div>
                            <div x-show="isUpdating" x-cloak>
                                <x-forms.table-input-date name="gcr_041" :value="$tGcr->gcr_041" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tw:mt-[40px] tw:flex tw:justify-center tw:gap-x-[20px]">
                <x-button.red type="button" class="tw:!w-[130px] tw:!h-[40px]" x-show="!isUpdating" x-on:click="startUpdate">訂正</x-button.red>
                <x-button.red type="submit" class="tw:!w-[130px] tw:!h-[40px]" x-show="isUpdating" x-cloak>更新</x-button.red>
                <x-button.dark-gray type="button" class="tw:!w-[130px] tw:!h-[40px]" x-on:click="closeWindow">閉じる</x-button.dark-gray>
            </div>
        </div>
        <input type="hidden" name="gcr_001" value="{{ $tGcr->gcr_001 }}" />
    </form>
    @push('scripts')
        <script>
            function outLineHistoryButtonState() {
                return {
                    isUpdating: false,
                    startUpdate() {
                        this.isUpdating = true;
                    },
                    closeWindow() {
                        window.close();
                    },
                };
            }
        </script>
    @endpush
</x-modal-layout>
