<x-guest-layout>
    <div class="tw:pt-[40px] tw:w-full tw:flex tw:justify-center">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="tw:w-full">
                <img src="/images/login_logo.png" class="tw:mx-auto" />
            </div>
            <div class="tw:w-[400px] tw:mt-[50px] tw:flex tw:items-center tw:mx-auto">
                <div class="tw:w-[7rem]">ユーザID: </div>
                <div class="tw:flex-1">
                    <x-forms.input
                        type="text"
                        id="id"
                        name="id"
                        value="{{ old('id') }}"
                        required
                    />
                </div>
            </div>
            <div class="tw:w-[400px] tw:mt-[10px] tw:flex tw:items-center tw:mx-auto">
                <div class="tw:w-[7rem]">パスワード: </div>
                <div class="tw:flex-1">
                    <x-forms.input-password
                        id="password"
                        name="password"
                        required
                    />
                </div>
            </div>
            <div class="tw:w-[400px] tw:mt-[10px] tw:flex tw:items-center tw:mx-auto">
                <div class="tw:w-[7rem]"></div>
                <div class="tw:flex-1 tw:flex tw:gap-x-[10px]">
                    <x-button.gray type="submit">ログイン</x-button.gray>
                    <x-button.gray>リセット</x-button.gray>
                </div>
            </div>
            <div class="tw:w-full tw:mt-[50px] tw:text-center">
                総合TOPへ戻る
            </div>

        </form>
    </div>
    @push('scripts')
    <script>
        (() => {
            const keys = [
                'main:service-property-info-visible',
                'main:facility-progress-info-visible',
            ];

            try {
                keys.forEach((key) => window.localStorage.removeItem(key));
            } catch (error) {
                // localStorage unavailable
            }
        })();
    </script>
    @endpush
</x-guest-layout>
