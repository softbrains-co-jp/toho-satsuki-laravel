<?php

namespace App\Livewire\User;

use App\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class PasswordChange extends Component
{
    public $oldPassword = '';
    public $newPassword = '';
    public $newPasswordConfirm = null;
    public bool $canSubmit = false;

    protected function rules(): array
    {
        return [
            'oldPassword' => ['required', 'string', 'current_password'],
            'newPassword' => ['required', 'string', 'different:oldPassword', new Password()],
            'newPasswordConfirm' => ['required', 'string', 'same:newPassword'],
        ];
    }

    protected function messages(): array
    {
        return [
            '*.required' => ':attributeを入力してください。',
            'oldPassword.current_password' => 'パスワードが一致しません。',
            'newPassword.different' => '新しいパスワードは現在のパスワードと異なる値を入力してください。',
            'newPasswordConfirm.same' => '確認用パスワードが一致しません。',
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'oldPassword' => '現在のパスワード',
            'newPassword' => '新しいパスワード',
            'newPasswordConfirm' => '新しいパスワード（確認）',
        ];
    }

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function changePassword(): void
    {
        $this->validate();

        dump('aaaa');
    }

    public function render()
    {
        return view('livewire.user.password-change');
    }
}
