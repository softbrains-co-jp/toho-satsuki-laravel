<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value)) {
            $fail('パスワードは英大文字・英小文字・数字・記号のうち3種類以上を含む12文字以上で入力してください。');
            return;
        }

        $charTypeCount = 0;
        $charTypeCount += preg_match('/[a-z]/', $value) ? 1 : 0;
        $charTypeCount += preg_match('/[A-Z]/', $value) ? 1 : 0;
        $charTypeCount += preg_match('/[0-9]/', $value) ? 1 : 0;
        $charTypeCount += preg_match('/[^a-zA-Z0-9]/', $value) ? 1 : 0;

        if (mb_strlen($value) < 12 || $charTypeCount < 3) {
            $fail('パスワードは英大文字・英小文字・数字・記号のうち3種類以上を含む12文字以上で入力してください。');
        }
    }
}
