<x-guest-layout>
    <div class="tw:mt-[40px]">
        <div>
            <img src="/images/login_logo.png" />
        </div>
        <div class="tw:flex tw:items-center">
            <div class="tw:w-[7rem]">ユーザID: </div>
            <div>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="tw:block tw:w-full tw:rounded-md tw:border tw:border-slate-300 tw:px-3 tw:py-2 tw:text-sm tw:focus:border-slate-500 tw:focus:outline-none"
                >
            </div>
    </div>

    <div class="tw:w-full tw:rounded-xl tw:border tw:border-slate-200 tw:bg-white tw:p-6 tw:shadow-sm">
        <h1 class="tw:mb-6 tw:text-xl tw:font-semibold">ログイン</h1>

        <form method="POST" action="{{ route('login.store') }}" class="tw:space-y-4">
            @csrf

            <div>
                <label for="email" class="tw:mb-1 tw:block tw:text-sm tw:font-medium tw:text-slate-700">メールアドレス</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="tw:block tw:w-full tw:rounded-md tw:border tw:border-slate-300 tw:px-3 tw:py-2 tw:text-sm tw:focus:border-slate-500 tw:focus:outline-none"
                >
                @error('email')
                    <p class="tw:mt-1 tw:text-sm tw:text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="tw:mb-1 tw:block tw:text-sm tw:font-medium tw:text-slate-700">パスワード</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="tw:block tw:w-full tw:rounded-md tw:border tw:border-slate-300 tw:px-3 tw:py-2 tw:text-sm tw:focus:border-slate-500 tw:focus:outline-none"
                >
                @error('password')
                    <p class="tw:mt-1 tw:text-sm tw:text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="tw:flex tw:items-center tw:gap-2 tw:text-sm tw:text-slate-700">
                <input type="checkbox" name="remember" value="1" @checked(old('remember')) class="tw:rounded tw:border-slate-300 tw:text-slate-900 tw:focus:ring-slate-500">
                ログイン状態を保持する
            </label>

            <button
                type="submit"
                class="tw:inline-flex tw:w-full tw:items-center tw:justify-center tw:rounded-md tw:bg-slate-900 tw:px-4 tw:py-2 tw:text-sm tw:font-medium tw:text-white tw:hover:bg-slate-800 tw:focus:outline-none"
            >
                ログイン
            </button>
        </form>
    </div>
</x-guest-layout>
