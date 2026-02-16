<?php

namespace App\Livewire\User;

use App\Rules\Password;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class PasswordChange extends Component
{
    public $oldPassword = '';
    public $newPassword = '';
    public $newPasswordConfirm = null;
    public bool $canSubmit = false;
    public bool $isPasswordExpired = false;

    public function mount(): void
    {
        $this->isPasswordExpired = $this->resolvePasswordExpired();
    }

    protected function rules(): array
    {
        $user = Auth::user();
        $recentPasswords = array_values(array_filter([
            $user?->pass1,
            $user?->pass2,
            $user?->pass3,
        ], static fn ($password) => $password !== null && $password !== ''));

        return [
            'oldPassword' => ['required', 'string', 'current_password'],
            'newPassword' => ['required', 'string', 'different:oldPassword', Rule::notIn($recentPasswords), new Password()],
            'newPasswordConfirm' => ['required', 'string', 'same:newPassword'],
        ];
    }

    protected function messages(): array
    {
        return [
            '*.required' => ':attributeを入力してください。',
            'oldPassword.current_password' => 'パスワードが一致しません。',
            'newPassword.different' => '新しいパスワードは現在のパスワードと異なる値を入力してください。',
            'newPassword.not_in' => '新しいパスワードは過去に使用したパスワードと異なる値を入力してください。',
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

        $muser = Auth::user();

        $muser->pass3 = $muser->pass2;
        $muser->pass2 = $muser->pass1;
        $muser->pass1 = $muser->pass;
        $muser->pass = $this->newPassword;
        $muser->password = $this->newPassword;
        $muser->pass_set_date = now();
        $muser->save();

        $this->isPasswordExpired = $this->resolvePasswordExpired();
        session()->flash('status', 'パスワードを更新しました。');
        $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.user.password-change');
    }

    private function resolvePasswordExpired(): bool
    {
        $muser = Auth::user();

        if (! $muser || ! $muser->pass_set_date) {
            return false;
        }

        $passwordLimitDays = max((int) config('auth.password_limit_days', 90), 0);
        try {
            $passSetDate = $muser->pass_set_date instanceof Carbon
                ? $muser->pass_set_date
                : Carbon::parse($muser->pass_set_date);
        } catch (\Throwable) {
            return false;
        }

        return now()->greaterThan($passSetDate->copy()->addDays($passwordLimitDays));
    }
}
