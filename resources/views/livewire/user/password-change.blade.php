<div>
    @csrf
    <x-section-title class="tw:w-[400px] tw:mx-auto">パスワード変更</x-section-title>
    @if($isPasswordExpired)
        <div class="tw:w-[400px] tw:text-black tw:mt-[20px] tw:mx-auto">
            パスワードの有効期限が切れています<br>
            パスワードを変更してください<br>
            <span class="tw:text-red-500 tw:font-bold">英（大小）数字記号（いずれか３つ含む）１２桁以上</span>
        </div>
    @endif

    <div class="tw:w-[400px] tw:h-[25px] tw:mt-[30px] tw:flex tw:items-center tw:mx-auto">
        <div class="tw:w-[13rem] tw:h-[25px] tw:leading-[25px] tw:pl-1 tw:bg-[#323280]">現在のパスワード </div>
        <div class="tw:flex-1 tw:h-[25px] tw:bg-white">
            <x-forms.input-password
                wire:model.lazy="oldPassword"
            />
        </div>
    </div>
    <x-error-message name="oldPassword" class="tw:text-nowrap" />

    <div class="tw:w-[400px] tw:h-[25px] tw:mt-[5px] tw:flex tw:items-center tw:mx-auto">
        <div class="tw:w-[13rem] tw:h-[25px] tw:leading-[25px] tw:pl-1 tw:bg-[#323280]">新しいパスワード </div>
        <div class="tw:flex-1 tw:h-[25px] tw:bg-white">
            <x-forms.input-password
                wire:model.lazy="newPassword"
            />
        </div>
    </div>
    <x-error-message name="newPassword" class="tw:text-nowrap" />

    <div class="tw:w-[400px] tw:h-[25px] tw:mt-[5px] tw:flex tw:items-center tw:mx-auto">
        <div class="tw:w-[13rem] tw:h-[25px] tw:leading-[25px] tw:pl-1 tw:bg-[#323280]">新しいパスワード（確認） </div>
        <div class="tw:flex-1 tw:h-[25px] tw:bg-white">
            <x-forms.input-password
                wire:model.lazy="newPasswordConfirm"
            />
        </div>
    </div>
    <x-error-message name="newPasswordConfirm" class="tw:text-nowrap" />

    <div class="tw:w-[400px] tw:mt-[30px] tw:text-center tw:mx-auto">
        <x-button.red
            wire:click="changePassword"
            class="tw:!w-[100px] tw:py-[5px] tw:cursor-pointer"
        >
            更新
        </x-button.red>
    </div>

</div>
